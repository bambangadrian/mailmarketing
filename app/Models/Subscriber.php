<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
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
    protected $table = 'Subscriber';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Sbr_ID';

    /**
     * Subscriber group relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscriberGroups()
    {
        return $this->belongsToMany(
            'MailMarketing\Models\SubscriberGroup',
            'SubscriberGroupDetail',
            'Sgd_SubscriberID',
            'Sgd_GroupID'
        );
    }

    /**
     * Sent mail relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function sentMails()
    {
        return $this->hasManyThrough(
            'MailMarketing\Models\SentMail',
            'MailMarketing\Models\SubscriberGroupDetail',
            'Sgd_SubscriberID',
            'Sm_SubscriberListID'
        );
    }

    /**
     * Import from relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function importFrom()
    {
        return $this->belongsTo('MailMarketing\Models\ImportFrom', 'Sbr_ImportFromID');
    }
}
