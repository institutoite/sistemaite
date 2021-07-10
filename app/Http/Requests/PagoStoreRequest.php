<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoStoreRequest extends FormRequest
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
            'monto'=> 'required|numeric|min:0',
            'pagocon'=> 'required|numeric|min:0',
            'cambio'=>'required|numeric|min:0',
        ];
    }
    function messages(){
        return [
            'cambio.min' => 'El Cambio no puede ser negativo. Corrija el monto o con cuanto esta pagando',
        ];
    }
}
