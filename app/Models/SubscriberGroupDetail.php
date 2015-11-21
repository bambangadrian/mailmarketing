<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriberGroupDetail extends Model
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
    protected $table = 'SubscriberGroupDetail';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Sgd_ID';
}
