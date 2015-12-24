<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignCategory extends Model
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
    protected $table = 'CampaignCategory';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Cc_ID';

    /**
     * Campaign relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campaigns()
    {
        return $this->hasMany('MailMarketing\Models\Campaign', 'Cpg_CategoryID');
    }
}
