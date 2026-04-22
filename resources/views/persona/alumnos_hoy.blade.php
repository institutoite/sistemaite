@extends('adminlte::page')

@section('title', 'Alumnos de hoy')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Alumnos de hoy</h1>
        <span class="text-muted">{{ \Carbon\Carbon::parse($hoy)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</span>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Programaciones del dia (presentes y pendientes)
        </div>
        <div class="card-body">
            @if($alumnos->isEmpty())
                <div class="alert alert-info mb-0">
                    No tienes alumnos programados para hoy.
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="bg-light">
                            <tr>
                                <th>#</th>
                                <th>Alumno</th>
                                <th>Tipo</th>
                                <th>Horario</th>
                                <th>Aula</th>
                                <th>Detalle</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumnos as $index => $alumno)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $alumno['nombre'] !== '' ? $alumno['nombre'] : 'Sin nombre' }}</td>
                                    <td>{{ $alumno['tipo'] }}</td>
                                    <td>{{ $alumno['hora_inicio'] }} - {{ $alumno['hora_fin'] }}</td>
                                    <td>{{ $alumno['aula'] }}</td>
                                    <td>{{ $alumno['detalle'] }}</td>
                                    <td>
                                        @if($alumno['presente'])
                                            <span class="badge badge-success">Presente</span>
                                        @else
                                            <span class="badge badge-warning">Pendiente / No llego</span>
                                        @endif
                                        <div class="small text-muted mt-1">{{ $alumno['estado_programacion'] }}</div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@stop
