<?php
namespace MailMarketing\Http\Requests;

class UpdateMailListMemberRequest extends Request
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->hasRole('admin') or \Auth::user()->hasPermission('manage-mailing-list-member');
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
                    'Sgd_SubscriberID' => 'required|array'
                ];
            case 'PUT':
            case 'PATCH':
                return [
                    'Sgd_SubscriberID' => 'required'
                ];
        }
    }
}
