<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class DssAlternativeDetail extends Model
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
    protected $table = 'DssAlternativeDetail';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Dad_ID';

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
