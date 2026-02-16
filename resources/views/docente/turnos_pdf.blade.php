@extends('adminlte::page')
@section('title', 'Reporte de Turnos de Docentes Habilitados')
@section('content')
<div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header" style="background: rgb(38,186,165); color: #fff; display: flex; justify-content: space-between; align-items: center;">
            <h4 class="mb-0">Turnos de Docentes Habilitados</h4>
            @if(!request('download'))
                <a href="{{ route('docentes.turnos.pdf', ['download' => 1]) }}" class="btn" style="background: rgb(55,95,122); color: #fff; font-weight: 600; margin-left: auto;" target="_blank">
                    <i class="fas fa-file-pdf"></i> Descargar PDF
                </a>
            @endif
        </div>
        <div class="card-body">
            <div>
                <div class="header d-flex align-items-center mb-3" style="border-bottom: 2px solid rgb(55,95,122);">
                    <img src="{{ asset('imagenes/logo.png') }}" alt="Logo" style="height: 48px; margin-right: 18px;">
                    <span class="header-title" style="color: rgb(55,95,122); font-size: 1.5em; font-weight: bold; letter-spacing: 1px;">Lista de Docentes Activos con Turnos</span>
                </div>
                @forelse($docentes as $docente)
                    <div class="docente-block mb-4">
                        <h5 style="color: rgb(55,95,122);">{{ $docente->persona->nombre ?? '' }} {{ $docente->persona->apellidop ?? '' }} {{ $docente->persona->apellidom ?? '' }}</h5>
                        <div class="table-responsive">
                        <table class="table table-bordered table-striped" style="background: #fff;">
                            <thead>
                                <tr>
                                    <th style="width: 30%; background: rgb(38,186,165); color: #fff;">Día</th>
                                    <th style="background: rgb(38,186,165); color: #fff;">Horarios</th>
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
                                                <ul class="list-unstyled mb-0">
                                                @foreach($turnosDia as $turno)
                                                    <li><span class="text-success fw-bold">&#10003;</span> {{ $turno->hora_inicio }} - {{ $turno->hora_fin }}</li>
                                                @endforeach
                                                </ul>
                                            @else
                                                <span class="text-dark fw-bold">&#10007; Sin turnos</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                @empty
                    <div style="color:#000;">No hay docentes habilitados con turnos registrados.</div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
