<?php
namespace MailMarketing\Http\Controllers\Admin\Mail;

use MailMarketing\Helpers\Helper;
use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateSubscriberGroupDetailRequest;
use MailMarketing\Models\MailList;
use MailMarketing\Models\Subscriber;
use MailMarketing\Models\SubscriberGroup;
use MailMarketing\Models\SubscriberGroupDetail;

class SubscriberGroupDetailController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        # Set content directory.
        $this->contentDir = 'mail/mailList/group/groupDetail';
        # Set page attributes.
        $this->data['pageHeader'] = 'Subscriber Group Detail';
        $this->data['pageDescription'] = 'Manage your subscriber group detail list';
        $this->data['activeMenu'] = 'mail';
        $this->data['activeSubMenu'] = 'mailList';
        $this->setEnableDelete(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @param integer $listID  Mailing list ID parameter.
     * @param integer $groupID Subscriber group ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($listID = null, $groupID = null)
    {
        $this->data['listID'] = $listID;
        $this->data['groupID'] = $groupID;
        $subGroupList = SubscriberGroup::active()
                                       ->notDeleted()->where('Sbg_ParentID', $groupID)
                                       ->lists('Sbg_ID')
                                       ->prepend($groupID);
        $this->data['model'] = SubscriberGroupDetail::notDeleted()
                                                    ->with('subscriber', 'subscriberGroup')
                                                    ->whereIn('Sgd_GroupID', $subGroupList)
                                                    ->groupBy('Sgd_SubscriberID')
                                                    ->paginate(10);
        $this->data['createLinkAction'] = action($this->controllerName.'@create', [$listID, $groupID]);
        $this->data['buttons'] = $this->renderPartialView('navigation');

        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param integer $listID  Mailing list ID parameter.
     * @param integer $groupID Subscriber group ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($listID = null, $groupID = null)
    {
        $this->data['listID'] = $listID;
        $this->data['groupID'] = $groupID;
        $this->data['pageDescription'] = 'Add your subscriber to this mailing list group';
        $this->data['indexLinkAction'] = action($this->controllerName.'@index', [$listID, $groupID]);
        $this->data['formAction'] = action($this->controllerName.'@store', [$listID, $groupID]);
        $subGroupList = SubscriberGroup::active()
                                       ->notDeleted()
                                       ->where('Sbg_ParentID', $groupID)
                                       ->lists('Sbg_ID')
                                       ->prepend($groupID);
        $this->data['subscriberOptions'] = Subscriber::active()
                                                     ->notDeleted()
                                                     ->whereNotExists(
                                                         function ($query) use ($subGroupList) {
                                                             $query->select(\DB::raw(1))
                                                                   ->from('SubscriberGroupDetail')
                                                                   ->whereRaw('(tbl_Subscriber.Sbr_ID = tbl_SubscriberGroupDetail.Sgd_SubscriberID)')
                                                                   ->whereIn('Sgd_GroupID', $subGroupList)
                                                                   ->whereNull('Sgd_DeletedOn');
                                                         }
                                                     )
                                                     ->lists('Sbr_EmailAddress', 'Sbr_ID');
        $this->loadResourceForDetailPage();

        return parent::create();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param integer $listID   Mailing list ID parameter.
     * @param integer $groupID  Subscriber group ID parameter.
     * @param integer $detailID Row ID of model that want to edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($listID, $groupID = null, $detailID = null)
    {
        $this->data['listID'] = $listID;
        $this->data['groupID'] = $groupID;
        $this->data['pageDescription'] = 'Modify the subscriber list on this mailing list group';
        $this->data['indexLinkAction'] = action($this->controllerName.'@index', [$listID, $groupID]);
        $this->data['formAction'] = action($this->controllerName.'@update', [$listID, $groupID, $detailID]);
        $this->data['formDeleteAction'] = action($this->controllerName.'@destroy', [$listID, $groupID, $detailID]);
        $this->data['model'] = SubscriberGroupDetail::notDeleted()->with('subscriber')->find($detailID);

        return parent::edit($groupID);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateSubscriberGroupDetailRequest $request Request object parameter.
     * @param integer                            $listID  Mailing list ID parameter.
     * @param integer                            $groupID Subscriber group ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateSubscriberGroupDetailRequest $request, $listID, $groupID)
    {
        try {
            $members = [];
            $dataInputForSubscriberGroupDetail = [];
            $recordMailList = MailList::find($listID);
            $recordSubscriberGroup = SubscriberGroup::find($groupID);
            # Synchronize to mailgun.
            foreach ($request->get('Sgd_SubscriberID') as $subscriberID) {
                $recordSubscriber = Subscriber::find($subscriberID);
                if (empty($recordSubscriber) === false) {
                    $varsParam = [];
                    if (empty($recordSubscriber->Sbr_BirthDay) === false) {
                        $varsParam['age'] = Helper::calculateAge($recordSubscriber->Sbr_BirthDay);
                    }
                    if (empty($recordSubscriber->Sbr_Gender) === false) {
                        $varsParam['gender'] = Helper::translateCode($recordSubscriber->Sbr_Gender, 'gender');
                    }
                    $varsParam['subscribedVia'] = 'admin';
                    $varsParam['group'] = $recordSubscriberGroup->Sbg_Name;
                    $members[] = [
                        'address'    => $recordSubscriber->Sbr_EmailAddress,
                        'name'       => $recordSubscriber->Sbr_FirstName.' '.$recordSubscriber->Sbr_LastName,
                        'vars'       => json_encode($varsParam),
                        'subscribed' => true,
                    ];
                    $dataInputForSubscriberGroupDetail[] = [
                        'Sgd_GroupID'       => $request->get('Sgd_GroupID'),
                        'Sgd_SubscriberID'  => $subscriberID,
                        'Sgd_Active'        => $request->get('Sgd_Active'),
                        'Sgd_SubscribedVia' => 'admin',
                        'Sgd_SubscribedOn'  => date('Y-m-d')
                    ];
                }
            }
            if (count($members) > 0) {
                \Mailgun::lists()->addMembers($recordMailList->Mls_EmailAddressFrom, $members, true);
            }
            # Start insert into subscriber group detail.
            \DB::beginTransaction();
            foreach ($dataInputForSubscriberGroupDetail as $row) {
                SubscriberGroupDetail::create($row);
            }
            \DB::commit();

            return redirect()->action($this->controllerName.'@index', [$listID, $groupID]);
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()->action($this->controllerName.'@create', [$listID, $groupID])
                             ->withErrors($e->getMessage())
                             ->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSubscriberGroupDetailRequest $request  Request object parameter.
     * @param integer                            $listID   Mailing list ID parameter.
     * @param integer                            $groupID  Subscriber group ID parameter.
     * @param integer                            $detailID Row ID of model that want to edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriberGroupDetailRequest $request, $listID, $groupID, $detailID)
    {
        $redirectPath = action($this->controllerName.'@edit', [$listID, $groupID, $detailID]);
        try {
            $recordMailList = MailList::find($listID);
            $recordSubscriberGroup = SubscriberGroup::find($groupID);
            $recordSubscriberGroupDetail = SubscriberGroupDetail::with('subscriber')->find($detailID);
            $recordSubscriber = $recordSubscriberGroupDetail->subscriber;
            $varsParam = [];
            if (empty($recordSubscriber->Sbr_BirthDay) === false) {
                $varsParam['age'] = Helper::calculateAge($recordSubscriber->Sbr_BirthDay);
            }
            if (empty($recordSubscriber->Sbr_Gender) === false) {
                $varsParam['gender'] = Helper::translateCode($recordSubscriber->Sbr_Gender, 'gender');
            }
            $varsParam['subscribedVia'] = 'admin';
            $varsParam['group'] = $recordSubscriberGroup->Sbg_Name;
            $subscribed = true;
            if ((integer)$request->get('Sgd_Active') === 0) {
                $subscribed = false;
            }
            \Mailgun::lists()->updateMember(
                $recordMailList->Mls_EmailAddressFrom,
                $recordSubscriberGroupDetail->subscriber->Sbr_EmailAddress,
                [
                    'address'    => $recordSubscriber->Sbr_EmailAddress,
                    'name'       => $recordSubscriber->Sbr_FirstName.' '.$recordSubscriber->Sbr_LastName,
                    'vars'       => json_encode($varsParam),
                    'subscribed' => $subscribed
                ]
            );
            \DB::beginTransaction();
            $recordSubscriberGroupDetail->Sgd_Active = $request->get('Sgd_Active');
            $recordSubscriberGroupDetail->save();
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
     * @param integer $listID   Mailing list ID parameter.
     * @param integer $groupID  Subscriber group ID parameter.
     * @param integer $detailID Row ID of model that want to delete..
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($listID, $groupID = null, $detailID = null)
    {
        try {
            $recordMailList = MailList::find($listID);
            $recordSubscriberGroupDetail = SubscriberGroupDetail::find($detailID);
            \Mailgun::lists()->deleteMember(
                $recordMailList->Mls_EmailAddressFrom,
                $recordSubscriberGroupDetail->subscriber->Sbr_EmailAddress
            );
            \DB::beginTransaction();
            $recordSubscriberGroupDetail->delete();
            \DB::commit();

            return redirect(action($this->controllerName.'@index', [$listID, $groupID]));
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect(action($this->controllerName.'@edit', [$listID, $groupID, $detailID]))
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
        $this->data['css'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.min.css');
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.full.min.js');
    }
}
