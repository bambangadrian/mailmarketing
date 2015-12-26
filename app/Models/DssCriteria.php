<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class DssCriteria extends Model
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
    protected $table = 'DssCriteria';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Dcr_ID';

    /**
     * Dss master relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dss()
    {
        return $this->belongsTo('MailMarketing\Models\Dss', 'Dcr_DssID');
    }

    /**
     * Dss criteria comparison details relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany('MailMarketing\Models\DssCriteriaDetail', 'Dcd_CriteriaID');
    }

    /**
     * Dss criteria comparison details relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compares()
    {
        return $this->details();
    }
}
