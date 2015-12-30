<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class MailSchedule extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Msd_CampaignID', 'Msd_ExecutedDate', 'Msd_IsExecuted'];

    /**
     * Campaign relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign()
    {
        return $this->belongsTo('MailMarketing\Models\Campaign', 'Msd_CampaignID');
    }

    /**
     * Sent mail relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentMails()
    {
        return $this->hasMany('MailMarketing\Models\SentMail', 'Sm_MailScheduleID');
    }
}
