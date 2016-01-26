<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateDssConsistencyRequest;
use MailMarketing\Models\Dss;
use MailMarketing\Models\DssCriteria;
use MailMarketing\Models\DssCriteriaDetail;
use MailMarketing\Models\DssRandomIndex;

class DssConsistencyController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->setEnableCreate(false);
        parent::__construct();
        # Set custom reference key.
        $this->setReferenceKey('consistency');
        # Set content directory.
        $this->contentDir = 'dss/consistency';
        # Set page attributes.
        $this->data['pageHeader'] = 'DSS Consistency';
        $this->data['pageDescription'] = 'Manage criteria consistency calculation';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'dssConsistency';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['contentTitle'] = 'Please Select Period to Calculate Criteria Consistency';
        $this->data['model'] = Dss::active()->notDeleted()->paginate(10);

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
        $this->data['pageDescription'] = 'Calculate criteria consistency for selected DSS Period';
        $this->data['contentTitle'] = 'Criteria Consistency Calculation Data';
        $this->data['model'] = Dss::with(
            [
                'criterias' => function ($query) {
                    $query->active()->notDeleted();
                },
            ]
        )->find($id);
        foreach ($this->data['model']->criterias as $criteria) {
            foreach ($this->data['model']->criterias as $compare) {
                $matrixComparison = DssCriteriaDetail::where('Dcd_CriteriaID', $criteria->Dcr_ID)
                                                     ->where('Dcd_CompareID', $compare->Dcr_ID)
                                                     ->first();
                if ($matrixComparison !== null) {
                    $compareValue = $matrixComparison->Dcd_ComparisonMatrixValue;
                    $leftValue = 1;
                    $rightValue = 1;
                    if ($compareValue > 1) {
                        $leftValue = (integer)$compareValue;
                    } elseif ($compareValue < 1) {
                        $rightValue = (integer)(1 / $compareValue);
                    }
                    $this->data['hasCalculated'] = true;
                    $this->data['leftValue'][$criteria->Dcr_ID][$compare->Dcr_ID] = $leftValue;
                    $this->data['rightValue'][$criteria->Dcr_ID][$compare->Dcr_ID] = $rightValue;
                }
            }
        }
        $this->loadResourceForDetailPage();

        return parent::edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDssConsistencyRequest $request Request object parameter.
     * @param  integer                     $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDssConsistencyRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            \DB::beginTransaction();
            $dssData = Dss::with(
                [
                    'criterias' => function ($query) {
                        $query->active()->notDeleted();
                    },
                ]
            )->find($id);
            # Create the temporary array to store the calculation result.
            $tempArray = [];
            foreach ($dssData->criterias as $criteria) {
                foreach ($dssData->criterias as $compare) {
                    $recordCriteriaDetail = DssCriteriaDetail::firstOrNew(
                        [
                            'Dcd_CriteriaID' => $criteria->Dcr_ID,
                            'Dcd_CompareID'  => $compare->Dcr_ID,
                        ]
                    );
                    $compareValue = number_format(
                        $request->get('LeftValue')[$criteria->Dcr_ID][$compare->Dcr_ID] /
                        $request->get('RightValue')[$criteria->Dcr_ID][$compare->Dcr_ID],
                        8
                    );
                    $tempArray[$criteria->Dcr_ID][$compare->Dcr_ID] = $compareValue;
                    $recordCriteriaDetail->Dcd_ComparisonMatrixValue = $compareValue;
                    $recordCriteriaDetail->save();
                }
            }
            $consistencyResult = $this->getConsistencyCalculationResult($tempArray);
            # Calculate lambda max, consistency index, and consistency ratio.
            $criteriaCount = $consistencyResult['columnCount'];
            $randomIndex = DssRandomIndex::where('Dri_NumberColumn', $criteriaCount)->first()->Dri_RandomIndex;
            $lambdaMax = 0;
            foreach ($consistencyResult['eigenVector'] as $key => $value) {
                $recordCriteria = DssCriteria::find($key);
                $recordCriteria->Dcr_EigenVector = $value;
                $recordCriteria->Dcr_MatrixTotal = $consistencyResult['columnTotal'][$key];
                $lambdaMax += ($consistencyResult['columnTotal'][$key] * $value);
                $recordCriteria->save();
            }
            $consistencyIndex = number_format(($lambdaMax - $criteriaCount) / ($criteriaCount - 1), 8);
            $consistencyRatio = number_format($consistencyIndex / $randomIndex, 8);
            $recordPeriod = Dss::find($id);
            $recordPeriod->Dss_CriteriaEigenValue = $lambdaMax;
            $recordPeriod->Dss_CriteriaConsistencyIndex = $consistencyIndex;
            $recordPeriod->Dss_CriteriaConsistencyRatio = $consistencyRatio;
            $recordPeriod->save();
            \DB::commit();

            return redirect($redirectPath);
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect($redirectPath)->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Get dss criteria consistency calculation result.
     *
     * @param array $matrixArray Matrix array parameter.
     *
     * @return array
     */
    private function getConsistencyCalculationResult(array $matrixArray)
    {
        # Get the total column per criteria.
        $sumTotalPerColumn = [];
        foreach ($matrixArray as $row) {
            foreach ($row as $column => $value) {
                if (array_key_exists($column, $sumTotalPerColumn) === false) {
                    $sumTotalPerColumn[$column] = 0;
                }
                $sumTotalPerColumn[$column] += $value;
            }
        }
        # Divide each value on specified column per total column.
        foreach ($matrixArray as $index => $row) {
            foreach ($row as $column => $value) {
                $matrixArray[$index][$column] = number_format($value / $sumTotalPerColumn[$column], 8);
            }
        }
        # Calculate the mean for each row to get the eigen value.
        $rowCount = count($matrixArray);
        $eigenVector = [];
        foreach ($matrixArray as $index => $row) {
            $rowTotal = 0;
            foreach ($row as $column => $value) {
                $rowTotal += $matrixArray[$index][$column];
            }
            $eigenVector[$index] = number_format($rowTotal / $rowCount, 8);
        }
        $result = [
            'columnTotal' => $sumTotalPerColumn,
            'eigenVector' => $eigenVector,
            'columnCount' => $rowCount,
        ];

        return $result;
    }

    /**
     * Load resource for detail page.
     *
     * @return void
     */
    private function loadResourceForDetailPage()
    {
        $this->data['css'][] = asset('/assets/css/Dss/Consistency/detail.css');
        $this->data['js'][] = asset('/assets/js/Dss/Consistency/detail.js');
    }
}
