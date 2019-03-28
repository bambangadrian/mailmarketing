<?php
namespace MailMarketing\Http\Controllers\Admin\Mail;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Http\Requests\UpdateSentMailRequest;
use MailMarketing\Models\SentMail;

class SentMailController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        # Disable create new sent mail from this page.
        $this->setEnableCreate(false);
        parent::__construct();
        # Set content directory.
        $this->contentDir = 'mail/sent';
        # Set page attributes.
        $this->data['pageHeader'] = 'Sent Mail';
        $this->data['pageDescription'] = 'All Sent Mail Data';
        $this->data['activeMenu'] = 'mail';
        $this->data['activeSubMenu'] = 'sentMail';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = SentMail::notDeleted()
                                       ->with(
                                           'subscriberList.subscriber',
                                           'mailSchedule.campaign',
                                           'subscriberList.subscriberGroup',
                                           'subscriberList.subscriberGroup.mailList'
                                       )->paginate(10);

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
        $this->data['pageDescription'] = 'Update sent mail item';
        $this->data['model'] = SentMail::with(
            'subscriberList.subscriber',
            'mailSchedule.campaign',
            'subscriberList.subscriberGroup',
            'subscriberList.subscriberGroup.mailList'
        )->find($id);

        return parent::edit($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateSentMailRequest $request Request object parameter.
     * @param  integer               $id      Model ID parameter.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSentMailRequest $request, $id)
    {
        $redirectPath = action($this->controllerName.'@edit', $id);
        try {
            $record = SentMail::find($id);
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
