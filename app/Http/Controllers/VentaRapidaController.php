<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Producto;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VentaRapidaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:vender-productos')->only('create', 'store', 'buscarProducto', 'buscarProductos');
    }

    public function create()
    {
        $hoy = Carbon::today();
        $esAdmin = Auth::user()->hasRole(['Admin']);

        $ventasHoy = Venta::with(['detalles.producto', 'pagos', 'usuarios'])
            ->whereDate('created_at', $hoy)
            ->when(!$esAdmin, function ($query) {
                $query->whereHas('usuarios', function ($q) {
                    $q->where('users.id', Auth::id());
                });
            })
            ->orderByDesc('id')
            ->get();

        $totalHoy = $ventasHoy->sum('total');

        return view('ventas.rapidas', compact('ventasHoy', 'totalHoy', 'esAdmin'));
    }

    public function buscarProducto(Request $request)
    {
        $codigo = trim((string)$request->query('codigo', ''));

        if ($codigo === '') {
            return response()->json(['message' => 'Debe ingresar un codigo.'], 422);
        }

        $producto = Producto::query()
            ->where('activo', true)
            ->where(function ($query) use ($codigo) {
                $query->where('codigo', $codigo)
                    ->orWhere('codigo_qr', $codigo)
                    ->orWhere('codigo_barras', $codigo);
            })
            ->first();

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado para ese codigo.'], 404);
        }

        return response()->json([
            'id' => $producto->id,
            'nombre' => $producto->nombre,
            'codigo' => $producto->codigo,
            'precio' => (float)$producto->precio,
            'stock' => (int)$producto->stock,
        ]);
    }

    public function buscarProductos(Request $request)
    {
        $termino = trim((string)$request->query('q', ''));

        if ($termino === '') {
            return response()->json([]);
        }

        $productos = Producto::query()
            ->where('activo', true)
            ->where(function ($query) use ($termino) {
                $query->where('nombre', 'like', '%' . $termino . '%')
                    ->orWhere('codigo', 'like', '%' . $termino . '%')
                    ->orWhere('codigo_qr', 'like', '%' . $termino . '%')
                    ->orWhere('codigo_barras', 'like', '%' . $termino . '%');
            })
            ->orderBy('nombre')
            ->limit(8)
            ->get(['id', 'nombre', 'codigo', 'codigo_qr', 'codigo_barras', 'precio', 'stock']);

        return response()->json($productos->map(function ($producto) {
            return [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'codigo' => $producto->codigo,
                'codigo_qr' => $producto->codigo_qr,
                'codigo_barras' => $producto->codigo_barras,
                'precio' => (float)$producto->precio,
                'stock' => (int)$producto->stock,
            ];
        })->values());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'items' => 'required|array|min:1',
            'items.*.producto_id' => 'required|integer|exists:productos,id',
            'items.*.cantidad' => 'required|integer|min:1',
            'pagocon' => 'required|numeric|min:0',
            'observacion' => 'nullable|string|max:1500',
        ]);

        $items = collect($data['items'])
            ->map(function ($item) {
                return [
                    'producto_id' => (int)$item['producto_id'],
                    'cantidad' => (int)$item['cantidad'],
                ];
            })
            ->groupBy('producto_id')
            ->map(function ($group, $productoId) {
                return [
                    'producto_id' => (int)$productoId,
                    'cantidad' => $group->sum('cantidad'),
                ];
            })
            ->values();

        $productos = Producto::whereIn('id', $items->pluck('producto_id'))->get()->keyBy('id');

        if ($productos->count() !== $items->count()) {
            return $this->responseError($request, 'Se detectaron productos invalidos.');
        }

        $total = 0.0;
        foreach ($items as $item) {
            $producto = $productos->get($item['producto_id']);

            if (!$producto || !$producto->activo) {
                return $this->responseError($request, 'Uno de los productos no esta activo.');
            }

            if ($producto->stock < $item['cantidad']) {
                return $this->responseError($request, "Stock insuficiente para {$producto->nombre}.");
            }

            $total += ((float)$producto->precio) * $item['cantidad'];
        }

        $pagocon = (float)$data['pagocon'];
        if ($pagocon < $total) {
            return $this->responseError($request, 'El monto con el que paga no puede ser menor al total.');
        }

        $venta = DB::transaction(function () use ($items, $productos, $total, $pagocon, $data) {
            $venta = Venta::create([
                'total' => $total,
                'descuento' => 0,
                'estado' => 'PAGADA',
                'observacion' => $data['observacion'] ?? null,
            ]);

            $venta->usuarios()->attach(Auth::id());

            foreach ($items as $item) {
                $producto = $productos->get($item['producto_id']);
                $subtotal = ((float)$producto->precio) * $item['cantidad'];

                $venta->detalles()->create([
                    'producto_id' => $producto->id,
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $producto->precio,
                    'subtotal' => $subtotal,
                ]);

                $producto->decrement('stock', $item['cantidad']);
            }

            $pago = $venta->pagos()->create([
                'monto' => $total,
                'pagocon' => $pagocon,
                'cambio' => $pagocon - $total,
            ]);

            $pago->usuarios()->attach(Auth::id());

            return $venta;
        });

        if ($request->expectsJson() || $request->ajax()) {
            $venta->load(['detalles.producto', 'usuarios']);
            $esAdmin = Auth::user()->hasRole(['Admin']);

            $totalHoy = Venta::query()
                ->whereDate('created_at', Carbon::today())
                ->when(!$esAdmin, function ($query) {
                    $query->whereHas('usuarios', function ($q) {
                        $q->where('users.id', Auth::id());
                    });
                })
                ->sum('total');

            return response()->json([
                'message' => "Venta #{$venta->id} registrada correctamente.",
                'venta' => [
                    'id' => $venta->id,
                    'created_at_hora' => optional($venta->created_at)->format('H:i'),
                    'total' => (float)$venta->total,
                    'usuario' => optional($venta->usuarios->first())->name,
                    'detalles' => $venta->detalles->map(function ($detalle) {
                        return [
                            'producto' => optional($detalle->producto)->nombre,
                            'cantidad' => (int)$detalle->cantidad,
                        ];
                    })->values(),
                ],
                'total_hoy' => (float)$totalHoy,
            ], 201);
        }

        return redirect()
            ->route('ventas.rapidas.create')
            ->with('success', "Venta #{$venta->id} registrada correctamente.");
    }

    private function responseError(Request $request, string $message)
    {
        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['message' => $message], 422);
        }

        return back()->withErrors(['items' => $message])->withInput();
    }
}
