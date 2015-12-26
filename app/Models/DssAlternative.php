<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class DssAlternative extends Model
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
    protected $table = 'DssAlternative';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Dal_ID';

    /**
     * Dss eigen value table per alternative per criteria relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function eigen()
    {
        return $this->hasMany('MailMarketing\Models\DssEvAlternativeCriteria', 'Deac_AlternativeID');
    }

    /**
     * Dss result per alternative relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function result()
    {
        return $this->hasOne('MailMarketing\Models\DssResult', 'Dsr_AlternativeID');
    }
}
