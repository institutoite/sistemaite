<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AsignaturaUpdateRequest extends FormRequest
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
        $asignatura=$this->route('asignatura');
        return [
            'asignatura'=>['required','max:50','min:5',Rule::unique('asignaturas')->ignore($asignatura)],
            'carrera_id'=>'required'
        ];
    }
}
