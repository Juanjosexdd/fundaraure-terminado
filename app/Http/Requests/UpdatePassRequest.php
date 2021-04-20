<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassRequest extends FormRequest
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
            'nombre'          => 'nullable|max:100',
            'apellido'        => 'nullable|max:100',
            'cedula'          => 'nullable|max:20',
            'direccion'       => 'nullable|max:70',
            'telefono'        => 'nullable|max:20',
            'email'           => 'nullable|max:50',
            'usuario'         => 'nullable',
            // 'password'        => 'required|confirmed',
            'password' => 'required|min:4',
            'password_confirmation' => 'required|same:password',
            'telefono'        => 'nullable|max:100',
            'coddpto'         => 'nullable',
            'codcargo'        => 'nullable',
            'codnacionalidad' => 'nullable'
            // 'role'            => 'nullable'
        ];
    }
}
