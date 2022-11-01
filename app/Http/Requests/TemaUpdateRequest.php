<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TemaUpdateRequest extends FormRequest
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
        $tema=$this->route('tema');
        return [
            'tema'=>['required','max:65',Rule::unique('temas', 'tema')->ignore($tema)],
            'materia_id'=>'required'
        ];
    }
}
