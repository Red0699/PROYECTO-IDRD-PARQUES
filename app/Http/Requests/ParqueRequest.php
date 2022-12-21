<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParqueRequest extends FormRequest
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
            'nombreParque' => 'required | min:5',
            'localidad' => 'required',
            'area' => 'required',
            'escala' => 'required',
            'estrato' => 'required',
            'direccion' => 'required | min: 5',
            'foto' => "mimes:jpeg,png,jpg"
        ];
    }

    public function messages(){
        return [
            'nombreParque.required' => 'El campo es requerido',
            'localidad.required' => 'Debe seleccionar una opción',
            'area.required' => 'El campo es requerido',
            'escala.required' => 'Debe seleccionar una opción',
            'estrato.required' => 'Debe seleccionar una opción',
            'direccion.required' => 'El campo es requerido',

            'nombreParque.min' => 'El campo debe tener al menos :min caracteres',
            'direccion.min' => 'El campo debe tener al menos :min caracteres',

            'foto.mimes' => 'El archivo debe ser tipo JPG, JPEG, PNG'
        ];
    }
}
