<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
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
        // dd($this->user)
        return [
            'nombre'          => 'required|max:100',
            'apellido'        => 'required|max:100',
            'codnacionalidad' => 'required',
            'coddpto'         => 'required',
            'codcargo'        => 'required',
            'cedula'          => 'required|max:9',
            'direccion'       => 'required|max:70',
            'telefono'        => 'required|max:20',
            'email'           => 'required|max:50',
            'usuario'         => 'nullable',
            'password'        => 'nullable'
        ];

    }
}
