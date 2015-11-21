<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class SegmentCriteria extends Model
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
    protected $table = 'SegmentCriteria';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Sc_ID';
}
