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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            /**
             * 
             * AL PARECER ESTO NO ESTA TRBAAJANDO
             * 
             */
            'interests'=>'required',
            "nombre" => 'required|unique_with:personas,apellidop'.$persona->id,
            'apellidop'=>'required|max:50',
            'telefono'=>'numeric|nullable',
            'como'=>'required',
            // 'nombrefamiliar'=>'required',
            // 'apellidopfamiliar'=>'required',
            // 'telefonofamiliar'=>'required|numeric|min:8',
            // 'parentesco'=>'required',
            // 'observacion'=>'required|min:20',
        ];
    }
}
