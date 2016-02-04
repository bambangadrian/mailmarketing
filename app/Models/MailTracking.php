<?php
namespace MailMarketing\Models;

class MailTracking extends AbstractBaseModel
{

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'Mtr_SentMailID',
        'Mtr_StatusID',
        'Mtr_UserAgent',
        'Mtr_IpAddress',
        'Mtr_EventName',
        'Mtr_Recipient',
        'Mtr_MessageHeaders',
        'Mtr_MessageId',
        'Mtr_Reason',
        'Mtr_Code',
        'Mtr_Error',
        'Mtr_Description',
        'Mtr_DomainSender',
        'Mtr_Country',
        'Mtr_Region',
        'Mtr_City',
        'Mtr_ClickedUrl',
        'Mtr_MailingList',
        'Mtr_DeviceType',
        'Mtr_ClientType',
        'Mtr_ClientName',
        'Mtr_ClientOs',
        'Mtr_CampaignID',
        'Mtr_CampaignName',
        'Mtr_Tag',
        'Mtr_Token',
        'Mtr_Signature',
        'Mtr_CustomVariable',
        'Mtr_TimeStamp'
    ];

    /**
     * Sent mail relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sentMail()
    {
        return $this->belongsTo('MailMarketing\Models\SentMail', 'Mtr_SentMailID');
    }

    /**
     * Mail tracking status relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trackingStatus()
    {
        return $this->belongsTo('MailMarketing\Models\MailTrackingStatus', 'Mtr_StatusID');
    }
}
