<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class Segment extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Seg_Name'];

    /**
     * Segment criteria relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function segmentCriterias()
    {
        return $this->belongsToMany(
            'MailMarketing\Models\SegmentCriteria',
            'SegmentDetail',
            'Sed_SegmentID',
            'Sed_SegmentCriteriaID'
        );
    }
}
