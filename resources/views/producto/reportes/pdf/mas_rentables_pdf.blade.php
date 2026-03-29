<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos mas rentables</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #222; }
        h2 { margin: 0 0 8px 0; }
        .meta { margin-bottom: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 6px; text-align: left; }
        th { background: #f0f0f0; }
        .negativo { color: #b71c1c; font-weight: bold; }
        .positivo { color: #1b5e20; font-weight: bold; }
    </style>
</head>
<body>
    <h2>Reporte de productos mas rentables</h2>
    <div class="meta">Rango: {{ $fechaInicio->format('d/m/Y') }} - {{ $fechaFin->format('d/m/Y') }}</div>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Precio</th>
                <th>Costo</th>
                <th>Ganancia unitaria</th>
                <th>Cantidad</th>
                <th>Ingreso total</th>
                <th>Costo total</th>
                <th>Utilidad total</th>
                <th>Margen %</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $p)
                <tr>
                    <td>{{ $p->nombre }}</td>
                    <td>{{ number_format((float)$p->precio, 2) }}</td>
                    <td>{{ number_format((float)$p->costo, 2) }}</td>
                    <td>{{ number_format((float)$p->ganancia_unitaria, 2) }}</td>
                    <td>{{ number_format((float)$p->cantidad_total, 0) }}</td>
                    <td>{{ number_format((float)$p->ingreso_total, 2) }}</td>
                    <td>{{ number_format((float)$p->costo_total, 2) }}</td>
                    <td class="{{ (float)$p->utilidad_total < 0 ? 'negativo' : 'positivo' }}">{{ number_format((float)$p->utilidad_total, 2) }}</td>
                    <td>{{ number_format((float)$p->margen_porcentual, 2) }}%</td>
                </tr>
            @empty
                <tr>
                    <td colspan="9">Sin datos en el rango seleccionado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
