<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class Subscriber extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'Sbr_ImportFromID',
        'Sbr_EmailAddress',
        'Sbr_FirstName',
        'Sbr_LastName',
        'Sbr_Address1',
        'Sbr_Address2',
        'Sbr_Address3',
        'Sbr_MemberRating',
        'Sbr_Phone',
        'Sbr_AltPhone',
        'Sbr_BirthDay',
        'Sbr_Gender'
    ];

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
