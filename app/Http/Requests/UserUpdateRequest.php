<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class UserUpdateRequest extends FormRequest
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
        $user=$this->route('user');
        return [
            'name'=>'required|max:64',Rule::unique('users', 'name')->ignore($this->user),
            'email'=>'required|max:64',Rule::unique('users', 'email')->ignore($this->user),
            'password'=>'nullable',
            'foto'=>'nullable|max:64', 
        ];
    }
}
