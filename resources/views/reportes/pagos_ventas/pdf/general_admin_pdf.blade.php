<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte general de pagos</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #1f2937; }
        h1 { margin: 0 0 6px 0; font-size: 20px; }
        .meta { margin-bottom: 10px; color: #374151; font-size: 13px; }
        .user-title { margin-top: 12px; margin-bottom: 6px; font-size: 14px; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 10px; }
        th, td { border: 1px solid #d1d5db; padding: 6px; vertical-align: top; }
        th { background: #e5e7eb; text-align: left; font-size: 12px; }
        .row-qr { background-color: rgba(55, 95, 122, 0.20); }
        .text-right { text-align: right; }
        .totals td { font-weight: bold; background: #f3f4f6; }
        .global { margin-top: 12px; }
        .number { font-size: 13px; font-weight: 700; }
    </style>
</head>
<body>
    <h1>Reporte general de pagos por usuario</h1>
    <div class="meta">
        Rango: {{ $fechaInicio->format('d/m/Y') }} - {{ $fechaFin->format('d/m/Y') }}
    </div>

    @forelse($pagosPorUsuario as $grupo)
        <div class="user-title">Usuario: {{ $grupo['usuario']->name }}</div>
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
            @foreach($grupo['pagos'] as $pago)
                <tr class="{{ $pago->forma_pago_normalizada === 'QR' ? 'row-qr' : '' }}">
                    <td>{{ $pago->id }}</td>
                    <td>{{ optional($pago->created_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ $pago->concepto_reporte }}</td>
                    <td>{{ $pago->forma_pago_normalizada }}</td>
                    <td class="text-right number">{{ number_format((float)$pago->monto, 2) }}</td>
                    <td class="text-right number">{{ number_format((float)$pago->pagocon, 2) }}</td>
                    <td class="text-right number">{{ number_format((float)$pago->cambio, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr class="totals">
                <td colspan="4" class="text-right">Subtotal QR</td>
                <td class="text-right number">{{ number_format((float)$grupo['subtotal_qr'], 2) }}</td>
                <td colspan="2"></td>
            </tr>
            <tr class="totals">
                <td colspan="4" class="text-right">Subtotal Efectivo</td>
                <td class="text-right number">{{ number_format((float)$grupo['subtotal_efectivo'], 2) }}</td>
                <td colspan="2"></td>
            </tr>
            <tr class="totals">
                <td colspan="4" class="text-right">Total usuario</td>
                <td class="text-right number">{{ number_format((float)$grupo['subtotal'], 2) }}</td>
                <td colspan="2"></td>
            </tr>
            </tfoot>
        </table>
    @empty
        <p>No hay pagos registrados en el rango seleccionado.</p>
    @endforelse

    <table class="global">
        <tbody>
        <tr class="totals">
            <td class="text-right">Total absoluto QR</td>
            <td class="text-right number">{{ number_format((float)$totalGeneralQr, 2) }}</td>
        </tr>
        <tr class="totals">
            <td class="text-right">Total absoluto Efectivo</td>
            <td class="text-right number">{{ number_format((float)$totalGeneralEfectivo, 2) }}</td>
        </tr>
        <tr class="totals">
            <td class="text-right">Total absoluto general</td>
            <td class="text-right number">{{ number_format((float)$totalGeneral, 2) }}</td>
        </tr>
        </tbody>
    </table>
</body>
</html>
