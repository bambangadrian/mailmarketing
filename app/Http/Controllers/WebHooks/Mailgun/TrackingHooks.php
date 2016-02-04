<?php
namespace MailMarketing\Http\Controllers\WebHooks\Mailgun;

use MailMarketing\Http\Controllers\Controller;
use MailMarketing\Http\Requests\WebHooksRequest;
use MailMarketing\Models\MailTracking;

/**
 * Class TrackingHooks
 *
 * @package    MailMarketing
 * @subpackage Http\Controllers\WebHooks\Mailgun
 */
class TrackingHooks extends Controller
{

    /**
     * Store events to mail tracking model.
     *
     * @param WebHooksRequest $request Request parameter.
     *
     * @return string
     */
    public function storeEvents(WebHooksRequest $request)
    {
        try {
            $requestDataMap = [
                'event'            => 'Mtr_EventName',
                'recipient'        => 'Mtr_Recipient',
                'domain'           => 'Mtr_DomainSender',
                'message-headers'  => 'Mtr_MessageHeaders',
                'Message-Id'       => 'Mtr_MessageID',
                'reason'           => 'Mtr_Reason',
                'code'             => 'Mtr_Code',
                'description'      => 'Mtr_Description',
                'error'            => 'Mtr_Error',
                'notification'     => 'Mtr_Description',
                'ip'               => 'Mtr_IpAddress',
                'country'          => 'Mtr_Country',
                'region'           => 'Mtr_Region',
                'city'             => 'Mtr_City',
                'user-agent'       => 'Mtr_UserAgent',
                'device-type'      => 'Mtr_DeviceType',
                'client-type'      => 'Mtr_ClientType',
                'client-name'      => 'Mtr_ClientName',
                'client-os'        => 'Mtr_ClientOs',
                'campaign-id'      => 'Mtr_CampaignID',
                'campaign-name'    => 'Mtr_CampaignName',
                'tag'              => 'Mtr_Tag',
                'url'              => 'Mtr_ClickedUrl',
                'mailing-list'     => 'Mtr_MailingList',
                'custom variables' => 'Mtr_CustomVariable',
                'timestamp'        => 'Mtr_TimeStamp',
                'token'            => 'Mtr_Token',
                'signature'        => 'Mtr_Signature'
            ];
            $requestData = [];
            foreach ($request->all() as $key => $value) {
                if (array_key_exists($key, $requestDataMap) === true) {
                    $requestData[$requestDataMap[$key]] = $value;
                }
            }
            \DB::beginTransaction();
            $recordMailTracking = MailTracking::create($requestData);
            \DB::commit();
            $result = [
                'requestData' => json_encode($request->all()),
                'hooksID'     => $recordMailTracking->getKey(),
                'message'     => 'Success to hooks',
                'success'     => true
            ];
            # Status code:
            # 200 (Success), 406 (Not acceptable/Rejected) | both will not retry by mailgun.
            return response()->json($result, 200);
        } catch (\Exception $e) {
            \DB::rollback();

            return response()->json(['message' => $e->getMessage(), 'success' => false], 406);
        }
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

    # Mailgun - Mail marketing - Laravel WebHooks :
    # @author : bambang.as
    # Hooks for delivered messages.
    # Param name : message-headers, message-id
    # Hooks for dropped messages.
    # Param name : message-headers, reason,
    # code, description, attachment-x
    # Hooks for Hard bounces.
    # Param name : same with opened message +
    # message-headers, code, error, notification
    # attachment-x
    # Hooks for spam complaint.
    # Param name : same with opened message +
    # attachment-x, message-headers
    # Hooks for un-subscribes.
    # Unsubscribe variables :
    # %unsubscribe_url%, %tag_unsubscribe_url%, %mailing_list_unsubscribe_url%
    # Param name : same with opened message
    # Hooks for clicked messages.
    # Param name : same with opened message + url
    # Hooks for opened messages.
    # Param name : event, recipient, domain, ip, country
    # region, city, user-agent, device-type, client-type
    # client-name, client-os, campaign-id, campaign-name,
    # tag, mailing-list, timestamp, token, signature + custom variables
    # ----------------------------------------------------------------------
    # Unsubscribe Link Set:
    # %unsubscribe_url%	link to unsubscribe recipient from all messages sent by given domain
    # %tag_unsubscribe_url%	link to unsubscribe from all tags provided in the message
    # %mailing_list_unsubscribe_url%	link to unsubscribe from future messages sent to a mailing list
}
