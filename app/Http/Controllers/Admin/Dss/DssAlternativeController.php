<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateDssAlternativeRequest;
use MailMarketing\Models\DssAlternative;
use MailMarketing\Models\Dss;

class DssAlternativeController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'dss/alternative';
        $this->data['pageHeader'] = 'DSS Alternative';
        $this->data['pageDescription'] = 'Manage your list of all alternative that will be used for decision support system';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'dssAlternative';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = DssAlternative::notDeleted()->paginate(10);
        return $this->renderPage();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new decision support alternative item';
        $this->data['formAction'] = action($this->controllerName . '@store');
        $this->data['dssOptions'] = Dss::active()->notDeleted()->lists('Dss_Name', 'Dss_ID')->prepend('Please Select Dss Period ...', '');
        return $this->renderPage('create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['pageDescription'] = 'Create new decision support alternative item';
        $this->data['model'] = DssAlternative::find($id);
        $this->data['formAction'] = action($this->controllerName . '@update', $id);
        $this->data['dssOptions'] = Dss::active()->notDeleted()->lists('Dss_Name', 'Dss_ID')->prepend('Please Select Dss Period ...', '');
        return $this->renderPage('edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateDssAlternativeRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateDssAlternativeRequest $request)
    {
        try {
            \DB::beginTransaction();
            $record = DssAlternative::create($request->except('_method', '_token'));
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
     * @param  UpdateDssAlternativeRequest $request Request object parameter.
     * @param  integer                     $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDssAlternativeRequest $request, $id)
    {
        try {
            $record = DssAlternative::find($id);
            \DB::beginTransaction();
            $record->fill($request->except('_method', '_token'));
            $record->save();
            \DB::commit();
            return redirect()->action($this->controllerName . '@edit', $record->getKey());
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->action($this->controllerName . '@edit', $record->getKey())->withErrors($e->getMessage())->withInput();
        }
    }
}
