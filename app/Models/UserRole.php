<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
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
    protected $table = 'UserRole';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Ur_ID';

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
