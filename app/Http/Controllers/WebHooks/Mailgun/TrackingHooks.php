<?php
namespace MailMarketing\Http\Controllers\WebHooks\Mailgun;

use MailMarketing\Http\Controllers\Controller;

class TrackingHooks extends Controller
{

    /**
     * Mailgun web hooks for delivered message.
     *
     * @return boolean.
     */
    public function postTrackDeliveredMessage()
    {
        # Hooks for delivered messages.
    }

    public function postTrackDroppedMessage()
    {
        # Hooks for dropped messages.
    }

    public function postTrackHardBouncesMessage()
    {
        # Hooks for Hard bounces.
    }

    public function postTrackSpamComplaintMessage()
    {
        # Hooks for spam complaint.
    }

    public function postTrackUnSubscribe()
    {
        # Hooks for un-subscribes.
    }

    public function postTrackClickedMessage()
    {
        # Hooks for clicked messages.
    }

    public function postTrackOpenedMessage()
    {
        # Hooks for opened messages.
        # Param name : event, recipient, domain, ip, country
        # region, city, user-agent, device-type, client-type
        # client-name, client-os, campaign-id, campaign-name,
        # tag, mailing-list, timestamp, token, signature
    }
}
