<?php
namespace MailMarketing\Http\Controllers\Admin\Mail;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateSubscriberRequest;
use MailMarketing\Models\ImportFrom;
use MailMarketing\Models\Subscriber;

class SubscriberController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'mail/subscriber';
        $this->data['pageHeader'] = 'Subscriber';
        $this->data['pageDescription'] = 'Manage subscriber data as your market';
        $this->data['activeMenu'] = 'mail';
        $this->data['activeSubMenu'] = 'mailSubscriber';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = Subscriber::notDeleted()->with('importFrom')->paginate(10);

        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new mail subscriber item';
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
        $this->data['pageDescription'] = 'Update mail subscriber item';
        $this->data['model'] = Subscriber::find($id);
        $this->loadOptions();
        $this->loadResourceForDetailPage();

        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateSubscriberRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateSubscriberRequest $request)
    {
        try {
            \DB::beginTransaction();
            $record = Subscriber::create($request->except('_method', '_token'));
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
     * @param  UpdateSubscriberRequest $request Request object parameter.
     * @param  integer                 $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubscriberRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            $record = Subscriber::find($id);
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
     * Load required options for detail page.
     *
     * @return void
     */
    private function loadOptions()
    {
        $this->data['importOptions'] = ImportFrom::active()
                                                 ->notDeleted()
                                                 ->lists('Imf_Name', 'Imf_ID')
                                                 ->prepend('Please Select Import From ...', '');
        $this->data['genderOptions'] = collect(['M' => 'Male', 'F' => 'Female'])->prepend('Please Select Gender', '');
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
