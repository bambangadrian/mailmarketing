<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class MailSchedule extends Model
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
    protected $table = 'MailSchedule';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Msd_ID';

    /**
     * Campaign relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaign()
    {
        return $this->belongsTo('MailMarketing\Models\Campaign', 'Msd_CampaignID');
    }

    /**
     * Sent mail relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sentMails()
    {
        return $this->hasMany('MailMarketing\Models\SentMail', 'Sm_MailScheduleID');
    }
}
