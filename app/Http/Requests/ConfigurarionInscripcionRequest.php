<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfigurarionInscripcionRequest extends FormRequest
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
            'dias'=> 'required|array',
            'materias'=> 'required|array',
            'docentes'=> 'required|array',
            'aulas'=> 'required|array',
            'horainicio'=> 'required|array',
            'horafin'=> 'required|array',
        ];
    }
}
