<?php
namespace MailMarketing\Http\Requests;

class UpdateCampaignRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-campaign');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Cpg_TypeID'           => 'required',
            'Cpg_CategoryID'       => 'required',
            'Cpg_TopicID'          => 'required',
            'Cpg_Name'             => 'required|string|min:3|max:50',
            'Cpg_EmailSubject'     => 'string|max:255',
            'Cpg_EmailAddressFrom' => 'email|string|max:50|min:3'
        ];
    }
}
