<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class DssAlternative extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Dal_Name', 'Dal_DssID', 'Dal_ReferenceID'];

    /**
     * Dss period relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function dss()
    {
        return $this->belongsTo('MailMarketing\Models\Dss', 'Dal_DssID');
    }

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
