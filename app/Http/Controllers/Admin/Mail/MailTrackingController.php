<?php
namespace MailMarketing\Http\Controllers\Admin\Mail;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;
use MailMarketing\Models\MailTracking;

class MailTrackingController extends AbstractAdminController
{

    /**
     * Class constructor.
     */
    public function __construct()
    {
        # Disable create new sent mail from this page.
        $this->setEnableCreate(false);
        $this->setEnableUpdate(false);
        parent::__construct();
        # Set content directory.
        $this->contentDir = 'mail/tracking';
        # Set page attributes.
        $this->data['pageHeader'] = 'Mail Tracking';
        $this->data['pageDescription'] = 'All log data for mail tracking';
        $this->data['activeMenu'] = 'mail';
        $this->data['activeSubMenu'] = 'mailTracking';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['model'] = MailTracking::orderBy('Mtr_CreatedOn', 'desc')->paginate(10);

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
        $this->data['pageDescription'] = 'Detail of mail tracking log data';
        $this->data['model'] = MailTracking::find($id);

        return parent::edit($id);
    }
}
