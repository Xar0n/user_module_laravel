<?php

namespace App\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserRightRequest
 *
 * @package App\User\Requests
 *
 * Запрос для права
 */
class UserRightRequest extends FormRequest
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
            'name' => 'required|unique:users_rights|min:1|max:100'
        ];
    }
}
