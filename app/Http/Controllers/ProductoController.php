<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoStoreRequest;
use App\Http\Requests\ProductoUpdateRequest;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:gestionar-productos-admin')->only('index', 'sugerencias', 'store', 'update', 'destroy');
    }

    public function index()
    {
        $productos = Producto::orderByDesc('id')->paginate(20);

        $resumen = [
            'total' => Producto::count(),
            'activos' => Producto::where('activo', true)->count(),
            'escasos' => Producto::whereColumn('stock', '<=', 'stock_minimo')->count(),
            'agotados' => Producto::where('stock', '<=', 0)->count(),
        ];

        return view('producto.index', compact('productos', 'resumen'));
    }

    public function sugerencias(Request $request)
    {
        $nombre = trim((string) $request->query('nombre', ''));

        if ($nombre === '') {
            return response()->json([]);
        }

        $nombreNormalizado = $this->normalizarNombre($nombre);
        $terminos = collect(explode(' ', $nombreNormalizado))->filter()->values();

        $query = Producto::query();
        $query->where(function ($q) use ($nombre, $terminos) {
            $q->where('nombre', 'like', '%' . $nombre . '%');
            foreach ($terminos as $termino) {
                $q->orWhere('nombre', 'like', '%' . $termino . '%');
            }
        });

        $productos = $query->orderBy('nombre')->limit(8)->get(['id', 'nombre', 'codigo', 'precio', 'stock']);

        return response()->json($productos);
    }

    public function store(ProductoStoreRequest $request)
    {
        $data = $request->validated();

        $data['activo'] = (bool) ($data['activo'] ?? true);
        $data['nombre'] = preg_replace('/\s+/', ' ', trim((string) $data['nombre']));
        $data['stock_minimo'] = (int) ($data['stock_minimo'] ?? 5);

        if (!$request->user() || !$request->user()->hasRole(['Admin'])) {
            unset($data['costo']);
        }

        $producto = Producto::create($data);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'message' => 'Producto creado correctamente.',
                'producto' => $producto,
            ], 201);
        }

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function update(ProductoUpdateRequest $request, Producto $producto)
    {
        $data = $request->validated();

        $data['activo'] = (bool) ($data['activo'] ?? false);
        $data['nombre'] = preg_replace('/\s+/', ' ', trim((string) $data['nombre']));
        $data['stock_minimo'] = (int) ($data['stock_minimo'] ?? 5);

        if (!$request->user() || !$request->user()->hasRole(['Admin'])) {
            unset($data['costo']);
        }

        $producto->update($data);

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $producto)
    {
        $tieneVentas = $producto->detallesVenta()->exists();

        if ($tieneVentas) {
            if ($producto->activo) {
                $producto->update(['activo' => false]);
            }

            return redirect()->route('productos.index')->with('warning', 'El producto tiene ventas historicas, no se elimino. Fue desactivado para proteger la integridad del historial.');
        }

        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }

    private function normalizarNombre($nombre)
    {
        $nombre = trim((string) $nombre);
        $nombre = preg_replace('/\s+/', ' ', $nombre);
        return mb_strtolower($nombre, 'UTF-8');
    }
}
