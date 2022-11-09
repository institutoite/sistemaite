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
            'nombre'=>'required|max:80|min:5|unique:colegios,nombre',
            'rue'=>'nullable|max:10|min:2',
            'director'=>'required|max:50|min:5',
            'direccion'=>'required|max:100|min:5',
            'telefono'=>'required|max:25|min:4',
            // 'celular'=>'required|max:10|min:8',
            'dependencia'=>'required|max:15|min:2',
            'turno'=>'required|max:15|min:2',
            'departamento'=>'required',
            'provincia'=>'required',
            'municipio'=>'required',
            'areageografica'=>'required|max:20',
            'coordenadax'=>'required|max:20|min:1',
            'coordenaday'=>'required|max:20|min:1',
        ];
    }
}
