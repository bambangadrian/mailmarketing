<?php
namespace MailMarketing\Models;

use MailMarketing\Contracts\Model\ActiveScopeModel;

class Campaign extends AbstractBaseModel
{

    use ActiveScopeModel;

    /**
     * Fillable field using for mass assignment.
     *
     * @var array $fillable
     */
    protected $fillable = ['Cpg_TypeID', 'Cpg_CategoryID', 'Cpg_TopicID', 'Cpg_TemplateID', 'Cpg_Name', 'Cpg_EmailSubject', 'Cpg_EmailAddressFrom', 'Cpg_EmailNameFrom', 'Cpg_Content'];

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
     * Campaign category relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaignCategory()
    {
        return $this->belongsTo('MailMarketing\Models\CampaignCategory', 'Cpg_CategoryID');
    }

    /**
     * Campaign topic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campaignTopic()
    {
        return $this->belongsTo('MailMarketing\Models\CampaignTopic', 'Cpg_TopicID');
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
