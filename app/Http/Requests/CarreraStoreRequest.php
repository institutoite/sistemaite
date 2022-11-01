<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarreraStoreRequest extends FormRequest
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
           'carrera'=>'required|min:5|max:50|unique:carreras,carrera',
           'description'=>'required|min:5|max:2000|',
           'precio' => 'required|numeric', 
        ];
    }
}
