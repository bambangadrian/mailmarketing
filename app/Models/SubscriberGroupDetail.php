<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class SubscriberGroupDetail extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Sgd_GroupID', 'Sgd_SubscriberID'];

    /**
     * Subscriber group relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscriberGroup()
    {
        return $this->belongsTo('MailMarketing\Models\SubscriberGroup', 'Sgd_GroupID');
    }

    /**
     * Subscriber relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subscriber()
    {
        return $this->belongsTo('MailMarketing\Models\Subscriber', 'Sgd_SubscriberID');
    }

    /**
     * Sent mail relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentMails()
    {
        return $this->hasMany('MailMarketing\Models\SentMail', 'Sm_SubscriberListID');
    }
}
