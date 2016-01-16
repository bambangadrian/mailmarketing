<?php
namespace MailMarketing\Http\Controllers\Admin\Mail;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\CreateSentCampaign;
use MailMarketing\Models\Campaign;
use MailMarketing\Models\MailList;
use MailMarketing\Models\MailSchedule;
use MailMarketing\Models\SubscriberGroup;

class CampaignScheduleController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        # Set content directory.
        $this->contentDir = 'mail/schedule';
        # Set page attributes.
        $this->data['pageHeader'] = 'Campaign Schedule';
        $this->data['pageDescription'] = 'Manage your mail campaign schedule';
        $this->data['activeMenu'] = 'mail';
        $this->data['activeSubMenu'] = 'mailSchedule';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = MailSchedule::notDeleted()->with('campaign')->paginate(10);
        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new mail campaign schedule';
        $this->data['subscriberGroupOptions'] = ['Select Mail List First ...'];
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
        $this->data['pageDescription'] = 'Update your mail campaign schedule';
        $this->data['model'] = MailSchedule::find($id);
        $this->data['subscriberGroupOptions'] = SubscriberGroup::active()->notDeleted()->lists('Sbg_Name', 'Sbg_ID')->prepend('Please Select Subscriber Group ...');
        $this->loadOptions();
        $this->loadResourceForDetailPage();
        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateSentCampaign $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSentCampaign $request)
    {
        try {
            \DB::beginTransaction();
            $record = MailSchedule::create($request->except('_method', '_token'));
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
     * @param  CreateSentCampaign $request Request object parameter.
     * @param  integer                $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSentCampaign $request, $id)
    {
        $redirectPath = action($this->controllerName . '@edit', $id);
        try {
            $record = MailSchedule::find($id);
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
        $this->data['css'][] = asset('/vendor/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css');
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.full.min.js');
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/moment/moment.min.js');
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js');
    }

    /**
     * Load options data that will be used for detail page.
     *
     * @return void
     */
    private function loadOptions()
    {
        $this->data['campaignOptions'] = Campaign::active()->notDeleted()->lists('Cpg_Name', 'Cpg_ID')->prepend('Please Select Campaign ...');
        $this->data['mailListOptions'] = MailList::active()->notDeleted()->lists('Mls_Name', 'Mls_ID')->prepend('Please Select Mail List ...', '');
    }
}
