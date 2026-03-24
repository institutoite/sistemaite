<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Estudiante</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #111827; }
        .header { border-bottom: 2px solid #0f766e; margin-bottom: 12px; padding-bottom: 8px; }
        .title { font-size: 17px; font-weight: bold; color: #0f766e; }
        .subtitle { font-size: 11px; color: #4b5563; }
        .grid { width: 100%; border-collapse: collapse; margin-bottom: 12px; }
        .grid th, .grid td { border: 1px solid #d1d5db; padding: 5px; }
        .grid th { background: #ecfeff; text-align: left; }
        .kpi { width: 100%; border-collapse: collapse; margin-bottom: 12px; }
        .kpi td { border: 1px solid #d1d5db; padding: 6px; }
        .kpi-label { font-size: 10px; color: #6b7280; }
        .kpi-value { font-size: 14px; font-weight: bold; }
        .section { margin-top: 10px; margin-bottom: 6px; font-size: 13px; font-weight: bold; color: #0f172a; }
        .muted { color: #6b7280; }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Constancia de Resumen del Estudiante</div>
        <div class="subtitle">Fecha de emision: {{ now()->format('d/m/Y H:i') }}</div>
    </div>

    <table class="grid">
        <tr>
            <th style="width: 25%;">Apoderado</th>
            <td>{{ $padrePersona->nombre }} {{ $padrePersona->apellidop }} {{ $padrePersona->apellidom }}</td>
            <th style="width: 20%;">Telefono</th>
            <td>{{ $padrePersona->telefono ?? 'N/D' }}</td>
        </tr>
        <tr>
            <th>Estudiante</th>
            <td>{{ $hijo->nombre }} {{ $hijo->apellidop }} {{ $hijo->apellidom }}</td>
            <th>Codigo</th>
            <td>#{{ $hijo->id }}</td>
        </tr>
    </table>

    <table class="kpi">
        <tr>
            <td>
                <div class="kpi-label">Asistencias</div>
                <div class="kpi-value">{{ $resumenGlobal['asistencias'] ?? 0 }}</div>
            </td>
            <td>
                <div class="kpi-label">Faltas</div>
                <div class="kpi-value">{{ $resumenGlobal['faltas'] ?? 0 }}</div>
            </td>
            <td>
                <div class="kpi-label">Licencias</div>
                <div class="kpi-value">{{ $resumenGlobal['licencias'] ?? 0 }}</div>
            </td>
            <td>
                <div class="kpi-label">Pagado / Saldo</div>
                <div class="kpi-value">Bs {{ number_format($resumenGlobal['total_pagado'] ?? 0, 2) }}</div>
                <div class="muted">Saldo: Bs {{ number_format($resumenGlobal['total_saldo'] ?? 0, 2) }}</div>
            </td>
        </tr>
    </table>

    <div class="section">Inscripciones</div>
    <table class="grid">
        <thead>
            <tr>
                <th>ID</th>
                <th>Modalidad</th>
                <th>Estado</th>
                <th>Asistencias</th>
                <th>Faltas</th>
                <th>Licencias</th>
                <th>Programadas</th>
                <th>Pasadas</th>
                <th>Total pagado</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @forelse($inscripciones as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['modalidad'] ?? 'N/D' }}</td>
                    <td>{{ $item['estado'] ?? 'N/D' }}</td>
                    <td>{{ $item['asistencias'] }}</td>
                    <td>{{ $item['faltas'] }}</td>
                    <td>{{ $item['licencias'] }}</td>
                    <td>{{ $item['clases_programadas'] }}</td>
                    <td>{{ $item['clases_pasadas'] }}</td>
                    <td>Bs {{ number_format($item['total_pagado'], 2) }}</td>
                    <td>Bs {{ number_format($item['saldo'], 2) }}</td>
                </tr>
            @empty
                <tr><td colspan="10" class="muted">Sin inscripciones registradas.</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="section">Matriculaciones</div>
    <table class="grid">
        <thead>
            <tr>
                <th>ID</th>
                <th>Asignatura</th>
                <th>Estado</th>
                <th>Asistencias</th>
                <th>Faltas</th>
                <th>Licencias</th>
                <th>Programadas</th>
                <th>Pasadas</th>
                <th>Total pagado</th>
                <th>Saldo</th>
            </tr>
        </thead>
        <tbody>
            @forelse($matriculaciones as $item)
                <tr>
                    <td>{{ $item['id'] }}</td>
                    <td>{{ $item['asignatura'] ?? 'N/D' }}</td>
                    <td>{{ $item['estado'] ?? 'N/D' }}</td>
                    <td>{{ $item['asistencias'] }}</td>
                    <td>{{ $item['faltas'] }}</td>
                    <td>{{ $item['licencias'] }}</td>
                    <td>{{ $item['clases_programadas'] }}</td>
                    <td>{{ $item['clases_pasadas'] }}</td>
                    <td>Bs {{ number_format($item['total_pagado'], 2) }}</td>
                    <td>Bs {{ number_format($item['saldo'], 2) }}</td>
                </tr>
            @empty
                <tr><td colspan="10" class="muted">Sin matriculaciones registradas.</td></tr>
            @endforelse
        </tbody>
    </table>

    <p class="muted">Documento generado desde el panel privado de padres con validacion backend de la relacion padre-hijo.</p>
</body>
</html>
