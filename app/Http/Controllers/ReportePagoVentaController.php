<?php

namespace App\Http\Controllers;

use App\Models\Inscripcione;
use App\Models\Matriculacion;
use App\Models\Pago;
use App\Models\User;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReportePagoVentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Listar Pagos')->only('diarioUsuario', 'diarioUsuarioPdf');
        $this->middleware('can:Listar Pagos')->only('generalAdmin', 'generalAdminPdf', 'usuarioAdminPdf');
        $this->middleware('can:ver-mis-ventas-propios')->only('misVentasUsuario');
    }

    public function diarioUsuario()
    {
        return view('reportes.pagos_ventas.diario_usuario', $this->buildDiarioUsuarioData(Carbon::today()));
    }

    public function diarioUsuarioPdf()
    {
        Carbon::setLocale('es');
        $data = $this->buildDiarioUsuarioData(Carbon::today());
        $data['usuarioNombre'] = (string) optional(Auth::user())->name;
        $data['fechaReporte'] = Carbon::now();
        $data['diaReporte'] = ucfirst(Carbon::now()->translatedFormat('l'));

        $pdf = PDF::loadView('reportes.pagos_ventas.pdf.diario_usuario_pdf', $data)
            ->setPaper('letter', 'landscape');

        return $pdf->download('reporte_pagos_usuario_' . Carbon::now()->format('Ymd_His') . '.pdf');
    }

    public function generalAdmin(Request $request)
    {
        if (!Auth::user()->hasRole(['Admin'])) {
            abort(403, 'Solo administradores pueden acceder a este reporte.');
        }

        return view('reportes.pagos_ventas.general_admin', $this->buildGeneralAdminData($request));
    }

    public function generalAdminPdf(Request $request)
    {
        if (!Auth::user()->hasRole(['Admin'])) {
            abort(403, 'Solo administradores pueden acceder a este reporte.');
        }

        $data = $this->buildGeneralAdminData($request);

        $pdf = PDF::loadView('reportes.pagos_ventas.pdf.general_admin_pdf', $data)
            ->setPaper('letter', 'landscape');

        $filename = 'reporte_general_pagos_' . $data['fechaInicio']->format('Ymd') . '_' . $data['fechaFin']->format('Ymd') . '.pdf';
        return $pdf->download($filename);
    }

    public function usuarioAdminPdf(Request $request, User $usuario)
    {
        if (!Auth::user()->hasRole(['Admin'])) {
            abort(403, 'Solo administradores pueden acceder a este reporte.');
        }

        Carbon::setLocale('es');

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
            ->whereHas('usuarios', function ($query) use ($usuario) {
                $query->where('users.id', $usuario->id)
                    ->where('userables.userable_type', Pago::class);
            })
            ->orderByDesc('created_at')
            ->get()
            ->map(function ($pago) {
                $pago->concepto_reporte = $this->resolverConcepto($pago);
                $pago->forma_pago_normalizada = $this->normalizarFormaPago($pago->forma_pago);
                return $pago;
            });

        $data = [
            'usuario' => $usuario,
            'pagos' => $pagos,
            'subtotalQr' => $pagos->where('forma_pago_normalizada', 'QR')->sum('monto'),
            'subtotalEfectivo' => $pagos->where('forma_pago_normalizada', 'EFECTIVO')->sum('monto'),
            'total' => $pagos->sum('monto'),
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
            'fechaReporte' => Carbon::now(),
            'diaReporte' => ucfirst(Carbon::now()->translatedFormat('l')),
        ];

        $pdf = PDF::loadView('reportes.pagos_ventas.pdf.usuario_admin_pdf', $data)
            ->setPaper('letter', 'landscape');

        $filename = 'reporte_pagos_' . preg_replace('/\s+/', '_', mb_strtolower($usuario->name)) . '_' . Carbon::now()->format('Ymd_His') . '.pdf';
        return $pdf->download($filename);
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
                $pago->forma_pago_normalizada = $this->normalizarFormaPago($pago->forma_pago);
                return $pago;
            });

        $total = $pagos->sum('monto');
        $subtotalQr = $pagos->where('forma_pago_normalizada', 'QR')->sum('monto');
        $subtotalEfectivo = $pagos->where('forma_pago_normalizada', 'EFECTIVO')->sum('monto');

        return view('reportes.pagos_ventas.mis_ventas_usuario', [
            'pagos' => $pagos,
            'total' => $total,
            'subtotalQr' => $subtotalQr,
            'subtotalEfectivo' => $subtotalEfectivo,
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
        ]);
    }

    private function normalizarFormaPago($formaPago)
    {
        return mb_strtoupper((string)$formaPago) === 'QR' ? 'QR' : 'EFECTIVO';
    }

    private function buildDiarioUsuarioData(Carbon $hoy)
    {
        $pagos = Pago::with('pagable')
            ->whereDate('created_at', $hoy)
            ->whereHas('usuarios', function ($query) {
                $query->where('users.id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($pago) {
                $pago->concepto_reporte = $this->resolverConcepto($pago);
                $pago->forma_pago_normalizada = $this->normalizarFormaPago($pago->forma_pago);
                return $pago;
            });

        return [
            'pagos' => $pagos,
            'total' => $pagos->sum('monto'),
            'hoy' => $hoy,
            'subtotalQr' => $pagos->where('forma_pago_normalizada', 'QR')->sum('monto'),
            'subtotalEfectivo' => $pagos->where('forma_pago_normalizada', 'EFECTIVO')->sum('monto'),
        ];
    }

    private function buildGeneralAdminData(Request $request)
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
                $pago->forma_pago_normalizada = $this->normalizarFormaPago($pago->forma_pago);
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
                    'pagos' => $pagosUsuario->sortByDesc('created_at')->values(),
                    'subtotal_qr' => $pagosUsuario->where('forma_pago_normalizada', 'QR')->sum('monto'),
                    'subtotal_efectivo' => $pagosUsuario->where('forma_pago_normalizada', 'EFECTIVO')->sum('monto'),
                    'subtotal' => $pagosUsuario->sum('monto'),
                ];
            })
            ->values();

        return [
            'pagosPorUsuario' => $pagosPorUsuario,
            'totalGeneral' => $pagosPorUsuario->sum('subtotal'),
            'totalGeneralQr' => $pagosPorUsuario->sum('subtotal_qr'),
            'totalGeneralEfectivo' => $pagosPorUsuario->sum('subtotal_efectivo'),
            'fechaInicio' => $fechaInicio,
            'fechaFin' => $fechaFin,
        ];
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
