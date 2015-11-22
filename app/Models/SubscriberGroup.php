<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriberGroup extends Model
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
    protected $table = 'SubscriberGroup';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Sbg_ID';

    /**
     * Subscriber relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscribers()
    {
        return $this->belongsToMany(
            'MailMarketing\Models\Subscriber',
            'SubscriberGroupDetail',
            'Sgd_GroupID',
            'Sgd_SubscriberID'
        );
    }

    /**
     * Subscriber group parent relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo('MailMarketing\Models\SubscriberGroup', 'Sbg_ParentID');
    }

    /**
     * Subscriber group child relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childs()
    {
        return $this->hasMany('MailMarketing\Models\SubscriberGroup', 'Sbg_ParentID');
    }

    /**
     * Mail list relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mailList()
    {
        return $this->belongsTo('MailMarketing\Models\MailList', 'Sbg_MailListID');
    }
}
