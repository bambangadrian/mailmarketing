<?php
namespace MailMarketing\Http\Controllers\Admin;

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
        $this->data['model'] = Subscriber::with('importFrom')->notDeleted()->paginate(10);
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
        $this->data['importOptions'] = ImportFrom::active()->notDeleted()->lists('Imf_Name', 'Imf_ID')->prepend('Please Select Import From ...', '');
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
        $this->data['importOptions'] = ImportFrom::active()->notDeleted()->lists('Imf_Name', 'Imf_ID')->prepend('Please Select Import From ...', '');
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
            return redirect()->action($this->controllerName . '@edit', $record->getKey());
        } catch (\Exception $e) {
            \DB::rollback();
            return redirect()->action($this->controllerName . '@create')->withErrors($e->getMessage())->withInput();
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
        $redirectPath = action($this->controllerName . '@edit', $id);
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
     * Load resources for detail page.
     *
     * @return void
     */
    private function loadResourceForDetailPage()
    {
        $this->data['css'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.min.css');
        $this->data['js'][] = asset('/vendor/bower_components/AdminLTE/plugins/select2/select2.min.js');
    }
}
