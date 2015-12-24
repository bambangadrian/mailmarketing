<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class DssResult extends Model
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
    protected $table = 'DssResult';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Dsr_ID';

    /**
     * Dss alternative relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alternative()
    {
        return $this->belongsTo('MailMarketing\Models\DssAlternative', 'Dsr_AlternativeID');
    }
}
