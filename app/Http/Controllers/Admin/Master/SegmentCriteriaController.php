<?php
namespace MailMarketing\Http\Controllers\Admin\Master;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateSegmentCriteriaRequest;
use MailMarketing\Models\SegmentCriteria;

class SegmentCriteriaController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'master/segment/criteria';
        $this->data['pageHeader'] = 'Segment Criteria';
        $this->data['pageDescription'] = 'Manage your segment criteria for search tools';
        $this->data['activeMenu'] = 'master';
        $this->data['activeSubMenu'] = 'segmentCriteria';
        $this->setEnableDelete(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = SegmentCriteria::notDeleted()->paginate(10);

        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new segment criteria item';

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
        $this->data['pageDescription'] = 'Update segment criteria item';
        $this->data['model'] = SegmentCriteria::find($id);

        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateSegmentCriteriaRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateSegmentCriteriaRequest $request)
    {
        try {
            \DB::beginTransaction();
            $record = SegmentCriteria::create($request->except('_method', '_token'));
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
     * @param  UpdateSegmentCriteriaRequest $request Request object parameter.
     * @param  integer                      $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSegmentCriteriaRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            $record = SegmentCriteria::find($id);
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
     * Remove the specified resource from storage.
     *
     * @param  integer $id Row ID of model that want to show.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $record = SegmentCriteria::find($id);
            \DB::beginTransaction();
            $record->delete();
            \DB::commit();

            return redirect(action($this->controllerName.'@index'));
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect(action($this->controllerName.'@edit', $id))->withErrors($e->getMessage())->withInput();
        }
    }
}
