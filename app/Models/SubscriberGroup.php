<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class SubscriberGroup extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Sbg_MailListID', 'Sbg_ParentID', 'Sbg_Name', 'Sbg_Description'];

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
