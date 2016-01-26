<?php
namespace MailMarketing\Http\Controllers\Admin\Master;

use MailMarketing\Helpers\Helper;
use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Models\Template;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use MailMarketing\Http\Requests\UpdateTemplateRequest;

class TemplateController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'master/template';
        $this->data['pageHeader'] = 'Template';
        $this->data['pageDescription'] = 'Manage your template that will be used for campaign';
        $this->data['activeMenu'] = 'master';
        $this->data['activeSubMenu'] = 'template';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = Template::notDeleted()->paginate(10);

        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create mail template item';

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
        $this->data['pageDescription'] = 'Update mail template item';
        $this->data['model'] = Template::find($id);

        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateTemplateRequest $request Request object parameter.
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateTemplateRequest $request)
    {
        try {
            # Save the template file.
            if ($request->hasFile('Tpl_File') === true and $this->doUploadZipTemplate($request->file('Tpl_File'), $request->get('Tpl_Name')) === false) {
                throw new \Exception('Failed to upload zip template file');
            }
            # Start transaction and store the data to database.
            \DB::beginTransaction();
            $record = Template::create($request->except('_method', '_token'));
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
     * @param  UpdateTemplateRequest $request Request object parameter.
     * @param  integer               $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTemplateRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            if ($request->hasFile('Tpl_File') === true and $this->doUploadZipTemplate($request->file('Tpl_File'), $request->get('Tpl_Name')) === false) {
                throw new \Exception('Failed to upload zip template file');
            }
            $record = Template::find($id);
            \DB::beginTransaction();
            $record->fill($request->except('_method', '_token'));
            $record->save();
            \DB::commit();

            return redirect($redirectPath);
        } catch (\Exception $e) {
            //\DB::saveRecord();
            return redirect($redirectPath)->withErrors($e->getMessage())->withInput();
        }
    }

    /**
     * Do upload zip template.
     *
     * @param \Symfony\Component\HttpFoundation\File\UploadedFile $file          Uploaded file object parameter.
     * @param string                                              $directoryName Directory name parameter.
     *
     * @throws \Exception If any error raised when upload and archive zip template file.
     *
     * @return boolean
     */
    private function doUploadZipTemplate(UploadedFile $file, $directoryName)
    {
        try {
            $fileName = $file->getFilename().'.'.$file->getClientOriginalExtension();
            $storageViewPath = 'resources/views/';
            $uploadDir = camel_case($directoryName).'/';
            \Storage::disk('local')->put($storageViewPath.$fileName, \File::get($file));
            $zipSource = storage_path('app/'.$storageViewPath.$fileName);
            $extractDestination = storage_path('app/'.$storageViewPath.$uploadDir);
            if (Helper::extractZip($zipSource, $extractDestination)) {
                \Storage::delete($storageViewPath.$fileName);

                return true;
            }

            return false;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
