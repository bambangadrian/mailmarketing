<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class DssRandomIndex extends Model
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
    protected $table = 'DssRandomIndex';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Dri_ID';

    /**
     * Dss master relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dss()
    {
        return $this->hasMany('MailMarketing\Models\Dss', 'Dss_RandomIndexID');
    }
}
