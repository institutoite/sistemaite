<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersona extends FormRequest
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
            'nombre'=>'required|max:40',
            'apellidop'=>'required|max:25',
            'apellidom'=>'nullable|max:25',

            'fechanacimiento'=>'required',
            'direccion'=>'required|max:120',
            'carnet'=>'required|max:10',

            'expedido'=>'required|max:10',
            'genero'=>'required|max:6',
            'observacion'=>'required|max:250|min:10',

            'foto'=>'nullable|max:120',
            'como'=>'required|max:30',
            'persona_id'=>'nullable|integer',

            'pais_id'=>'required|integer|not_in:0',
            'ciudad_id'=>'required|integer|not_in:0',
            'zona_id'=>'required|integer|not_in:0',

            
        ];
    }   
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
/*public function messages()
{
    return [
        'nombre.required' => 'El campo Nombre es requerido',
        'apellidop.required' => 'El campo Apellido Paterno es requerido',
        'apellidom.required' => 'El campo Apellido Materno es requerido',
        'fechanacimiento.required' => 'El campo Fecha de Nacimiento es requerido',
        'direccion.required' => 'El campo Dirección es requerido',
        'genero.required' => 'El campo Género es requerido',
        'observacion.required' => 'El campo Observácion es requerido',
        'como.required' => 'El campo ComoSeEnteró es requerido',
    ];
}*/
}
