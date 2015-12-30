<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class SegmentCriteria extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Sc_Name', 'Dal_DssID'];

    /**
     * Segment relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function segments()
    {
        return $this->belongsToMany(
            'MailMarketing\Models\Segment',
            'SegmentDetail',
            'Sed_SegmentCriteriaID',
            'Sed_SegmentID'
        );
    }
}
