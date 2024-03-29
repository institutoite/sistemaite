<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MatriculacionStoreRequest extends FormRequest
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
        'computacion_id'=>'required|numeric',
        'asignatura_id'=>'required|numeric',
        'fechaini'=>'required',
        'costo'=>'required',
        'totalhoras'=>'required',
        'motivo_id'=>'required',
        ];
    }
}
