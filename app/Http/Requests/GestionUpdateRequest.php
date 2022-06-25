<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GestionUpdateRequest extends FormRequest
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
            'estudiante_id'=>'required',
            'grado_id'=>'required',
            'colegio'=>'required',
            'anio' => 'required',
        ];
    }
}
