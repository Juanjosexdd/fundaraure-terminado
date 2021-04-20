<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'codnacionalidad' => 'required',
            'cedula' => 'required|max:20|unique:clientes',
            'direccion' => 'required|max:220',
            'telefono' => 'required|max:20',
            'email' => 'required|max:50',
            'codtipocliente' => 'required',
        ];
    }
}
