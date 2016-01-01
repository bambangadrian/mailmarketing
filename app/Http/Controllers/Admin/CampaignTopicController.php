<?php
namespace MailMarketing\Http\Controllers\Admin;

use MailMarketing\Http\Requests\UpdateCampaignTopicRequest;
use MailMarketing\Models\CampaignTopic;

class CampaignTopicController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        # Set content directory.
        $this->contentDir = 'master/campaign/topic';
        # Set page attributes.
        $this->data['pageHeader'] = 'Campaign Topic';
        $this->data['pageDescription'] = 'Manage your campaign topic';
        $this->data['activeMenu'] = 'master';
        $this->data['activeSubMenu'] = 'campaignTopic';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = CampaignTopic::notDeleted()->paginate(10);
        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new campaign topic item';
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
        $this->data['pageDescription'] = 'Update campaign topic item';
        $this->data['model'] = CampaignTopic::find($id);
        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateCampaignTopicRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateCampaignTopicRequest $request)
    {
        try {
            \DB::beginTransaction();
            $record = CampaignTopic::create($request->except('_method', '_token'));
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
     * @param  UpdateCampaignTopicRequest $request Request object parameter.
     * @param  integer                    $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCampaignTopicRequest $request, $id)
    {
        $redirectPath = action($this->controllerName . '@edit', $id);
        try {
            $record = CampaignTopic::find($id);
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
