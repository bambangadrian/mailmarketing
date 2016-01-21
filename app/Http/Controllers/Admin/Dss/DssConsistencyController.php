<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateDssConsistencyRequest;
use MailMarketing\Models\Dss;
use MailMarketing\Models\DssCriteria;
use MailMarketing\Models\DssCriteriaDetail;

class DssConsistencyController extends AbstractAdminController
{

	/**
	 * Class constructor.
	 */
	public function __construct()
	{
		$this->setEnableCreate(false);
		parent::__construct();
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
		$this->data['contentTitle'] = 'Please select period to calculate criteria consistency ...';
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
		$this->data['contentTitle'] = 'Criteria consistency calculation data.';
		$dataDss = Dss::with(
			[
				'criterias'         => function ($query) {
					$query->notDeleted()->active();
				},
				'criterias.details' => function ($query) {
					$query->notDeleted();
				}
			]
		)->find($id);
		$dataCriteria = $dataDss->criterias;
		$dataCriteriaDetail = $dataDss->criterias()->dss();
		dd($dataCriteriaDetail);
		if ($dataCriteriaDetail !== null) {
			foreach ($dataCriteriaDetail as $row) {
				$this->data['criteriaDetail']['Dcd_CriteriaID']['Dcd_CompareID'] = $row->Dcd_ComparisonMatrixValue;
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
		$redirectPath = action($this->controllerName . '@edit', $id);
		try {
			foreach ($request->get('Dcd_ComparisonMatrixValue') as $key => $row) {
			}
			$record = DssCriteriaDetail::find($id);
			\DB::beginTransaction();
			$record->fill($request->except('_method', '_token'));
			$record->save();
			\DB::commit();
			return redirect($redirectPath);
		} catch (\Exception $e) {
			\DB::rollback();
			return redirect($redirectPath)->withErrors($e->getMessage())->withInput();
		}
	}

	/**
	 * Load resource for detail page.
	 *
	 * @return void
	 */
	private function loadResourceForDetailPage()
	{
		$this->data['css'][] = asset('/assets/css/consistency.css');
	}
}
