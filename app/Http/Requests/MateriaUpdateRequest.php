<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MateriaUpdateRequest extends FormRequest
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
        $materia=$this->route('materia');
        return [
            'materia'=>['required','max:25',Rule::unique('materias', 'materia')->ignore($materia)],
            'niveles'=>'required', 
        ];
    }
}
