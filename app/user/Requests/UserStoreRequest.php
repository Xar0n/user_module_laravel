<?php

namespace App\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user.gender' => 'required|boolean',
            'user.login' => 'required|unique:users,login|min:1|max:30',
            'user.password' => 'required|min:4|max:32',
            'user.fio' => 'required|min:1|max:50',
            'user.email' => 'nullable|unique:users,email|min:3|max:320',
            'user.phone' => 'nullable|min:15|max:15',
            'user.telegram' => 'nullable|min:5|max:32',
            'user.avatar' => 'nullable|min:1|max:50',
            'user.organization_id' => 'nullable|integer|between:1,20',
            'user.division_id' => 'nullable|integer|between:1,20',
            'user.post_id' => 'nullable|integer|between:1,20',
            'user.location_id' => 'nullable|integer|between:1,20',
            'user.base_id' => 'nullable|integer|between:1,20',
            'roles' => 'required'
        ];
    }
}
