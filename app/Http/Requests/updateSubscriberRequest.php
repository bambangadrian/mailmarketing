<?php
namespace MailMarketing\Http\Requests;

use MailMarketing\Http\Requests\Request;

class updateSubscriberRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-subscriber');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Sbr_EmailAddress' => 'required|email|string|max:50|min:3',
            'Sbr_FirstName'    => 'required|max:50|min:3',
            'Sbr_MemberRating' => 'required|numeric|max:5|digits:1'
        ];
    }
}
