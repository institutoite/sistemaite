<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaStoreRequest extends FormRequest
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
            "nombre" => 'required|unique_with:personas,apellidop,apellidom',
            "apellidop" =>'required|string|max:25',
            "apellidom" => 'nullable|string|max:25',
            "fechanacimiento" =>'required|date',
            "pais_id" => 'required|integer',
            "ciudad_id" => 'required|integer',
            "zona_id" => 'required|integer',
            "direccion" => 'required|string|max:120',
            "carnet" => 'required|string',
            "expedido" => 'required|string',
            "genero" => 'required|string',
            "observacion" =>'required|string|max:250',
            "como" =>'required|string|max:30',
            "foto" => 'nullable|file',
            "papel" =>'required|string',
        ];
    }
}
