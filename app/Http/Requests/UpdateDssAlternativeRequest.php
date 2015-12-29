<?php
namespace MailMarketing\Http\Requests;

class UpdateDssAlternativeRequest extends Request
{

    /**
     * The URI to redirect to if validation fails
     *
     * @var string
     */
    protected $redirect = 'admin/dss/alternative/create';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-dss-alternative');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Dal_Name'  => 'required|string|max:100|min:3',
            'Dal_DssID' => 'required'
        ];
    }
}
