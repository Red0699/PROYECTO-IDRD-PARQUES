<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CanchaRequest extends FormRequest
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
            'id_parque' => 'required',
            'tipocancha' => 'required',
            'iluminacion' => 'required',
            'material' => 'required',
            'cerramiento' => 'required',
            'camerino' => 'required',
            'largo' => 'required',
            'ancho' => 'required',
            'area' => 'required',
            'descripcion' => 'required',
            'estado' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'id_parque.required' => 'Debe seleccionar una opción',
            'tipocancha.required' => 'Debe seleccionar una opción',
            'iluminacion.required' => 'Debe seleccionar una opción',
            'material.required' => 'Debe seleccionar una opción',
            'cerramiento.required' => 'Debe seleccionar una opción',
            'camerino.required' => 'Debe seleccionar una opción',
            'largo.required' => 'El campo no debe estar vacío',
            'ancho.required' => 'El campo no debe estar vacío',
            'area.required' => 'El campo no debe estar vacío',
            'descripcion.required' => 'El campo no debe estar vacío',
            'estado.required' => 'Debe seleccionar una opción'
        ];
    }
}
