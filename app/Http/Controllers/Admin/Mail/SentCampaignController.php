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
            # Get the campaign model.
            $recordCampaign = Campaign::with('campaignCategory', 'campaignType', 'campaignTopic')->find($campaignID);
            $recordCampaignType = $recordCampaign->campaignType;
            # Get subscriber group detail data.
            $groupID = $request->get('Msd_SubscriberGroupID');
            $recordSubscriberGroup = SubscriberGroup::with('mailList')->find($groupID);
            $recordMailList = $recordSubscriberGroup->mailList;
            $recordSubGroupList = SubscriberGroup::active()
                                                 ->notDeleted()
                                                 ->where('Sbg_ParentID', $groupID)
                                                 ->lists('Sbg_ID')
                                                 ->prepend($groupID);
            # Get the record of subscriber group detail data.
            $recordSubscriberGroupDetail = SubscriberGroupDetail::active()
                                                                ->notDeleted()
                                                                ->with('subscriber')
                                                                ->whereIn('Sgd_GroupID', $recordSubGroupList)
                                                                ->groupBy('Sgd_SubscriberID')
                                                                ->get();
            # Step to assign default mail from address and name :
            # Check out from the campaign directly
            # If empty then check from the mailing list
            $fromEmail = $recordCampaign->Cpg_EmailAddressFrom;
            $fromName = $recordCampaign->Cpg_EmailNameFrom;
            $replyToEmail = $recordCampaign->Cpg_EmailAddressReplyTo;
            $replyToName = $recordCampaign->Cpg_EmailNameReplyTo;
            $mailListEmail = $recordMailList->Mls_EmailAddressFrom;
            $mailListName = $recordMailList->Mls_EmailNameFrom;
            if (empty($fromEmail) === true) {
                $fromEmail = $mailListEmail;
            }
            if (empty($fromName) === true) {
                $fromName = $mailListName;
            }
            if (empty($replyToEmail) === true) {
                $replyToEmail = $recordMailList->Mls_EmailAddressReplyTo;
            }
            if (empty($replyToName) === true) {
                $replyToName = $recordMailList->Mls_EmailNameReplyTo;
            }
            # Build the mail array data model.
            $mailArr = [
                'to'          => [],
                'mailList'    => ['email' => $mailListEmail, 'name' => $mailListName],
                'from'        => $fromEmail,
                'fromName'    => $fromName,
                'replyTo'     => $replyToEmail,
                'replyToName' => $replyToName,
                'subject'     => $recordCampaign->Cpg_EmailSubject,
                'content'     => $recordCampaign->Cpg_Content,
                'view'        => 'storageView::'.camel_case($recordCampaign->template->Tpl_Name).'.index',
                'tag'         => [$recordCampaign->campaignCategory->Cc_Name, $recordCampaign->campaignTopic->Cto_Name],
                'campaignID'  => $recordCampaign->Cpg_MailgunCampaignID
            ];
            # Start database transaction.
            \DB::beginTransaction();
            # Create the mail schedule.
            $request->merge(['Msd_IsExecuted' => 0]);
            if ($request->get('RealTime') === '1') {
                $request->merge(['Msd_IsExecuted' => 1]);
            }
            $recordMailSchedule = MailSchedule::create($request->except('_method', '_token'));
            $massSentMailData = [];
            # Set the email-to address.
            foreach ($recordSubscriberGroupDetail as $row) {
                $mailArr['to'][] = [
                    'email' => $row->subscriber->Sbr_EmailAddress,
                    'name'  => $row->subscriber->Sbr_FirstName.' '.$row->subscriber->Sbr_LastName
                ];
                $massSentMailData[] = [
                    'Sm_MailScheduleID'   => $recordMailSchedule->getKey(),
                    'Sm_SubscriberListID' => $row->Sgd_ID,
                    'Sm_Active'           => 1
                ];
            }
            # Send email using mailgun.
            # Create the campaign, and enable the tracking.
            # Set the message view first.
            $messageView = [];
            # Set the message data. @todo Custom Email Message Data.
            $messageData['content'] = $mailArr['content'];
            if ((integer)$recordCampaignType->Cgt_ID === 1) {
                $messageView = ['text' => $mailArr['view']];
            } elseif ((integer)$recordCampaignType->Cgt_ID === 2) {
                $messageView = [$mailArr['view']];
            }
            $sentMailgunResult = \Mailgun::send(
                $messageView,
                $messageData,
                function ($message) use ($mailArr) {
                    $message->from($mailArr['from'], $mailArr['fromName']);
                    $message->replyTo($mailArr['replyTo'], $mailArr['replyToName']);
                    $message->to($mailArr['mailList']['email'], $mailArr['mailList']['name']);
                    foreach ($mailArr['to'] as $subscriber) {
                        $message->bcc($subscriber['email'], $subscriber['name']);
                    }
                    $message->subject($mailArr['subject']);
                    $message->tag($mailArr['tag']);
                    $message->campaign($mailArr['campaignID']);
                    $message->trackClicks(true);
                    $message->trackOpens(true);
                    $message->tracking(true);
                }
            );
            # Insert into sent mail table.
            foreach ($massSentMailData as $row) {
                $row = array_merge($row, ['Sm_MailgunSentMailID' => $sentMailgunResult->http_response_body->id]);
                SentMail::create($row);
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
