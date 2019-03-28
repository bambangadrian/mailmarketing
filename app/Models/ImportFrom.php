<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class ImportFrom extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Imf_Name', 'Imf_Description'];

    /**
     * Subscriber relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscribers()
    {
        return $this->hasMany('MailMarketing\Models\Subscriber', 'Sbr_ImportFromID');
    }
}
