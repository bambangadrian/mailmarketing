<?php
namespace MailMarketing\Http\Requests;

/**
 * Class UpdateDssConsistencyRequest
 *
 * @package    MailMarketing
 * @subpackage Http\request
 */
class UpdateDssConsistencyRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-dss-consistency');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Criteria'   => 'required|array',
            'LeftValue'  => 'required|array',
            'RightValue' => 'required|array',
        ];
    }
}
