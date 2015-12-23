<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
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
    protected $table = 'Permission';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Pm_ID';

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
