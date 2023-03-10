<?php

namespace App\Modules\Admin\User\Requests;

use Illuminate\Support\Facades\Auth;
use App\Services\Requests\ApiRequest;

class UserRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->canDo(['SUPER_ADMIN','USERS_ACCESS']);
    }

    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();

        $validator->sometimes('password',['required','confirmed'],function ($input) {

            if(!empty($input->password) || (empty($input->password) && ($this->route()->getName() != 'api.users.update'))) {
                return true;
            }
            return false;
        });

        return $validator;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'role_id'=>'required',
        ];
    }
}
