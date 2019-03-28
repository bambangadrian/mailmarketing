<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class MailTrackingStatus extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Mts_Name'];

    /**
     * Mail tracking relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trackings()
    {
        return $this->hasMany('MailMarketing\Models\MailTracking', 'Mtr_StatusID');
    }

    /**
     * Sent mail relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sentMails()
    {
        return $this->belongsToMany('MailMarketing\Models\SentMail', 'MailTracking', 'Mtr_StatusID', 'Mtr_SentMailID');
    }
}
