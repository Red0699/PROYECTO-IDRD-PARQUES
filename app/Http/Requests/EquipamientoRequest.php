<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamientoRequest extends FormRequest
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
            //'idparque' => 'required',
            'modulo' => 'required',
            'largo' => 'required',
            'ancho' => 'required',
            'area' => 'required',
            'luz' => 'required',
            'agua' => 'required',
            'gas' => 'required',
            'descripcion' => 'required',
            'estado' => 'required'
        ];
    }
    public function messages()
    {
        return [
            //'idparque.required' => 'Debe seleccionar una opción',
            'modulo.required' => 'Debe seleccionar una opción',
            'largo.required' => 'Debe digitar un valor',
            'ancho.required' => 'Debe digitar un valor ',
            'area.required' => 'Debe digitar un area',
            'luz.required' => 'Debe seleccionar una opción',
            'agua.required' => 'Debe seleccionar una opción',
            'gas.required' => 'Debe seleccionar una opción',
            'descripcion.required' => 'El campo no debe estar vacío',
            'estado.required' => 'Debe seleccionar una opción'
        ];
}
}