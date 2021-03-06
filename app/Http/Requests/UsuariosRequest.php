<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'nombre' => 'required|max:100',
            'tipo_documento' => 'required|max:20',
            'num_documento' => 'required|max:20|unique:users,'
            'direccion' => 'required|max:70',
            'telefono' => 'required|max:20',
            'email' => 'required|max:50|unique:users',
            'usuario' => 'required|unique:users',
            'password' => 'required|max:100',
            'telefono' => 'required|max:100',
        ];
    }
}
