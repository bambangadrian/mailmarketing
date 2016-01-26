<?php
namespace MailMarketing\Http\Requests;

class UpdateSubscriberGroupRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-subscriber-group');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Sbg_MailListID' => 'required',
            'Sbg_Name'       => 'required|string|max:50|min:3',
        ];
    }
}
