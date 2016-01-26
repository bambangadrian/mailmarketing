<?php
namespace MailMarketing\Http\Requests;

class UpdateCampaignTypeRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-campaign-type');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Cgt_Name' => 'required|string|max:100|min:3',
        ];
    }
}
