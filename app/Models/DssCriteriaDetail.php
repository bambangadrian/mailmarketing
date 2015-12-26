<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class DssCriteriaDetail extends Model
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
    protected $table = 'DssCriteriaDetail';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Dcd_ID';

    /**
     * Dss criteria master relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criteria()
    {
        return $this->belongsTo('MailMarketing\Models\DssCriteria', 'Dcd_CriteriaID');
    }

    /**
     * Dss criteria compare relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function compare()
    {
        return $this->belongsTo('MailMarketing\Models\DssCriteria', 'Dcd_CompareID');
    }
}
