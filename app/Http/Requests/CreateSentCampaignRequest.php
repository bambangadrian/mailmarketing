<?php
namespace MailMarketing\Http\Requests;

class CreateSentCampaignRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('sent-campaign');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Msd_CampaignID'        => 'required',
            'Msd_MailListID'        => 'required',
            'Msd_SubscriberGroupID' => 'required',
            'Msd_ExecutedDate'      => 'required|date',
        ];
    }
}
