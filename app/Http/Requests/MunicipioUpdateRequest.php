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
        $municipio=$this->route('municipio');
        return [
            'municipio'=>['required','max:25',Rule::unique('municipios', 'municipio')->ignore($municipio)],
		    'provincia_id' => 'required',
		    'departamento_id' => 'required',
		    'pais_id' => 'required',
        ];
    }
}
