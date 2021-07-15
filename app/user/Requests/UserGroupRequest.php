<?php

namespace App\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserGroupRequest
 *
 * @package App\User\Requests
 *
 * Запрос для группы
 */
class UserGroupRequest extends FormRequest
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
            'name' => 'required|unique:users_groups|min:1|max:100'
        ];
    }
}
