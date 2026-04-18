<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoStoreRequest extends FormRequest
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
            'monto'=> 'required|numeric|gt:0',
            'pagocon'=> 'required|numeric|gt:0',
            'cambio'=>'required|numeric|min:0',
            'forma_pago' => 'required|in:QR,EFECTIVO',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $monto = (float) $this->input('monto', 0);
            $pagocon = (float) $this->input('pagocon', 0);
            $cambio = (float) $this->input('cambio', 0);
            $formaPago = mb_strtoupper((string) $this->input('forma_pago', ''));

            if ($pagocon < $monto) {
                $validator->errors()->add('pagocon', 'Pago con no puede ser menor al monto.');
            }

            $cambioEsperado = round($pagocon - $monto, 2);
            if (abs($cambioEsperado - round($cambio, 2)) > 0.01) {
                $validator->errors()->add('cambio', 'El cambio no coincide con la diferencia entre pago con y monto.');
            }

            if ($formaPago === 'QR') {
                if (abs(round($cambio, 2)) > 0.01) {
                    $validator->errors()->add('cambio', 'Para pagos QR el cambio debe ser 0.');
                }
                if (abs(round($pagocon - $monto, 2)) > 0.01) {
                    $validator->errors()->add('pagocon', 'Para pagos QR, pago con debe ser igual al monto.');
                }
            }
        });
    }

    function messages(){
        return [
            'cambio.min' => 'El Cambio no puede ser negativo. Corrija el monto o con cuanto esta pagando',
            'forma_pago.required' => 'Debe seleccionar una forma de pago.',
            'forma_pago.in' => 'La forma de pago debe ser QR o Efectivo.',
            'monto.gt' => 'El monto debe ser mayor a cero.',
            'pagocon.gt' => 'Pago con debe ser mayor a cero.',
        ];
    }
}
