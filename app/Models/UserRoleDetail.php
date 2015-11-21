<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class UserRoleDetail extends Model
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
    protected $table = 'UserRoleDetail';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Urd_ID';
}
