<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

/**
 * Class ProfileRequest.
 */
class ProfileRequest extends Request
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
            'name' => 'Name',
            'phone' => 'Phone',
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required|max:155',
            'phone' => 'required'
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
