<?php
namespace MailMarketing\Models;

class DssAlternativeDetail extends AbstractBaseModel
{

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Dad_EigenID', 'Dad_CompareID', 'Dad_ComparisonMatrixValue'];

    /**
     * Dss eigen value table per alternative per criteria relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eigen()
    {
        return $this->belongsTo('MailMarketing\Models\DssEvAlternativeCriteria', 'Dad_EigenID');
    }
}
