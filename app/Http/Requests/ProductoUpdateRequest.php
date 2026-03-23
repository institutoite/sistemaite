<?php

namespace App\Http\Requests;

use App\Models\Producto;
use Illuminate\Foundation\Http\FormRequest;

class ProductoUpdateRequest extends FormRequest
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
        $producto = $this->route('producto');
        $id = $producto ? $producto->id : null;

        return [
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|string|max:255|unique:productos,codigo,' . $id,
            'codigo_qr' => 'nullable|string|max:255|required_without:codigo_barras|unique:productos,codigo_qr,' . $id,
            'codigo_barras' => 'nullable|string|max:255|required_without:codigo_qr|unique:productos,codigo_barras,' . $id,
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'activo' => 'nullable|boolean',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'codigo.required' => 'El código interno es obligatorio.',
            'codigo.unique' => 'El código interno ya existe.',
            'codigo_qr.required_without' => 'Debes llenar al menos Código QR o Código de barras.',
            'codigo_qr.unique' => 'El código QR ya existe.',
            'codigo_barras.required_without' => 'Debes llenar al menos Código de barras o Código QR.',
            'codigo_barras.unique' => 'El código de barras ya existe.',
            'precio.required' => 'El precio es obligatorio.',
            'stock.required' => 'El stock es obligatorio.',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $nombre = $this->input('nombre');
            if (!$nombre) {
                return;
            }

            $producto = $this->route('producto');
            $exceptId = $producto ? $producto->id : null;
            $normalizado = $this->normalizarNombre($nombre);

            $duplicado = Producto::query()
                ->when($exceptId, function ($query) use ($exceptId) {
                    $query->where('id', '<>', $exceptId);
                })
                ->get(['id', 'nombre'])
                ->contains(function ($p) use ($normalizado) {
                    return $this->normalizarNombre($p->nombre) === $normalizado;
                });

            if ($duplicado) {
                $similares = $this->buscarSimilares($nombre, $exceptId);
                $mensaje = 'Ya existe otro producto con ese nombre (considerando mayúsculas/espacios).';
                if ($similares->isNotEmpty()) {
                    $mensaje .= ' Similares: ' . $similares->implode(', ') . '.';
                }
                $validator->errors()->add('nombre', $mensaje);
            }
        });
    }

    private function normalizarNombre($nombre)
    {
        $nombre = trim((string)$nombre);
        $nombre = preg_replace('/\s+/', ' ', $nombre);
        return mb_strtolower($nombre, 'UTF-8');
    }

    private function buscarSimilares($nombre, $exceptId = null)
    {
        $nombre = trim((string)$nombre);
        $normalizado = $this->normalizarNombre($nombre);
        $terminos = collect(explode(' ', $normalizado))->filter()->values();

        $query = Producto::query();
        $query->when($exceptId, function ($q) use ($exceptId) {
            $q->where('id', '<>', $exceptId);
        });

        $query->where(function ($q) use ($nombre, $terminos) {
            $q->where('nombre', 'like', '%' . $nombre . '%');
            foreach ($terminos as $termino) {
                $q->orWhere('nombre', 'like', '%' . $termino . '%');
            }
        });

        return $query->limit(5)->pluck('nombre');
    }
}
