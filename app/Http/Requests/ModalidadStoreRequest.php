<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModalidadStoreRequest extends FormRequest
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
            'modalidad'=>'required|max:50|unique:modalidads,modalidad',
            'costo' => 'required|numeric',
            'cargahoraria'=>'required',
            'nivel_id'=>'required',
        ];
    }
}
