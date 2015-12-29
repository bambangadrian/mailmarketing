<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class Dss extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Dss_Name', 'Dss_Description', 'Dss_RandomIndexID', 'Dss_StartPeriod', 'Dss_EndPeriod'];

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
