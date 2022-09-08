<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreComentarioRequest extends FormRequest
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
            'nombre'=>'required|min:4|max:30',
            'telefono'=>'required|min:8|max:10',
            'intereses'=>'required',
            'comentario'=>'required|max:499|min:5',
            'como_id'=>'required',
        ];
    }
}
