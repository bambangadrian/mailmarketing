<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class PermissionRole extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Pmr_PermissionID', 'Pmr_RoleID'];

    /**
     * Role relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('MailMarketing\Models\Role', 'Pmr_RoleID');
    }

    /**
     * Permission relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo('MailMarketing\Models\Permission', 'Pmr_PermissionID');
    }
}
