<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobiliarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'idparque' => 'required',
            'tipomobiliario' => 'required',
            'material' => 'required',
            'longitud' => 'required',
            'estado' => 'required',
            'ubicacion' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'idparque.required' => 'Debe seleccionar una opción',
            'tipomobiliario.required' => 'Debe seleccionar una opción',
            'material.required' => 'Debe seleccionar una opción',
            'longitud.required' => 'El campo no debe estar vacío',
            'estado.required' => 'Debe seleccionar una opción',
            'ubicacion.required' => 'El campo no debe estar vacío',  
        ];
    }
}
