<?php

namespace App\Http\Controllers;

use App\Models\Inscripcione;
use App\Models\Matriculacion;
use App\Models\Pago;
use App\Models\Venta;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReportePagoVentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Pagos')->only('diarioUsuario');
        $this->middleware('can:Listar Pagos')->only('generalAdmin');
        $this->middleware('can:ver-mis-ventas-propios')->only('misVentasUsuario');
    }

    public function diarioUsuario()
    {
        $hoy = Carbon::today();

        $pagos = Pago::with('pagable')
            ->whereDate('created_at', $hoy)
            ->whereHas('usuarios', function ($query) {
                $query->where('users.id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        $pagos = $pagos->map(function ($pago) {
            $pago->concepto_reporte = $this->resolverConcepto($pago);
            return $pago;
        });

        $total = $pagos->sum('monto');

        return view('reportes.pagos_ventas.diario_usuario', compact('pagos', 'total', 'hoy'));
    }

    public function generalAdmin(Request $request)
    {
        if (!Auth::user()->hasRole(['Admin'])) {
            abort(403, 'Solo administradores pueden acceder a este reporte.');
        }

        $fechaInicio = $request->filled('fecha_inicio')
            ? Carbon::parse($request->fecha_inicio)->startOfDay()
            : Carbon::today()->startOfDay();

        $fechaFin = $request->filled('fecha_fin')
            ? Carbon::parse($request->fecha_fin)->endOfDay()
            : Carbon::today()->endOfDay();

        if ($fechaInicio->gt($fechaFin)) {
            $tmp = $fechaInicio->copy();
            $fechaInicio = $fechaFin->copy()->startOfDay();
            $fechaFin = $tmp->copy()->endOfDay();
        }

        $pagos = Pago::with(['pagable', 'usuarios'])
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->whereHas('usuarios', function ($query) {
                $query->where('userables.userable_type', Pago::class);
            })
            ->get();

        $pagosPorUsuario = $pagos
            ->map(function ($pago) {
                $usuario = $pago->usuarios->first();
                $pago->registrado_por = $usuario;
                $pago->concepto_reporte = $this->resolverConcepto($pago);
                return $pago;
            })
            ->filter(function ($pago) {
                return !is_null($pago->registrado_por);
            })
            ->sortBy(function ($pago) {
                return mb_strtolower((string)$pago->registrado_por->name);
            })
            ->groupBy(function ($pago) {
                return $pago->registrado_por->id;
            })
            ->map(function ($pagosUsuario) {
                $usuario = $pagosUsuario->first()->registrado_por;
                return [
                    'usuario' => $usuario,
                    'pagos' => $pagosUsuario->sortBy('created_at')->values(),
                    'subtotal' => $pagosUsuario->sum('monto'),
                ];
            })
            ->values();

        $totalGeneral = $pagosPorUsuario->sum('subtotal');

        return view('reportes.pagos_ventas.general_admin', [
            'pagosPorUsuario' => $pagosPorUsuario,
            'totalGeneral' => $totalGeneral,
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
        ]);
    }

    public function misVentasUsuario(Request $request)
    {
        $fechaInicio = $request->filled('fecha_inicio')
            ? Carbon::parse($request->fecha_inicio)->startOfDay()
            : Carbon::today()->startOfDay();

        $fechaFin = $request->filled('fecha_fin')
            ? Carbon::parse($request->fecha_fin)->endOfDay()
            : Carbon::today()->endOfDay();

        if ($fechaInicio->gt($fechaFin)) {
            $tmp = $fechaInicio->copy();
            $fechaInicio = $fechaFin->copy()->startOfDay();
            $fechaFin = $tmp->copy()->endOfDay();
        }

        $pagos = Pago::with('pagable')
            ->where('pagable_type', Venta::class)
            ->whereBetween('created_at', [$fechaInicio, $fechaFin])
            ->whereHas('usuarios', function ($query) {
                $query->where('users.id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($pago) {
                $pago->concepto_reporte = $this->resolverConcepto($pago);
                return $pago;
            });

        $total = $pagos->sum('monto');

        return view('reportes.pagos_ventas.mis_ventas_usuario', [
            'pagos' => $pagos,
            'total' => $total,
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
        ]);
    }

    private function resolverConcepto(Pago $pago)
    {
        $pagable = $pago->pagable;

        if (!$pagable) {
            return class_basename($pago->pagable_type) . " #{$pago->pagable_id}";
        }

        if ($pagable instanceof Inscripcione) {
            $persona = optional(optional($pagable->estudiante)->persona);
            $nombre = trim(($persona->nombre ?? '') . ' ' . ($persona->apellidop ?? '') . ' ' . ($persona->apellidom ?? ''));
            $base = "Inscripción #{$pagable->id}";
            return $nombre !== '' ? "{$base} - {$nombre}" : $base;
        }

        if ($pagable instanceof Matriculacion) {
            $persona = optional(optional($pagable->computacion)->persona);
            $nombre = trim(($persona->nombre ?? '') . ' ' . ($persona->apellidop ?? '') . ' ' . ($persona->apellidom ?? ''));
            $asignatura = optional($pagable->asignatura)->asignatura;
            $base = "Matriculación #{$pagable->id}";
            if ($nombre !== '') {
                $base .= " - {$nombre}";
            }
            if ($asignatura) {
                $base .= " ({$asignatura})";
            }
            return $base;
        }

        if ($pagable instanceof Venta) {
            $nombres = $pagable->detalles()
                ->with('producto:id,nombre')
                ->get()
                ->map(function ($detalle) {
                    return optional($detalle->producto)->nombre;
                })
                ->filter()
                ->unique()
                ->values();

            if ($nombres->isEmpty()) {
                return "Venta #{$pagable->id}";
            }

            return "Venta #{$pagable->id} - " . $nombres->implode(', ');
        }

        return Str::title(class_basename($pago->pagable_type)) . " #{$pago->pagable_id}";
    }
}
