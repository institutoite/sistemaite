<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartamentoUpdateRequest extends FormRequest
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
        
        $departamento=$this->route('departamento');
        return [
            'departamento'=>['required','max:20','min:5',Rule::unique('departamentos')->ignore($departamento)],
            'pais_id'=>'required',
        ];
    }
}
