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
    protected $fillable = [
        'Dss_Name',
        'Dss_Description',
        'Dss_RandomIndexID',
        'Dss_StartPeriod',
        'Dss_EndPeriod',
        'Dss_CriteriaEigenValue',
        'Dss_CriteriaConsistencyIndex',
        'Dss_CriteriaConsistencyRatio',
        'Dss_RunOn',
    ];

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
     * Dss consistency matrix data relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function consistency()
    {
        return $this->hasManyThrough(
            'MailMarketing\Models\DssCriteriaDetail',
            'MailMarketing\Models\DssCriteria',
            'Dcr_DssID',
            'Dcd_CriteriaID'
        );
    }

    /**
     * Dss result relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
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
