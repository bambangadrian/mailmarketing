<?php
namespace MailMarketing\Models;

class DssEvAlternativeCriteria extends AbstractBaseModel
{

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Deac_CriteriaID', 'Deac_AlternativeID', 'Deac_EigenVector', 'Deac_MatrixTotal'];

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
