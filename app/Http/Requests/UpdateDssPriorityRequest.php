<?php
namespace MailMarketing\Http\Requests;

class UpdateDssPriorityRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-dss-priority');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Criteria'    => 'required|array',
            'Alternative' => 'required|array',
            'LeftValue'   => 'required|array',
            'RightValue'  => 'required|array'
        ];
    }
}
