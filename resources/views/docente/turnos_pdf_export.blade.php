@php
$colorPrimario = 'rgb(38,186,165)';
$colorSecundario = 'rgb(55,95,122)';
$grisSuave = '#f5f6fa';
@endphp
@if(isset($pdf) && $pdf)
    <style>
        body { font-family: DejaVu Sans, Arial, Helvetica, sans-serif; }
        .header {
            display: flex;
            align-items: center;
            border-bottom: 2px solid {{ $colorSecundario }};
            margin-bottom: 18px;
            padding-bottom: 8px;
        }
        .header img {
            height: 48px;
            margin-right: 18px;
        }
        .header-title {
            color: {{ $colorSecundario }};
            font-size: 1.5em;
            font-weight: bold;
            letter-spacing: 1px;
        }
        h4 {
            color: {{ $colorPrimario }};
            margin: 0 0 10px 0;
        }
        h5 {
            color: {{ $colorSecundario }};
            margin: 10px 0 5px 0;
        }
        table { border-collapse: collapse; width: 100%; font-size: 12px; background: #fff; }
        th, td { border: 1px solid #bfc5c9; padding: 4px 8px; text-align: left; }
        th { background: {{ $colorPrimario }}; color: #fff; }
        tr:nth-child(even) { background: {{ $grisSuave }}; }
        .check { color: {{ $colorPrimario }}; font-weight: bold; font-family: DejaVu Sans, sans-serif; }
        .cross { color: #000; font-weight: bold; font-family: DejaVu Sans, sans-serif; }
        .docente-block { margin-bottom: 24px; }
        .horarios-list { margin: 0; padding: 0; list-style: none; }
        .horarios-list li { margin: 0 0 2px 0; padding: 0; }
    </style>
@endif
<div>
    <div class="header">
        <img src="{{ public_path('imagenes/logo.png') }}" alt="Logo">
        <span class="header-title">Lista de Docentes Activos con Turnos</span>
    </div>
    @forelse($docentes as $docente)
        <div class="docente-block">
            <h5>{{ $docente->persona->nombre ?? '' }} {{ $docente->persona->apellidop ?? '' }} {{ $docente->persona->apellidom ?? '' }}</h5>
            <table>
                <thead>
                    <tr>
                        <th style="width: 30%">Día</th>
                        <th>Horarios</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $dias = [
                            1 => 'Lunes', 2 => 'Martes', 3 => 'Miércoles', 4 => 'Jueves', 5 => 'Viernes', 6 => 'Sábado', 7 => 'Domingo'
                        ]; 
                    @endphp
                    @foreach($dias as $diaId => $diaNombre)
                        <tr>
                            <td>{{ $diaNombre }}</td>
                            <td>
                                @php
                                    $turnosDia = $docente->turnos->where('dia_id', $diaId);
                                @endphp
                                @if($turnosDia->count())
                                    <ul class="horarios-list">
                                    @foreach($turnosDia as $turno)
                                        <li><span class="check">&#10003;</span> {{ $turno->hora_inicio }} - {{ $turno->hora_fin }}</li>
                                    @endforeach
                                    </ul>
                                @else
                                    <span class="cross">&#10007; Sin turnos</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @empty
        <div style="color:#000;">No hay docentes habilitados con turnos registrados.</div>
    @endforelse
</div>
