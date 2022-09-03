<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FeriadoUpdateRequest extends FormRequest
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
            'departamento'=>['required','max:50','min:5',Rule::unique('departamentos')->ignore($departamento)],
        return [
            'fecha'=>'required|',Rule::unique('feriados', 'fecha')->ignore($this->fecha),
            'festividad'=>'required',
        ];
    }
}
