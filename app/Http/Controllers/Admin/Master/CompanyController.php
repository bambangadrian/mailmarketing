<?php
namespace MailMarketing\Http\Controllers\Admin\Master;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateCompanyRequest;
use MailMarketing\Models\Company;

class CompanyController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->setEnableCreate(false);
        parent::__construct();
        # Set content directory.
        $this->contentDir = 'master/company';
        # Set page attributes.
        $this->data['pageHeader'] = 'Company';
        $this->data['pageDescription'] = 'Manage your company profile';
        $this->data['activeMenu'] = 'company';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = Company::notDeleted()->paginate(10);

        return parent::index();
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
        $this->data['pageDescription'] = 'Update your company profile';
        $this->data['model'] = Company::find($id);
        $countryLists = array_column(\Countries::getList(), 'name');
        $timeZoneIdentifiers = \DateTimeZone::listIdentifiers();
        $this->data['timeZoneOptions'] = collect(array_combine($timeZoneIdentifiers, $timeZoneIdentifiers))
            ->prepend('Please Select Timezone', '');
        $this->data['countryOptions'] = collect(array_combine($countryLists, $countryLists))
            ->prepend('Please Select Country', '');
        $this->loadResourceForDetailPage();

        return parent::edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCompanyRequest $request Request object parameter.
     * @param  integer              $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            $record = Company::find($id);
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
        $adminLtePluginPath = '/vendor/bower_components/AdminLTE/plugins/';
        $this->data['css'][] = asset($adminLtePluginPath.'select2/select2.min.css');
        $this->data['js'][] = asset($adminLtePluginPath.'select2/select2.full.min.js');
    }
}
