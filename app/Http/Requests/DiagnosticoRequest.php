<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosticoRequest extends FormRequest
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
            'descripcion' => 'required',
            'fecha' => 'required',
            'estado' => 'required',
            'observaciones' => 'required',
            'acciones' => 'required'
        ];
    }

    public function messages()
    {
        return [
            '*.required' => 'El campo no debe estar vacío'
        ];
    }
}
