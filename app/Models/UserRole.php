<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class UserRole extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Ur_Name', 'Ur_Slug'];

    /**
     * Permission relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
        return $this->belongsToMany(
            'MailMarketing\Models\Permission',
            'PermissionRole',
            'Pmr_RoleID',
            'Pmr_PermissionID'
        );
    }

    /**
     * User account relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany('MailMarketing\Models\UserAccount', 'UserRoleDetail', 'Urd_RoleID', 'Urd_UserID');
    }
}
