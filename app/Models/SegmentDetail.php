<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class SegmentDetail extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Sed_SegmentID', 'Sed_SegmentCriteriaID'];

    /**
     * Segment relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function segment()
    {
        return $this->belongsTo('MailMarketing\Models\Segment', 'Sed_SegmentID');
    }

    /**
     * Segment criteria relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function segmentCriteria()
    {
        return $this->belongsTo('MailMarketing\Models\SegmentCriteria', 'Sed_SegmentCriteriaID');
    }
}
