<?php
namespace MailMarketing\Http\Controllers\Admin\Master;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateTrackingStatusRequest;
use MailMarketing\Models\MailTrackingStatus;

class TrackingStatusController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        # Set custom reference key.
        $this->setReferenceKey('trackstatus');
        # Set content directory.
        $this->contentDir = 'master/trackingStatus';
        # Set page attributes.
        $this->data['pageHeader'] = 'Tracking Status';
        $this->data['pageDescription'] = 'Manage tracking status data';
        $this->data['activeMenu'] = 'master';
        $this->data['activeSubMenu'] = 'trackStatus';
        $this->setEnableDelete(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = MailTrackingStatus::notDeleted()->paginate(10);

        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new mail tracking status item';

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
        $this->data['pageDescription'] = 'Update mail tracking status item';
        $this->data['model'] = MailTrackingStatus::find($id);

        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateTrackingStatusRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateTrackingStatusRequest $request)
    {
        try {
            \DB::beginTransaction();
            $record = MailTrackingStatus::create($request->except('_method', '_token'));
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
     * @param  UpdateTrackingStatusRequest $request Request object parameter.
     * @param  integer                     $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackingStatusRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            $record = MailTrackingStatus::find($id);
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
            $record = MailTrackingStatus::find($id);
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
