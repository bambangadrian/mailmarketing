<?php
namespace MailMarketing\Http\Requests;

class UpdateMailListRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-maillist');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Mls_Name'             => 'required|string|max:50|min:3',
            'Mls_EmailAddressFrom' => 'required|email|string|max:50|min:3',
            'Mls_EmailNameFrom'    => 'required|string|max:50|min:3',
            'Mls_CompanyName'      => 'required|string|max:50|min:3',
            'Mls_AccessLevel'      => 'required'
        ];
    }
}
