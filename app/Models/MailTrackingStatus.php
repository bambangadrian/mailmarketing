<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class MailTrackingStatus extends Model
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
    protected $table = 'MailTrackingStatus';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Mts_ID';

    /**
     * Mail tracking relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function trackings()
    {
        return $this->hasMany('MailMarketing\Models\MailTracking', 'Mtr_StatusID');
    }

    /**
     * Sent mail relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function sentMails()
    {
        return $this->belongsToMany('MailMarketing\Models\SentMail', 'MailTracking', 'Mtr_StatusID', 'Mtr_SentMailID');
    }
}
