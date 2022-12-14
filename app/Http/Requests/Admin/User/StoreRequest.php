<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            //'password' => 'required|string',
            'role' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.email' => 'Данные должны соответствовать формату email',
            'email.unique' => 'Пользовательс таким email уже существует',
            //'password.required' => 'Это поле необходимо для заполнения',
            //'password.string' => 'Данные должны соответствовать строчному типу',
            'role.required' => 'Это поле необходимо для заполнения',
            'role.integer' => 'Данные должны соответствовать числовому типу',
        ];
    }
}
