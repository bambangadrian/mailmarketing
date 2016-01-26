<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class MailList extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = [
        'Mls_Name',
        'Mls_EmailAddressFrom',
        'Mls_EmailNameFrom',
        'Mls_Reminder',
        'Mls_CompanyName',
        'Mls_Address1',
        'Mls_Address2',
        'Mls_City',
        'Mls_Country',
        'Mls_Phone',
        'Mls_NotifType',
    ];

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
