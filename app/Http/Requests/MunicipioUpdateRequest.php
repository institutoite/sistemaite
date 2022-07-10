<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MunicipioUpdateRequest extends FormRequest
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
            'municipio' => 'required',Rule::unique('municipios', 'municipio')->ignore($this->municipio),
		    'provincia_id' => 'required',
		    'departamento_id' => 'required',
		    'pais_id' => 'required',
        ];
    }
}
