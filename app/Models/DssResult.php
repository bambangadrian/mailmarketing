<?php
namespace MailMarketing\Models;

class DssResult extends AbstractBaseModel
{

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Dsr_AlternativeID', 'Dsr_Result'];

    /**
     * Dss alternative relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function alternative()
    {
        return $this->belongsTo('MailMarketing\Models\DssAlternative', 'Dsr_AlternativeID');
    }
}
