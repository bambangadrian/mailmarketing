<?php
namespace MailMarketing\Http\Requests;

class UpdateDssRandomIndexRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-random-index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Dri_NumberColumn' => 'required|numeric|min:0|max:10',
            'Dri_RandomIndex'  => 'required|numeric|min:0'
        ];
    }
}
