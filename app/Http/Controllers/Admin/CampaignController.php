<?php
namespace MailMarketing\Http\Controllers\Admin;

use MailMarketing\Http\Requests\createSentMailCampaign;
use MailMarketing\Http\Requests\UpdateCampaignRequest;
use MailMarketing\Models\Campaign;
use MailMarketing\Models\CampaignCategory;
use MailMarketing\Models\CampaignTopic;
use MailMarketing\Models\CampaignType;
use MailMarketing\Models\MailSchedule;
use MailMarketing\Models\Template;
use MailMarketing\Models\MailList;

class CampaignController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'mail/campaign';
        $this->data['pageHeader'] = 'Campaign';
        $this->data['pageDescription'] = 'Manage your campaign data';
        $this->data['activeMenu'] = 'mail';
        $this->data['activeSubMenu'] = 'mailCampaign';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = Campaign::notDeleted()->with('campaignCategory', 'campaignTopic', 'campaignType', 'template')->paginate(10);
        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new mail campaign item';
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
        $this->data['pageDescription'] = 'Update mail campaign item';
        $this->data['model'] = Campaign::find($id);
        $this->data['buttons'] = $this->renderPartialView('button');
        $this->loadOptions();
        $this->loadResourceForDetailPage();
        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateCampaignRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateCampaignRequest $request)
    {
        try {
            if (trim($request->get('Cpg_TemplateID')) === '' or $request->get('Cpg_TemplateID') === '0') {
                $request->merge(['Cpg_TemplateID' => null]);
            }
            \DB::beginTransaction();
            $record = Campaign::create($request->except('_method', '_token'));
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
     * @param  UpdateCampaignRequest $request Request object parameter.
     * @param  integer               $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCampaignRequest $request, $id)
    {
        $redirectPath = action($this->controllerName . '@edit', $id);
        try {
            if (trim($request->get('Cpg_TemplateID')) === '' or $request->get('Cpg_TemplateID') === '0') {
                $request->replace(['Cpg_TemplateID' => null]);
            }
            $record = Campaign::find($id);
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
     * Get sent mail campaign process page.
     *
     * @param integer $id Row model id parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function getSent($id)
    {
        $this->contentDir = 'mail/campaign/sent';
        $this->data['pageHeader'] = 'Campaign';
        $this->data['pageDescription'] = 'Select the subscriber list to sent this mail campaign';
        $this->data['contentTitle'] = 'Select Mail List';
        $this->data['activeMenu'] = 'mail';
        $this->data['activeSubMenu'] = 'mailCampaign';
        $this->data['formAction'] = action($this->controllerName . '@doSent', $id);
        $this->data['css'][] = asset('/assets/css/detail.css');
        $this->data['buttons'] = $this->renderPartialView('button');
        $this->data['mailListOptions'] = MailList::active()->notDeleted()->lists('Mls_Name', 'Mls_ID')->prepend('Please Select Mail List ...', '');
        $this->data['css'][] = asset('/vendor/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker-bs3.css');
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/moment/moment.min.js');
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/daterangepicker/daterangepicker.js');
        $this->loadResourceForDetailPage();
        $this->setReferenceKey($id);
        $this->setCreate(true);
        $this->setEnableUpdate(false);
        return $this->renderPage('detail');
    }

    /**
     * Do sent mail campaign, save to mail schedule, and save to sent mail.
     *
     * @param  CreateSentMailCampaign $request Request object parameter.
     * @param integer                 $id      Row model id parameter.
     *
     * @return void
     */
    public function doSent(CreateSentMailCampaign $request, $id)
    {
        $redirectPath = action('Admin\CampaignScheduleController@index');
        try {
            $subscriberList = MailList::find($request->get('Msd_CampaignID'))->subscriberGroups()->subscribers();
            dd($subscriberList);
            \DB::beginTransaction();
            $record = MailSchedule::create($request->except('_method', '_token'));
            \DB::commit();
            return redirect($redirectPath);
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect($redirectPath)->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Load javascript files.
     *
     * @return void
     */
    protected function loadJs()
    {
        $this->data['js'][] = asset('/vendor/ckeditor/ckeditor.js');
    }

    /**
     * Load resource for detail page.
     *
     * @return void
     */
    private function loadResourceForDetailPage()
    {
        $this->data['css'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.min.css');
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.min.js');
    }

    /**
     * Load options data that will be used for detail page.
     *
     * @return void
     */
    private function loadOptions()
    {
        $this->data['campaignCategoryOptions'] = CampaignCategory::active()->notDeleted()->lists('Cc_Name', 'Cc_ID')->prepend('Please Select Campaign Category ...', '');
        $this->data['campaignTypeOptions'] = CampaignType::active()->notDeleted()->lists('Cgt_Name', 'Cgt_ID')->prepend('Please Select Campaign Type ...', '');
        $this->data['campaignTopicOptions'] = CampaignTopic::active()->notDeleted()->lists('Cto_Name', 'Cto_ID')->prepend('Please Select Campaign Topic ...', '');
        $this->data['templateOptions'] = Template::active()->notDeleted()->lists('Tpl_Name', 'Tpl_ID')->prepend('Please Select Template ...', '');
    }
}
