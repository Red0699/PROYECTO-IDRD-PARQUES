<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotoRequest extends FormRequest
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
            'photo' => ['required', 'mimes:jpeg,png,jpg']
        ];
    }

    public function messages()
    {
        return [
            'photo.mimes' => 'El archivo debe ser tipo JPG, JPEG, PNG'
        ];
    }
}
