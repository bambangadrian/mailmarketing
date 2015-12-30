<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class Permission extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Pm_Name', 'Pm_Slug', 'Pm_Description'];

    /**
     * Role relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('MailMarketing\Models\Role', 'PermissionRole', 'Pmr_PermissionID', 'Pmr_RoleID');
    }
}
