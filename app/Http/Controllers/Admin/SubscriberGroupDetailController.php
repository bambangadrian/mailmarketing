<?php
namespace MailMarketing\Http\Controllers\Admin;

use MailMarketing\Models\Subscriber;
use MailMarketing\Models\SubscriberGroupDetail;

class SubscriberGroupDetailController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'mail/mailList/group/groupDetail';
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
        $this->data['model'] = SubscriberGroupDetail::notDeleted()->with('subscriber', 'subscriberGroup')->where('Sgd_GroupID', '=', $groupID)->paginate(10);
        $this->data['createLinkAction'] = action($this->controllerName . '@create', [$listID, $groupID]);
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
        $this->data['subscriberOptions'] = Subscriber::active()->notDeleted()->lists('Sbr_EmailAddress', 'Sbr_ID')->prepend('Select Subscribers ...');
        $this->data['pageDescription'] = 'Add your subscriber to this mailing list group';
        $this->data['formAction'] = action($this->controllerName . '@store', [$listID, $groupID]);
        $this->data['indexLinkAction'] = action($this->controllerName . '@index', [$listID, $groupID]);
        $this->loadResourceForDetailPage();
        return parent::create();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param integer $listID  Mailing list ID parameter.
     * @param integer $groupID Row ID of model that want to edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($listID, $groupID = null)
    {
        $this->data['listID'] = $listID;
        $this->data['groupID'] = $groupID;
        $this->data['pageDescription'] = 'Update subscriber group item for selected mailing list';
        $this->data['groupParentOptions'] = SubscriberGroup::active()->notDeleted()->where('Sbg_ID', '<>', $groupID)->lists('Sbg_Name', 'Sbg_ID')->prepend('Select Group Parent ...', '');
        $this->data['model'] = SubscriberGroup::find($groupID);
        $this->data['indexLinkAction'] = action($this->controllerName . '@index', $listID);
        $this->data['formAction'] = action($this->controllerName . '@update', [$listID, $groupID]);
        $this->data['buttons'] = $this->renderPartialView('button');
        $this->loadResourceForDetailPage();
        return parent::edit($groupID);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateSubscriberGroupRequest $request Request object parameter.
     * @param integer                      $listID  Mailing list ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateSubscriberGroupRequest $request, $listID = null)
    {
        try {
            if (trim($request->get('Sbg_ParentID')) === '' or $request->get('Sbg_ParentID') === '0') {
                $request->merge(['Sbg_ParentID' => null]);
            }
            \DB::beginTransaction();
            $record = SubscriberGroup::create($request->except('_method', '_token'));
            \DB::commit();
            return redirect()->action($this->controllerName . '@edit', [$listID, $record->getKey()]);
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->action($this->controllerName . '@create', $listID)->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSubscriberGroupRequest $request Request object parameter.
     * @param integer                      $listID  Mailing list ID parameter.
     * @param integer                      $groupID Row ID of model that want to edit.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriberGroupRequest $request, $listID, $groupID = null)
    {
        $redirectPath = action($this->controllerName . '@edit', [$listID, $groupID]);
        try {
            $record = SubscriberGroup::find($groupID);
            if (trim($request->get('Sbg_ParentID')) === '' or $request->get('Sbg_ParentID') === '0') {
                $request->merge(['Sbg_ParentID' => null]);
            }
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
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.min.js');
    }
}
