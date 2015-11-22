<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
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
    protected $table = 'Segment';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Seg_ID';

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
