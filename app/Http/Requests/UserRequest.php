<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'nombre'          => 'required|max:100',
            'apellido'        => 'required|max:100',
            'codnacionalidad' => 'required',
            'coddpto'         => 'required',
            'codcargo'        => 'required',
            'cedula'          => 'required|max:9|unique:users,cedula',
            'direccion'       => 'required|max:70',
            'telefono'        => 'required|max:20',
            'email'           => 'required|max:50|unique:users|email',
            'usuario'         => 'required|unique:users',
            'password'        => [
                                    'required',
                                    'string',
                                    'min:6',             // must be at least 10 characters in length
                                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                                    'regex:/[0-9]/',      // must contain at least one digit
                                    'regex:/[@$!%*#?&]/', // must contain a special character
                                ],
            'roles'            => 'required'
        ];
    }
    public function message()
    {
        return [
            'password.regex' =>'La contraseña debe ser alfanumerica'
        ];
    }
}
