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

    @foreach($inscripciones as $item)
        <div class="section">Detalle Inscripcion #{{ $item['id'] }} {{ $item['modalidad'] ? '- '.$item['modalidad'] : '' }}</div>
        <table class="grid">
            <thead>
                <tr>
                    <th>Fecha-Dia</th>
                    <th>Horario</th>
                    <th>Docente/Aula</th>
                    <th>Estado</th>
                    <th>Materia</th>
                </tr>
            </thead>
            <tbody>
                @forelse($item['historial'] as $h)
                    @php
                        $fechaHist = $h['fecha'] ? \Carbon\Carbon::parse($h['fecha']) : null;
                        $fechaDia = $fechaHist ? ucfirst($fechaHist->locale('es')->isoFormat('D-M-YYYY-dddd')) : 'N/D';
                        $horaIni = $h['hora_inicio'] ? \Carbon\Carbon::parse($h['hora_inicio'])->format('H:i') : 'N/D';
                        $horaFin = $h['hora_fin'] ? \Carbon\Carbon::parse($h['hora_fin'])->format('H:i') : 'N/D';
                    @endphp
                    <tr>
                        <td>{{ $fechaDia }}</td>
                        <td>{{ $horaIni }}-{{ $horaFin }}</td>
                        <td>{{ $h['docente'] ?? 'N/D' }}/{{ $h['aula'] ?? 'N/D' }}</td>
                        <td>{{ $h['estado'] ?? 'N/D' }}</td>
                        <td>{{ $h['materia'] ?? 'N/D' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="muted">Sin historial.</td></tr>
                @endforelse
            </tbody>
        </table>

        <table class="grid">
            <thead>
                <tr>
                    <th>Dia</th>
                    <th>Horario</th>
                    <th>Materia</th>
                    <th>Docente/Aula</th>
                </tr>
            </thead>
            <tbody>
                @forelse($item['planificacion'] as $plan)
                    @php
                        $horaPlanIni = $plan->horainicio ? \Carbon\Carbon::parse($plan->horainicio)->format('H:i') : 'N/D';
                        $horaPlanFin = $plan->horafin ? \Carbon\Carbon::parse($plan->horafin)->format('H:i') : 'N/D';
                    @endphp
                    <tr>
                        <td>{{ $plan->dia ?? 'N/D' }}</td>
                        <td>{{ $horaPlanIni }}-{{ $horaPlanFin }}</td>
                        <td>{{ $plan->materia ?? 'N/D' }}</td>
                        <td>{{ $plan->nombrecorto ?? trim(($plan->docente_nombre ?? '').' '.($plan->docente_apellidop ?? '')) }}/{{ $plan->aula ?? 'N/D' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="muted">Sin sesiones u horario planificado.</td></tr>
                @endforelse
            </tbody>
        </table>
    @endforeach

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

    @foreach($matriculaciones as $item)
        <div class="section">Detalle Matriculacion #{{ $item['id'] }} {{ $item['asignatura'] ? '- '.$item['asignatura'] : '' }}</div>
        <table class="grid">
            <thead>
                <tr>
                    <th>Fecha-Dia</th>
                    <th>Horario</th>
                    <th>Docente/Aula</th>
                    <th>Estado</th>
                    <th>Asignatura</th>
                </tr>
            </thead>
            <tbody>
                @forelse($item['historial'] as $h)
                    @php
                        $fechaHistCom = $h['fecha'] ? \Carbon\Carbon::parse($h['fecha']) : null;
                        $fechaDiaCom = $fechaHistCom ? ucfirst($fechaHistCom->locale('es')->isoFormat('D-M-YYYY-dddd')) : 'N/D';
                        $horaIniCom = $h['hora_inicio'] ? \Carbon\Carbon::parse($h['hora_inicio'])->format('H:i') : 'N/D';
                        $horaFinCom = $h['hora_fin'] ? \Carbon\Carbon::parse($h['hora_fin'])->format('H:i') : 'N/D';
                    @endphp
                    <tr>
                        <td>{{ $fechaDiaCom }}</td>
                        <td>{{ $horaIniCom }}-{{ $horaFinCom }}</td>
                        <td>{{ $h['docente'] ?? 'N/D' }}/{{ $h['aula'] ?? 'N/D' }}</td>
                        <td>{{ $h['estado'] ?? 'N/D' }}</td>
                        <td>{{ $item['asignatura'] ?? 'N/D' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="muted">Sin historial.</td></tr>
                @endforelse
            </tbody>
        </table>

        <table class="grid">
            <thead>
                <tr>
                    <th>Dia</th>
                    <th>Horario</th>
                    <th>Docente/Aula</th>
                </tr>
            </thead>
            <tbody>
                @forelse($item['planificacion'] as $plan)
                    @php
                        $horaPlanComIni = $plan->horainicio ? \Carbon\Carbon::parse($plan->horainicio)->format('H:i') : 'N/D';
                        $horaPlanComFin = $plan->horafin ? \Carbon\Carbon::parse($plan->horafin)->format('H:i') : 'N/D';
                    @endphp
                    <tr>
                        <td>{{ $plan->dia ?? 'N/D' }}</td>
                        <td>{{ $horaPlanComIni }}-{{ $horaPlanComFin }}</td>
                        <td>{{ $plan->nombrecorto ?? trim(($plan->docente_nombre ?? '').' '.($plan->docente_apellidop ?? '')) }}/{{ $plan->aula ?? 'N/D' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="muted">Sin sesiones u horario planificado.</td></tr>
                @endforelse
            </tbody>
        </table>
    @endforeach

    <p class="muted">Documento generado desde el panel privado de padres con validacion backend de la relacion padre-hijo.</p>
</body>
</html>
