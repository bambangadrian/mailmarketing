<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class Dss extends Model
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
    protected $table = 'Dss';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Dss_ID';

    /**
     * Dss alternative relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function alternatives()
    {
        return $this->hasMany('MailMarketing\Models\DssAlternative', 'Dal_DssID');
    }

    /**
     * Dss criteria relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function criterias()
    {
        return $this->hasMany('MailMarketing\Models\DssCriteria', 'Dcr_DssID');
    }

    /**
     * Dss result relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function results()
    {
        return $this->hasManyThrough(
            'MailMarketing\Models\DssResult',
            'MailMarketing\Models\DssAlternative',
            'Dal_DssID',
            'Dsr_AlternativeID'
        );
    }
}
