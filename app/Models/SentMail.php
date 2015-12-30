<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class SentMail extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Sm_MailScheduleID', 'Sm_SubscriberListID'];

    /**
     * Mail schedule relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mailSchedule()
    {
        return $this->belongsTo('MailMarketing\Models\MailSchedule', 'Sm_MailScheduleID');
    }

    /**
     * Subscriber group detail relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscriberList()
    {
        return $this->belongsTo('MailMarketing\Models\SubscriberGroupDetail', 'Sm_SubscriberListID');
    }
}
