<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
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
    protected $table = 'Campaign';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Cpg_ID';

    /**
     * Campaign type relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaignType()
    {
        return $this->belongsTo('MailMarketing\Models\CampaignType', 'Cpg_TypeID');
    }

    /**
     * Template relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function template()
    {
        return $this->belongsTo('MailMarketing\Models\Template', 'Cpg_TemplateID');
    }

    /**
     * Sent mail relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function sentMails()
    {
        return $this->hasManyThrough(
            'MailMarketing\Models\SentMail',
            'MailMarketing\Models\MailSchedule',
            'Msd_CampaignID',
            'Sm_MailScheduleID'
        );
    }
}
