<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class ImportFrom extends Model
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
    protected $table = 'ImportFrom';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Imf_ID';
}
