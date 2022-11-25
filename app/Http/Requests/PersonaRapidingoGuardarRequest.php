<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaRapidingoGuardarRequest extends FormRequest
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
            'interests'=>'required',
            "nombre" => 'required|max:50|unique_with:personas,apellidop',
            'apellidop'=>'required|max:25',
            'telefono'=>'numeric|nullable',
            'como_id'=>'required',
            "observacion" => 'required|max:400',
        ];
    }
}
