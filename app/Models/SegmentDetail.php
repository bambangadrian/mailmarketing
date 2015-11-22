<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class SegmentDetail extends Model
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
    protected $table = 'SegmentDetail';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Sed_ID';

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
