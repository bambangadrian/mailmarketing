<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class DssRandomIndex extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Dri_NumberColumn', 'Dri_RandomIndex'];

    /**
     * Dss master relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dss()
    {
        return $this->hasMany('MailMarketing\Models\Dss', 'Dss_RandomIndexID');
    }
}
