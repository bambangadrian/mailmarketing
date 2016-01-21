<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateDssCriteriaRequest;
use MailMarketing\Models\Dss;
use MailMarketing\Models\DssCriteria;

class DssCriteriaController extends AbstractAdminController
{

	/**
	 * Class constructor.
	 */
	public function __construct()
	{
		parent::__construct();
		# Set content directory.
		$this->contentDir = 'dss/criteria';
		# Set page attributes.
		$this->data['pageHeader'] = 'DSS Criteria';
		$this->data['pageDescription'] = 'Manage your list of all criteria that will be used for decision support system';
		$this->data['activeMenu'] = 'dss';
		$this->data['activeSubMenu'] = 'dssCriteria';
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$this->data['model'] = DssCriteria::notDeleted()->with('dss')->paginate(10);
		return parent::index();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$this->data['pageDescription'] = 'Create new decision support criteria item';
		$this->loadOptions();
		$this->loadResourceForDetailPage();
		return parent::create();
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
		$this->data['pageDescription'] = 'Update decision support criteria item';
		$this->data['model'] = DssCriteria::find($id);
		$this->loadOptions();
		$this->loadResourceForDetailPage();
		return parent::edit($id);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param UpdateDssCriteriaRequest $request Request object parameter.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(UpdateDssCriteriaRequest $request)
	{
		try {
			\DB::beginTransaction();
			$record = DssCriteria::create($request->except('_method', '_token'));
			\DB::commit();
			return redirect()->action($this->controllerName . '@edit', $record->getKey());
		} catch (\Exception $e) {
			\DB::rollback();
			return redirect()->action($this->controllerName . '@create')->withErrors($e->getMessage())->withInput();
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  UpdateDssCriteriaRequest $request Request object parameter.
	 * @param  integer                  $id      Model ID parameter.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateDssCriteriaRequest $request, $id)
	{
		$redirectPath = action($this->controllerName . '@edit', $id);
		try {
			$record = DssCriteria::find($id);
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
		$this->data['css'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.min.css');
		$this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.full.min.js');
	}

	/**
	 * Load options data that will be used for detail page.
	 *
	 * @return void
	 */
	private function loadOptions()
	{
		$this->data['dssOptions'] = Dss::active()->notDeleted()->lists('Dss_Name', 'Dss_ID')->prepend('Please Select Dss Period ...', '');
	}
}
