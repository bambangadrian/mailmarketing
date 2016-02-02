<?php
namespace MailMarketing\Http\Controllers;

use MailMarketing\Models\SubscriberGroup;

class AjaxController extends Controller
{

    /**
     * Get subscriber group via ajax.
     *
     * @return string
     */
    public function getSubscriberGroup()
    {
        $mailListID = \Input::get('mailListID');
        $record = SubscriberGroup::active()->notDeleted()->where('Sbg_MailListID', $mailListID)->get();

        return \Response::json($record);
    }
}
