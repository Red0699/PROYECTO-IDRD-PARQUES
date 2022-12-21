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
            'idParque' => 'required',
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
            'descripcion'=> 'required',
            'estado' => 'required'
        ];
    }
}
