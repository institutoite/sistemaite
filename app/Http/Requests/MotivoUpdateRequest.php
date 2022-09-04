<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class MotivoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        return [
            /**
             * LA VALIDACION ESTA EN ELCONTROLADOR YA QUE SE IMPLEMENTO CON AJAX
             */
            // 'motivo'=>'required',Rule::unique('motivos', 'motivo')->ignore($this->motivo),
            // 'tipomotivo_id'=>'required',
        ];
    }
}
