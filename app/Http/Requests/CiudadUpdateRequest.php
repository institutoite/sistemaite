<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CiudadUpdateRequest extends FormRequest
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
        $ciudade=$this->route('ciudade');
            return [
            'ciudad'=>['required','max:80','min:5',Rule::unique('ciudads')->ignore($ciudade)],
            'pais_id'=>'required'
        ];
    }
}
