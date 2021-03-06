<?php
namespace MailMarketing\Http\Controllers\Admin\Mail;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateMailListRequest;
use MailMarketing\Models\MailList;
use MailMarketing\Models\SubscriberGroup;

class MailListController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        # Set content directory.
        $this->contentDir = 'mail/mailList';
        # Set page attributes.
        $this->data['pageHeader'] = 'Mailing List';
        $this->data['pageDescription'] = 'Manage your mailing list for your campaign purpose';
        $this->data['activeMenu'] = 'mail';
        $this->data['activeSubMenu'] = 'mailList';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = MailList::notDeleted()->paginate(10);

        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new mailing list item';
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
        $this->data['pageDescription'] = 'Update mailing list item';
        $this->data['model'] = MailList::find($id);
        $this->data['buttons'] = $this->renderPartialView('button');
        $this->loadOptions();
        $this->loadResourceForDetailPage();

        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateMailListRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateMailListRequest $request)
    {
        try {
            \Mailgun::lists()->create([
                'address'      => $request->get('Mls_EmailAddressFrom'),
                'name'         => $request->get('Mls_Name'),
                'description'  => $request->get('Mls_Description'),
                'access_level' => $request->get('Mls_AccessLevel')
            ]);
            \DB::beginTransaction();
            $recordMailList = MailList::create($request->except('_method', '_token'));
            $recordSubscriberGroup = SubscriberGroup::create(
                [
                    'Sbg_MailListID'   => $recordMailList->getKey(),
                    'Sbg_Name'         => 'General',
                    'Sbg_Description'  => 'Default Group',
                    'Sbg_Active'       => 1,
                    'Sbg_DefaultGroup' => 1
                ]
            );
            $recordMailList->Mls_DefaultGroupID = $recordSubscriberGroup->getKey();
            $recordMailList->save();
            \DB::commit();

            return redirect()->action($this->controllerName.'@edit', $recordMailList->getKey());
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect()->action($this->controllerName.'@create')->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateMailListRequest $request Request object parameter.
     * @param  integer               $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMailListRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            $record = MailList::find($id);
            \Mailgun::lists()->update(
                $record->Mls_EmailAddressFrom,
                [
                    'name'         => $request->get('Mls_Name'),
                    'description'  => $request->get('Mls_Description'),
                    'access_level' => $request->get('Mls_AccessLevel')
                ]
            );
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
     * Load required options.
     *
     * @return void
     */
    private function loadOptions()
    {
        $this->data['accessLevelOptions'] = collect([
            'readonly' => 'Read Only',
            'members'  => 'Members',
            'everyone' => 'Every One'
        ])->prepend('Please Select Access Level', '');
        $countryLists = array_column(\Countries::getList(), 'name');
        $this->data['countryOptions'] = collect(array_combine($countryLists, $countryLists))
            ->prepend('Please Select Country', '');
    }

    /**
     * Load resource for detail page.
     *
     * @return void
     */
    private function loadResourceForDetailPage()
    {
        $adminLtePluginPath = '/vendor/bower_components/AdminLTE/plugins/';
        $this->data['css'][] = asset($adminLtePluginPath.'select2/select2.min.css');
        $this->data['js'][] = asset($adminLtePluginPath.'select2/select2.full.min.js');
    }
}
