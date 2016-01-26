<?php
namespace MailMarketing\Http\Requests;

class UpdateTrackingStatusRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-tracking-status');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Mts_Name' => 'required|string|max:100|min:3',
        ];
    }
}
