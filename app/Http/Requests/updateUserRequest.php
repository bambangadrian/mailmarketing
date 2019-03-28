<?php
namespace MailMarketing\Http\Requests;

use MailMarketing\Http\Requests\Request;

class UpdateUserRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-user');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Usr_Name'     => 'required|string|max:50|min:3',
            'Usr_Email'    => 'required|email|max:50',
            'Usr_Password' => 'required|min:8'
        ];
    }
}
