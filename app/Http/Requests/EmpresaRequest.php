<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
        $rules = [
            'nombre'        => 'required',
            'rif'           => 'required',
            'direccion'     => 'required',
            'descripcion'   => 'required',
            'file'          => 'required'
        ];

        if($this->get('image'))
            $rules = array_merge($rules, ['image' => 'mimes:jpg,jpeg,png,gif']);

        return $rules;
    }
}
