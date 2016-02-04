<?php
namespace MailMarketing\Http\Controllers\Admin\Master;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateImportFromRequest;
use MailMarketing\Models\ImportFrom;

class ImportFromController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        # Set custom reference key.
        $this->setReferenceKey('import');
        # Set content directory.
        $this->contentDir = 'master/import';
        # Set page attributes.
        $this->data['pageHeader'] = 'Import From';
        $this->data['pageDescription'] = 'Manage your import from list for subscribers';
        $this->data['activeMenu'] = 'master';
        $this->data['activeSubMenu'] = 'import';
        $this->setEnableDelete(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = ImportFrom::notDeleted()->paginate(10);

        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new import from item';

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
        $this->data['pageDescription'] = 'Update import from item';
        $this->data['model'] = ImportFrom::find($id);

        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateImportFromRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateImportFromRequest $request)
    {
        try {
            \DB::beginTransaction();
            $record = ImportFrom::create($request->except('_method', '_token'));
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
     * @param  UpdateImportFromRequest $request Request object parameter.
     * @param  integer                 $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateImportFromRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            $record = ImportFrom::find($id);
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
     * Remove the specified resource from storage.
     *
     * @param  integer $id Row ID of model that want to destroy.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $record = ImportFrom::find($id);
            \DB::beginTransaction();
            $record->delete();
            \DB::commit();

            return redirect(action($this->controllerName.'@index'));
        } catch (\Exception $e) {
            \DB::rollback();

            return redirect(action($this->controllerName.'@edit', $id))->withErrors($e->getMessage())->withInput();
        }
    }
}
