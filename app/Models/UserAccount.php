<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;

class UserAccount extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{

    use Authenticatable, Authorizable, CanResetPassword;

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
    protected $table = 'UserAccount';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Usr_ID';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array $hidden
     */
    protected $hidden = ['Usr_Password', 'Usr_Token'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array $fillable
     */
    protected $fillable = ['Usr_Name', 'Usr_Email', 'Usr_Password'];

    /**
     * Override required, otherwise existing Authentication system will not match credentials
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->attributes['Usr_Password'];
    }

    /**
     * Get the user remember token value.
     *
     * @return string
     */
    public function getRememberToken()
    {
        return $this->attributes[$this->getRememberTokenName()];
    }

    /**
     * Get the remember token field/attribute name.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'Usr_Token';
    }

    /**
     * Get authentication identifier.
     *
     * @return string
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     *
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->attributes[$this->getRememberTokenName()] = $value;
    }

    /**
     * User role relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany('MailMarketing\Models\UserRole', 'UserRoleDetail', 'Urd_UserID', 'Urd_RoleID');
    }

    /**
     * Campaign relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campaigns()
    {
        return $this->hasMany('MailMarketing\Models\Campaign', 'Cpg_CreatedOn', 'Usr_ID');
    }
}
