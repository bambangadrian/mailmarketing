<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
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
    protected $table = 'PermissionRole';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Pmr_ID';

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
