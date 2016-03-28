<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Routing\Route;

class UserEditRequest extends Request
{

    private $route;

    public function __construct(Route $route)
    {
        $this->route =$route;
    }

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
            'identification'    => 'required|unique:users,identification,' . $this->route->getParameter('actor'),
            'professional_card' => '',
            'full_name'         => 'required',
            'phone'             => '',
            'birth_date'        => 'date',
            'address'           => '',
            'image'             => '',
            'details'           => '',
            'email'             => 'email|max:255|unique:users,email,' . $this->route->getParameter('actor'),
            'password'          => 'confirmed|min:6',
            'type_id'           => 'required|exists:types,id',
        ];
    }
}
