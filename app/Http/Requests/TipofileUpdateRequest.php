<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'tipofile'=>['required','max:10',Rule::unique('tipofiles', 'tipofile')->ignore($tipofile)],
            'programa' => 'required|max:25',
        ];

        
    }
    
}
