<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;
use MailMarketing\Contracts\Model\ActiveScopeModel;

class Template extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Tpl_Name', 'Tpl_Description'];

    /**
     * Campaign relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campaigns()
    {
        return $this->hasMany('MailMarketing\Models\Campaign', 'Cpg_TemplateID');
    }
}
