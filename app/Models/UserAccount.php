<?php

namespace MailMarketing\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model implements Authenticatable
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
}
