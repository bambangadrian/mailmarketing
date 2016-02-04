<?php
namespace MailMarketing\Http\Controllers\Admin\Mail;

use MailMarketing\Http\Controllers\Admin\AbstractAdminController;

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
}
