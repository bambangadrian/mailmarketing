<?php
namespace MailMarketing\Http\Controllers\Admin\Mail;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateSubscriberGroupDetailRequest;
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
        $subGroupList = SubscriberGroup::active()->notDeleted()->where('Sbg_ParentID', $groupID)->lists('Sbg_ID')->prepend($groupID);
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
        $subGroupList = SubscriberGroup::active()->notDeleted()->where('Sbg_ParentID', $groupID)->lists('Sbg_ID')->prepend($groupID);
        $this->data['subscriberOptions'] = Subscriber::active()
                                                     ->notDeleted()
                                                     ->whereNotExists(
                                                         function ($query) use ($subGroupList) {
                                                             $query->select(\DB::raw(1))
                                                                   ->from('SubscriberGroupDetail')
                                                                   ->whereRaw('(tbl_Subscriber.Sbr_ID = tbl_SubscriberGroupDetail.Sgd_SubscriberID)')
                                                                   ->whereIn('Sgd_GroupID', $subGroupList);
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
            \DB::beginTransaction();
            foreach ($request->get('Sgd_SubscriberID') as $subscriber) {
                $record = new SubscriberGroupDetail();
                $record->Sgd_GroupID = $request->get('Sgd_GroupID');
                $record->Sgd_SubscriberID = $subscriber;
                $record->Sgd_Active = $request->get('Sgd_Active');
                $record->push();
            }
            \DB::commit();

            return redirect()->action($this->controllerName.'@index', [$listID, $groupID]);
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()->action($this->controllerName.'@create', [$listID, $groupID])->withErrors($e->getMessage())->withInput();
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
            \DB::beginTransaction();
            $record = SubscriberGroupDetail::find($detailID);
            $record->Sgd_Active = $request->get('Sgd_Active');
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
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.full.min.js');
    }
}
