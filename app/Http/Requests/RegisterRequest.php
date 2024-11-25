<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class RegisterRequest.
 */
class RegisterRequest extends Request
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

    public function attributes()
    {
        return [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|max:155',
            'email' => 'required|unique:users|email|max:155',
            'password' => 'required|max:16',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
