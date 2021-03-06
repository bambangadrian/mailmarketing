<?php
namespace MailMarketing\Http\Requests;

class UpdateTemplateRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolean
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-template');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Tpl_Name' => 'required|string|max:100|min:3',
            'Tpl_File' => 'mimes:zip|max:5120'
        ];
    }
}
