<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JuegosRequest extends FormRequest
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
            //
            //'idParque' => 'required',
            'tipojuego' => 'required',
            'iluminacion' => 'required',
            'material' => 'required',
            'altura' => 'required',
            'cerramiento' => 'required',
            'reservable' => 'required',
            'largo' => 'required',
            'ancho' => 'required',
            'area' => 'required',
            'materialsuperficie' => 'required',
            'descripcion' => 'required',
            'estado' => 'required'
        ];
    }

    public function messages()
    {
        return [
            //'idParque.required' => 'Debe seleccionar una opción',
            'tipojuego.required' => 'Debe seleccionar una opción',
            'iluminacion.required' => 'Debe seleccionar una opción',
            'material.required' => 'Debe seleccionar una opción',
            'altura.required' => 'Debe seleccionar una opción',
            'cerramiento.required' => 'Debe seleccionar una opción',
            'reservable.required' => 'Debe seleccionar una opción',
            'largo.required' => 'El campo no debe estar vacío',
            'ancho.required' => 'El campo no debe estar vacío',
            'area.required' => 'El campo no debe estar vacío',
            'materialsuperficie.required' => 'Debe seleccionar una opción',
            'descripcion.required' => 'El campo no debe estar vacío',
            'estado.required' => 'Debe seleccionar una opción'
        ];
    }
}
