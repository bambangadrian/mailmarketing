<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriberGroupDetail extends Model
{

    /**
     * Indicates if the model should not be timestamped.
     *
     * @var boolean $timestamps
     */
    public $timestamps = false;

    /**
     * Table name property.
     *
     * @var string $table
     */
    protected $table = 'SubscriberGroupDetail';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Sgd_ID';

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
