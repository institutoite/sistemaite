<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipofileUpdateRequest extends FormRequest
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
        $tipofile=$this->route('tipofile');

        return [
            'tipofile' => 'required|min:2|max:50|unique:tipofiles,tipofile,'.$this->id,
            'programa' => 'required|min:5|max:25',
        ];

        
    }
    
}