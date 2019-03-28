<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests;
use MailMarketing\Http\Requests\UpdateDssRequest;
use MailMarketing\Models\Dss;

class DssPeriodController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        # Set content directory.
        $this->contentDir = 'dss/period';
        # Set page attributes.
        $this->data['pageHeader'] = 'DSS Period';
        $this->data['pageDescription'] = 'Manage your decision support period';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'dssPeriod';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = Dss::notDeleted()->paginate(10);

        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create decision support period item';
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
        $this->data['pageDescription'] = 'Update decision support period item';
        $this->data['model'] = Dss::find($id);
        $this->loadResourceForDetailPage();

        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateDssRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateDssRequest $request)
    {
        try {
            \DB::beginTransaction();
            $record = Dss::create($request->except('_method', '_token'));
            \DB::commit();

            return redirect()->action($this->controllerName.'@edit', $record->getKey());
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()->action($this->controllerName.'@create')->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateDssRequest $request Request object parameter.
     * @param  integer          $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDssRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            $record = Dss::find($id);
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
        $this->data['css'][] = asset('/vendor/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css');
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/moment/moment.min.js');
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js');
    }
}
