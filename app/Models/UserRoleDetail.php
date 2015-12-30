<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class UserRoleDetail extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Urd_UserID', 'Urd_RoleID'];

    /**
     * User relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('MailMarketing\Models\UserAccount', 'Urd_UserID');
    }

    /**
     * Role relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('MailMarketing\Models\UserRole', 'Urd_RoleID');
    }
}
