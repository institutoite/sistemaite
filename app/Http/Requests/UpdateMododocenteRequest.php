<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UpdateMododocenteRequest extends FormRequest
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
        $mododocente=$this->route('mododocente');
        return [
            'mododocente'=>['required','max:20',Rule::unique('mododocentes', 'mododocente')->ignore($mododocente)],
        ];
    }
}
