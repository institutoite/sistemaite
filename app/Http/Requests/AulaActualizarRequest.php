<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AulaActualizarRequest extends FormRequest
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
        $aula=$this->route('aula');
        // dd($aula);
            return [
            'aula'=>['required','max:20','min:5',Rule::unique('aulas')->ignore($aula)],
            'direccion'=>'required|min:5|max:200',
        ];
    }
}
