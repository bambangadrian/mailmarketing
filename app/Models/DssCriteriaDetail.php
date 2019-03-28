<?php
namespace MailMarketing\Models;

class DssCriteriaDetail extends AbstractBaseModel
{

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Dcd_CriteriaID', 'Dcd_CompareID', 'Dcd_ComparisonMatrixValue'];

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
