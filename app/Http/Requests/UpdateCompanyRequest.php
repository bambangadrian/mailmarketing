<?php
namespace MailMarketing\Http\Requests;

class UpdateCompanyRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-company');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Cpy_Name'       => 'required|string|max:100|min:3',
            'Cpy_Email'      => 'email|string|max:50|min:3',
            'Cpy_WebsiteUrl' => 'required|url|max:100',
            'Cpy_Address1'   => 'required|string|max:100|min:3',
            'Cpy_TimeZone'   => 'required|timezone'
        ];
    }
}
