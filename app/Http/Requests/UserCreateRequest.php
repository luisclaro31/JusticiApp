<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'identification'    => 'required|unique:users',
            'professional_card' => '',
            'full_name'         => 'required',
            'phone'             => '',
            'birth_date'        => 'date',
            'address'           => '',
            'image'             => '',
            'details'           => '',
            'email'             => 'required|email|max:255|unique:users',
            'password'          => 'required|confirmed|min:6',
            'type_id'           => 'required|exists:types,id',

        ];
    }
}
