<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlanRequest extends FormRequest
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
        $plan=$this->route('plan');
        return [
            'titulo' => ['required','max:250',Rule::unique('permissions')->ignore($plan)],
            'descripcion'=>'required|max:100',
            'foto'=>'required',
            'costo'=>'required',
            'convenio_id'=>'required',
        ];
    }
}
