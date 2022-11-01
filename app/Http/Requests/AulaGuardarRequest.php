<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AulaGuardarRequest extends FormRequest
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
            'aula'=> 'required|min:5|max:20|unique:aulas,aula',
            'direccion'=> 'required|min:5|max:200',
        ];
    }
}
