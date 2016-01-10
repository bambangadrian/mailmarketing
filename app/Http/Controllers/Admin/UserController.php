<?php
namespace MailMarketing\Http\Controllers\Admin;

use MailMarketing\Http\Requests\UpdateUserRequest;
use MailMarketing\Models\UserAccount;

class UserController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->contentDir = 'master/user';
        $this->data['pageHeader'] = 'User Account';
        $this->data['pageDescription'] = 'Manage user list that will use this system';
        $this->data['activeMenu'] = 'master';
        $this->data['activeSubMenu'] = 'user';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = UserAccount::notDeleted()->paginate(10);
        return parent::index();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pageDescription'] = 'Create new user account item';
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
        $this->data['pageDescription'] = 'Update user account item';
        $this->data['model'] = UserAccount::find($id);
        return parent::edit($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UpdateUserRequest $request Request object parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UpdateUserRequest $request)
    {
        try {
            \DB::beginTransaction();
            $record = UserAccount::create($request->except('_method', '_token'));
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
     * @param  UpdateUserRequest $request Request object parameter.
     * @param  integer           $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $redirectPath = action($this->controllerName . '@edit', $id);
        try {
            $record = UserAccount::find($id);
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
}
