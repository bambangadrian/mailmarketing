<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class MailList extends Model
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
    protected $table = 'MailList';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Mls_ID';

    /**
     * Subscriber group relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscriberGroups()
    {
        return $this->hasMany('MailMarketing\Models\SubscriberGroup', 'Sbg_MailListID');
    }
}
