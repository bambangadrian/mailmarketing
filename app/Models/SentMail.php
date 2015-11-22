<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class SentMail extends Model
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
    protected $table = 'SentMail';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Sm_ID';

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
