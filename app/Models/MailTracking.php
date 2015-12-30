<?php
namespace MailMarketing\Models;

class MailTracking extends AbstractBaseModel
{

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Mtr_SentMailID', 'Mtr_StatusID', 'Mtr_UserAgent', 'Mtr_Location', 'Mtr_IpAddress'];

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
