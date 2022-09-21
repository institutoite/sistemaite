<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColegioStoreRequest extends FormRequest
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
            'nombre'=>'required|unique:colegios,nombre',
            'rue'=>'nullable',
            'director'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'celular'=>'required',
            'dependencia'=>'required',
            'turno'=>'required',
            'departamento_id'=>'required',
            'niveles'=>'required',
            'provincia_id'=>'required',
            'municipio_id'=>'required',
            // 'distrito'=>'required',
            'areageografica'=>'required',
            'coordenadax'=>'required',
            'coordenaday'=>'required',
            
        ];
    }
}
