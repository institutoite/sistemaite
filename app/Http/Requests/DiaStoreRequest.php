<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiaStoreRequest extends FormRequest
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
            'dia'=>'required|min:5|max:20|unique:dias,dia',
        ];
    }
}
