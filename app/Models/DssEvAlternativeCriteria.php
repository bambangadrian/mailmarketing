<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class DssEvAlternativeCriteria extends Model
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
    protected $table = 'DssEvAlternativeCriteria';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Deac_ID';

    /**
     * Dss criteria master relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function criteria()
    {
        return $this->belongsTo('MailMarketing\Models\DssCriteria', 'Deac_CriteriaID');
    }

    /**
     * Dss alternative master relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alternative()
    {
        return $this->belongsTo('MailMarketing\Models\DssAlternative', 'Deac_AlternativeID');
    }

    /**
     * Dss alternative per criteria comparison relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function compares()
    {
        return $this->hasMany('MailMarketing\Models\DssAlternativeDetail', 'Dad_EigenID');
    }
}
