<?php
namespace MailMarketing\Http\Requests;

use MailMarketing\Http\Requests\Request;

class UpdateSubscriberGroupDetailRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-subscriber-group-detail');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'POST':
                return [
                    'Sgd_GroupID'      => 'required',
                    'Sgd_SubscriberID' => 'required|array',
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'Sgd_GroupID'      => 'required',
                    'Sgd_SubscriberID' => 'required',
                ];
        }
    }
}
