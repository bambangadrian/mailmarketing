<?php
namespace MailMarketing\Http\Requests;

class UpdateDssCriteriaRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-dss-criteria');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Dcr_Name'  => 'required|string|max:100|min:3',
            'Dcr_DssID' => 'required'
        ];
    }
}
