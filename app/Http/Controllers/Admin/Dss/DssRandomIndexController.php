<?php
namespace MailMarketing\Http\Controllers\Admin\Dss;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateDssRandomIndexRequest;
use MailMarketing\Models\DssRandomIndex;

class DssRandomIndexController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        # Set content directory.
        $this->contentDir = 'dss/randomIndex';
        # Set page attributes.
        $this->data['pageHeader'] = 'Random Index';
        $this->data['pageDescription'] = 'List all random index to check consistency';
        $this->data['activeMenu'] = 'dss';
        $this->data['activeSubMenu'] = 'dssRandomIndex';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = DssRandomIndex::notDeleted()->paginate(10);

        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create random index item';

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
        $this->data['pageDescription'] = 'Update random index item';
        $this->data['model'] = DssRandomIndex::find($id);

        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateDssRandomIndexRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateDssRandomIndexRequest $request)
    {
        try {
            \DB::beginTransaction();
            $record = DssRandomIndex::create($request->except('_method', '_token'));
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
     * @param  UpdateDssRandomIndexRequest $request Request object parameter.
     * @param  integer                     $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDssRandomIndexRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            $record = DssRandomIndex::find($id);
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
}
