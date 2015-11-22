<?php
namespace MailMarketing\Models;

use Illuminate\Database\Eloquent\Model;

class MailTracking extends Model
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
    protected $table = 'MailTracking';

    /**
     * The primary key field name.
     *
     * @var string $primaryKey
     */
    protected $primaryKey = 'Mtr_ID';

    /**
     * Sent mail relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sentMail()
    {
        return $this->belongsTo('MailMarketing\Models\SentMail', 'Mtr_SentMailID');
    }

    /**
     * Mail tracking status relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trackingStatus()
    {
        return $this->belongsTo('MailMarketing\Models\MailTrackingStatus', 'Mtr_StatusID');
    }
}
