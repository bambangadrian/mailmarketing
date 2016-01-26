<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateDssPriorityRequest;
use MailMarketing\Models\Dss;
use MailMarketing\Models\DssAlternativeDetail;
use MailMarketing\Models\DssCriteria;
use MailMarketing\Models\DssEvAlternativeCriteria;
use MailMarketing\Models\DssResult;

class DssPriorityController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->setEnableCreate(false);
        parent::__construct();
        # Set custom reference key.
        $this->setReferenceKey('priority');
        # Set content directory.
        $this->contentDir = 'dss/priority';
        # Set page attributes.
        $this->data['pageHeader'] = 'DSS Priority';
        $this->data['pageDescription'] = 'Manage alternative priority calculation';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'dssPriority';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['contentTitle'] = 'Please Select Period to Calculate Alternative Priority';
        $this->data['model'] = Dss::active()
                                  ->notDeleted()
                                  ->where('Dss_CriteriaConsistencyRatio', '<', 0.1)
                                  ->paginate(10);

        return parent::index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id Row ID of model that want to edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['pageDescription'] = 'Calculate alternative priority for selected DSS Period';
        $this->data['contentTitle'] = 'Alternative Priority Calculation Data';
        $this->data['model'] = Dss::with(
            [
                'criterias'    => function ($query) {
                    $query->active()->notDeleted();
                },
                'alternatives' => function ($query) {
                    $query->active()->notDeleted();
                },
            ]
        )->find($id);
        foreach ($this->data['model']->criterias as $criteria) {
            foreach ($this->data['model']->alternatives as $alternative) {
                $evAlternativeCriteria = DssEvAlternativeCriteria::with('compares')
                                                                 ->where('Deac_CriteriaID', $criteria->Dcr_ID)
                                                                 ->where('Deac_AlternativeID', $alternative->Dal_ID)
                                                                 ->first();
                if ($evAlternativeCriteria !== null) {
                    $this->data['hasCalculated'] = true;
                    $this->data['eigen'][$criteria->Dcr_ID][$alternative->Dal_ID] = $evAlternativeCriteria->Deac_EigenVector;
                    $this->data['columnTotal'][$criteria->Dcr_ID][$alternative->Dal_ID] = $evAlternativeCriteria->Deac_MatrixTotal;
                    foreach ($evAlternativeCriteria->compares as $compare) {
                        $compareValue = $compare->Dad_ComparisonMatrixValue;
                        $leftValue = 1;
                        $rightValue = 1;
                        if ($compareValue > 1) {
                            $leftValue = (integer)$compareValue;
                        } elseif ($compareValue < 1) {
                            $rightValue = (integer)(1 / $compareValue);
                        }
                        $this->data['leftValue'][$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dad_CompareID] = $leftValue;
                        $this->data['rightValue'][$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dad_CompareID] = $rightValue;
                    }
                }
            }
        }
        if ($this->data['model']->Dss_RunOn !== null) {
            $this->data['hasRunOn'] = true;
        }
        $this->data['buttons'] = $this->renderPartialView('button');
        $this->loadResourceForDetailPage();

        return parent::edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDssPriorityRequest $request Request object parameter.
     * @param  integer                  $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDssPriorityRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            \DB::beginTransaction();
            $runOnDate = \Carbon\Carbon::now();
            $dssData = Dss::with(
                [
                    'criterias'    => function ($query) {
                        $query->active()->notDeleted();
                    },
                    'alternatives' => function ($query) {
                        $query->active()->notDeleted();
                    },
                ]
            )->find($id);
            # Create the temporary array to store the calculation result.
            $recordEvCriteria = [];
            $tempArray = [];
            foreach ($dssData->criterias as $criteria) {
                $recordEvCriteria[$criteria->Dcr_ID] = $criteria->Dcr_EigenVector;
                foreach ($dssData->alternatives as $alternative) {
                    $recordEvAlternativeCriteria = DssEvAlternativeCriteria::firstOrNew(
                        [
                            'Deac_CriteriaID'    => $criteria->Dcr_ID,
                            'Deac_AlternativeID' => $alternative->Dal_ID,
                        ]
                    );
                    $recordEvAlternativeCriteria->save();
                    foreach ($dssData->alternatives as $compare) {
                        $recordAlternativeDetail = DssAlternativeDetail::firstOrNew(
                            [
                                'Dad_EigenID'   => $recordEvAlternativeCriteria->getKey(),
                                'Dad_CompareID' => $compare->Dal_ID,
                            ]
                        );
                        $compareValue = number_format(
                            $request->get('LeftValue')[$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dal_ID] /
                            $request->get('RightValue')[$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dal_ID],
                            8
                        );
                        $tempArray[$criteria->Dcr_ID][$alternative->Dal_ID][$compare->Dal_ID] = $compareValue;
                        $recordAlternativeDetail->Dad_ComparisonMatrixValue = $compareValue;
                        $recordAlternativeDetail->save();
                    }
                }
            }
            # Calculate the alternative ranking.
            $priorityResult = $this->getPriorityCalculationResult($tempArray);
            $priorityRanking = [];
            foreach ($priorityResult as $criteriaKey => $resultPerCriteria) {
                foreach ($resultPerCriteria['eigenVector'] as $alternativeKey => $value) {
                    $recordEvAlternativeCriteria = DssEvAlternativeCriteria::where('Deac_CriteriaID', $criteriaKey)
                                                                           ->where('Deac_AlternativeID', $alternativeKey)
                                                                           ->first();
                    $recordEvAlternativeCriteria->Deac_EigenVector = $value;
                    $recordEvAlternativeCriteria->Deac_MatrixTotal = $resultPerCriteria['columnTotal'][$alternativeKey];
                    $recordEvAlternativeCriteria->save();
                    if (array_key_exists($alternativeKey, $priorityRanking) === false) {
                        $priorityRanking[$alternativeKey] = 0;
                    }
                    $priorityRanking[$alternativeKey] += ($value * $recordEvCriteria[$criteriaKey]);
                }
            }
            # Save the ranking to dss result table.
            foreach ($priorityRanking as $alternativeKey => $value) {
                $recordPriorityResult = DssResult::firstOrNew(['Dsr_AlternativeID' => $alternativeKey]);
                $recordPriorityResult->Dsr_Result = number_format($value, 8);
                $recordPriorityResult->save();
            }
            # Update dss period table (run on date field)
            $dssData->Dss_RunOn = $runOnDate;
            $dssData->save();
            \DB::commit();

            return redirect($redirectPath);
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect($redirectPath)->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Get dss alternative priority calculation result.
     *
     * @param array $matrixArray Matrix array parameter.
     *
     * @return array
     */
    private function getPriorityCalculationResult(array $matrixArray)
    {
        $result = [];
        # Loop through the criterias.
        foreach ($matrixArray as $criteriaKey => $matrixPerCriteria) {
            # Get the total column per alternative.
            $sumTotalPerColumn = [];
            foreach ($matrixPerCriteria as $row) {
                foreach ($row as $column => $value) {
                    if (array_key_exists($column, $sumTotalPerColumn) === false) {
                        $sumTotalPerColumn[$column] = 0;
                    }
                    $sumTotalPerColumn[$column] += $value;
                }
            }
            # Divide each value on specified column per total column.
            foreach ($matrixPerCriteria as $index => $row) {
                foreach ($row as $column => $value) {
                    $matrixPerCriteria[$index][$column] = number_format($value / $sumTotalPerColumn[$column], 8);
                }
            }
            # Calculate the mean for each row to get the eigen value.
            $rowCount = count($matrixPerCriteria);
            $eigenVector = [];
            foreach ($matrixPerCriteria as $index => $row) {
                $rowTotal = 0;
                foreach ($row as $column => $value) {
                    $rowTotal += $matrixPerCriteria[$index][$column];
                }
                $eigenVector[$index] = number_format($rowTotal / $rowCount, 8);
            }
            $result[$criteriaKey] = [
                'columnTotal' => $sumTotalPerColumn,
                'eigenVector' => $eigenVector,
                'columnCount' => $rowCount,
            ];
        }

        return $result;
    }

    /**
     * Load resource for detail page.
     *
     * @return void
     */
    private function loadResourceForDetailPage()
    {
        $this->data['css'][] = asset('/assets/css/Dss/Priority/detail.css');
        $this->data['js'][] = asset('/assets/js/Dss/Priority/detail.js');
    }
}
