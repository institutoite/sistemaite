<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'name'=>'required|max:64|unique:name,users,'.$this->id, 
            'email'=>'required|max:64|unique:email,users', 
            'password'=>'required|max:64',
            'foto'=>'nullable|max:64', 
        ];
    }
}
