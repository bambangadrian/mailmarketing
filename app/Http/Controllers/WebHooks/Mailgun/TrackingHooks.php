<?php
namespace MailMarketing\Http\Controllers\WebHooks\Mailgun;

use MailMarketing\Http\Controllers\Controller;

/**
 * Class TrackingHooks
 *
 * @package    MailMarketing
 * @subpackage Http\Controllers\WebHooks\Mailgun
 */
class TrackingHooks extends Controller
{

    /**
     * Mailgun web hooks for delivered message.
     *
     * @return string.
     */
    public function postTrackDeliveredMessage()
    {
        # Hooks for delivered messages.
        # Param name : message-headers, message-id
    }

    /**
     * Mailgun web hooks for dropped message.
     *
     * @return string.
     */
    public function postTrackDroppedMessage()
    {
        # Hooks for dropped messages.
        # Param name : message-headers, reason,
        # code, description, attachment-x
    }

    /**
     * Mailgun web hooks for hard bounces message.
     *
     * @return string.
     */
    public function postTrackHardBouncesMessage()
    {
        # Hooks for Hard bounces.
        # Param name : same with opened message +
        # message-headers, code, error, notification
        # attachment-x
    }

    /**
     * Mailgun web hooks for spam complaint message.
     *
     * @return string.
     */
    public function postTrackSpamComplaintMessage()
    {
        # Hooks for spam complaint.
        # Param name : same with opened message +
        # attachment-x, message-headers
    }

    /**
     * Mailgun web hooks for un-subscribe event.
     *
     * @return string.
     */
    public function postTrackUnSubscribeEvent()
    {
        # Hooks for un-subscribes.
        # Unsubscribe variables :
        # %unsubscribe_url%, %tag_unsubscribe_url%, %mailing_list_unsubscribe_url%
        # Param name : same with opened message
    }

    /**
     * Mailgun web hooks for clicked message.
     *
     * @return string.
     */
    public function postTrackClickedMessage()
    {
        # Hooks for clicked messages.
        # Param name : same with opened message + url
    }

    /**
     * Mailgun web hooks for opened message.
     *
     * @return string.
     */
    public function postTrackOpenedMessage()
    {
        # Hooks for opened messages.
        # Param name : event, recipient, domain, ip, country
        # region, city, user-agent, device-type, client-type
        # client-name, client-os, campaign-id, campaign-name,
        # tag, mailing-list, timestamp, token, signature + custom variables
    }

    /**
     * Get sent mail id from mailgun tracking data web hooks.
     *
     * @return integer
     */
    private function getSentMailId()
    {
        return 0;
    }
}
