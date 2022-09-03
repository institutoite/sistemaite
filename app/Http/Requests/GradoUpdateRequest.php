<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GradoUpdateRequest extends FormRequest
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
            // 'grado' => 'required|min:5|max:30',Rule::unique('grados', 'grado')->ignore($grado),
		    // 'nivel_id' => 'required',
            /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  LAS VALIDACIONES SE REALIZAN EN EL CONTROLADOR YA QUE ESTA HECHO EN AJAX */
        ];
    }
}
