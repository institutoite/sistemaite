<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de pagos por usuario</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #1f2937; }
        h1 { margin: 0 0 8px 0; font-size: 20px; }
        .meta { margin-bottom: 4px; color: #374151; font-size: 13px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #d1d5db; padding: 6px; vertical-align: top; }
        th { background: #e5e7eb; text-align: left; font-size: 12px; }
        .row-qr { background-color: rgba(55, 95, 122, 0.20); }
        .text-right { text-align: right; }
        .totals td { font-weight: bold; background: #f3f4f6; }
        .number { font-size: 13px; font-weight: 700; }
    </style>
</head>
<body>
    <h1>Reporte de pagos por usuario</h1>
    <div class="meta">Usuario: {{ $usuario->name }}</div>
    <div class="meta">Fecha del reporte: {{ $fechaReporte->format('d/m/Y') }}</div>
    <div class="meta">Dia: {{ $diaReporte }}</div>
    <div class="meta">Periodo consultado: {{ $fechaInicio->format('d/m/Y') }} - {{ $fechaFin->format('d/m/Y') }}</div>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Fecha/Hora</th>
            <th>Concepto</th>
            <th>Forma</th>
            <th>Monto</th>
            <th>Pago con</th>
            <th>Cambio</th>
        </tr>
        </thead>
        <tbody>
        @forelse($pagos as $pago)
            <tr class="{{ $pago->forma_pago_normalizada === 'QR' ? 'row-qr' : '' }}">
                <td>{{ $pago->id }}</td>
                <td>{{ optional($pago->created_at)->format('d/m/Y H:i') }}</td>
                <td>{{ $pago->concepto_reporte }}</td>
                <td>{{ $pago->forma_pago_normalizada }}</td>
                <td class="text-right number">{{ number_format((float)$pago->monto, 2) }}</td>
                <td class="text-right number">{{ number_format((float)$pago->pagocon, 2) }}</td>
                <td class="text-right number">{{ number_format((float)$pago->cambio, 2) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No hay pagos registrados para este usuario en el rango seleccionado.</td>
            </tr>
        @endforelse
        </tbody>
        <tfoot>
        <tr class="totals">
            <td colspan="4" class="text-right">Subtotal QR</td>
            <td class="text-right number">{{ number_format((float)$subtotalQr, 2) }}</td>
            <td colspan="2"></td>
        </tr>
        <tr class="totals">
            <td colspan="4" class="text-right">Subtotal Efectivo</td>
            <td class="text-right number">{{ number_format((float)$subtotalEfectivo, 2) }}</td>
            <td colspan="2"></td>
        </tr>
        <tr class="totals">
            <td colspan="4" class="text-right">Total general usuario</td>
            <td class="text-right number">{{ number_format((float)$total, 2) }}</td>
            <td colspan="2"></td>
        </tr>
        </tfoot>
    </table>
</body>
</html>
