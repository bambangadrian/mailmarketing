<?php
namespace MailMarketing\Http\Requests;

class UpdateDssRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-dss-period');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Dss_Name'        => 'required|string|max:100|min:3',
            'Dss_StartPeriod' => 'required|date',
            'Dss_EndPeriod'   => 'required|date',
        ];
    }
}
