<?php
namespace MailMarketing\Http\Controllers\Admin\Mail;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\CreateSentCampaignRequest;
use MailMarketing\Models\Campaign;
use MailMarketing\Models\MailList;
use MailMarketing\Models\MailSchedule;
use MailMarketing\Models\SentMail;
use MailMarketing\Models\SubscriberGroup;
use MailMarketing\Models\SubscriberGroupDetail;

class SentCampaignController extends AbstractAdminController
{

    /**
     * Enable update flag property.
     *
     * @var boolean $enableUpdate
     */
    protected $enableUpdate = false;

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->setEnableCrud(false);
        parent::__construct();
        # Set custom reference key.
        $this->setReferenceKey('campaign');
        # Set content directory.
        $this->contentDir = 'mail/campaign/sent';
        # Set page attributes.
        $this->data['pageHeader'] = 'Campaign';
        $this->data['pageDescription'] = 'Select the subscriber list to sent this mail campaign';
        $this->data['activeMenu'] = 'mail';
        $this->data['activeSubMenu'] = 'mailCampaign';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param integer $campaignID Campaign ID row model parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($campaignID = null)
    {
        $this->setCreate(true);
        $this->setEnableUpdate(false);
        $this->data['campaignID'] = $campaignID;
        $this->data['referenceValue'] = $this->getReferenceValue();
        $this->data['buttons'] = $this->renderPartialView('button');
        $this->data['formAction'] = action($this->controllerName.'@store', $campaignID);
        $this->data['indexLinkAction'] = action('Admin\Mail\CampaignController@edit', $campaignID);
        $this->data['mailListOptions'] = MailList::active()
                                                 ->notDeleted()
                                                 ->lists('Mls_Name', 'Mls_ID')
                                                 ->prepend('Please Select Mail List ...', '');
        $this->data['subscriberGroupOptions'] = ['Select Mail List First ...'];
        $this->loadResourceForDetailPage();

        return $this->renderPage('detail');
    }

    /**
     * Do sent mail campaign, save to mail schedule, and save to sent mail.
     *
     * @param  CreateSentCampaignRequest $request    Request object parameter.
     * @param integer                    $campaignID Campaign ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSentCampaignRequest $request, $campaignID)
    {
        try {
            \DB::beginTransaction();
            # Get the campaign model.
            $campaignModel = Campaign::find($campaignID);
            $mailArr = [
                'to'       => [],
                'from'     => $campaignModel->Cpg_EmailAddressFrom,
                'fromName' => $campaignModel->Cpg_EmailNameFrom,
                'subject'  => $campaignModel->Cpg_EmailSubject,
                'content'  => $campaignModel->Cpg_Content,
                'view'     => 'storageView::'.camel_case($campaignModel->template->Tpl_Name).'.index'
            ];

            # Step to assign default mail from address and name :
            # 1. Check out from the campaign directly
            # 2. Then check from the mailing list
            # 3. Then check from company profile

            $this->data['content'] = $mailArr['content'];
            # Create the mail schedule.
            $request->merge(['Msd_IsExecuted' => 0]);
            if ($request->get('RealTime') === '1') {
                $request->merge(['Msd_IsExecuted' => 1]);
            }
            $mailScheduleRecord = MailSchedule::create($request->except('_method', '_token'));
            # Insert into sent mail table.
            $groupID = $request->get('Msd_SubscriberGroupID');
            $subGroupList = SubscriberGroup::active()
                                           ->notDeleted()->where('Sbg_ParentID', $groupID)
                                           ->lists('Sbg_ID')->prepend($groupID);
            $subscriberGroup = SubscriberGroupDetail::notDeleted()
                                                    ->with('subscriber')
                                                    ->whereIn('Sgd_GroupID', $subGroupList)
                                                    ->groupBy('Sgd_SubscriberID')
                                                    ->get();
            foreach ($subscriberGroup as $row) {
                //$mailArr['to'][] = $row->subscriber->Sbr_EmailAddress;
                $mailArr['to'][] = [
                    $row->subscriber->Sbr_EmailAddress,
                    $row->subscriber->Sbr_FirstName.' '.$row->subscriber->Sbr_LastName
                ];
                $sentMailRecord = new SentMail();
                $sentMailRecord->Sm_MailScheduleID = $mailScheduleRecord->getKey();
                $sentMailRecord->Sm_SubscriberListID = $row->Sgd_ID;
                $sentMailRecord->Sm_Active = 1;
                $sentMailRecord->push();
            }
            foreach ($mailArr['to'] as $mailTo) {
                \Mail::send(
                    $mailArr['view'],
                    $this->data,
                    function ($message) use ($mailArr, $mailTo) {
                        $message->from($mailArr['from'], $mailArr['fromName']);
                        $message->to($mailTo[0], $mailTo[1]);
                        $message->subject($mailArr['subject']);
                    }
                );
            }
            # Commit to database if sent mail has ran
            \DB::commit();

            return redirect()->action('Admin\Mail\MailScheduleController@index')
                             ->with(
                                 [
                                     'status'  => 'success',
                                     'message' => 'Your campaign schedule has been created'
                                 ]
                             );
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()
                ->action('Admin\Mail\SentCampaignController@index', $campaignID)
                ->withErrors($e->getMessage())
                ->withInput();
        }
    }

    /**
     * Load resource for detail page.
     *
     * @return void
     */
    private function loadResourceForDetailPage()
    {
        $adminLtePluginPath = '/vendor/bower_components/AdminLTE/plugins/';
        $this->data['css'][] = asset($adminLtePluginPath.'daterangepicker/daterangepicker-bs3.css');
        $this->data['css'][] = asset($adminLtePluginPath.'select2/select2.min.css');
        $this->data['js'][] = asset($adminLtePluginPath.'select2/select2.full.min.js');
        $this->data['js'][] = asset($adminLtePluginPath.'moment/moment.min.js');
        $this->data['js'][] = asset($adminLtePluginPath.'daterangepicker/daterangepicker.js');
    }
}
