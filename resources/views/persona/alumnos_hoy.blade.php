@extends('adminlte::page')

@section('title', 'Alumnos de hoy')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-0">Alumnos de hoy</h1>
        <span class="text-muted">{{ \Carbon\Carbon::parse($hoy)->isoFormat('dddd D [de] MMMM [de] YYYY') }}</span>
    </div>
@stop

@section('content')
    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">Total del d&iacute;a</div>
                    <h3 class="mb-0">{{ $alumnos->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">Nivelaci&oacute;n</div>
                    <h3 class="mb-0">{{ $programaciones->count() }}</h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted">Computaci&oacute;n</div>
                    <h3 class="mb-0">{{ $programacionesCom->count() }}</h3>
                </div>
            </div>
        </div>
    </div>

    @if($alumnos->isEmpty())
        <div class="card">
            <div class="card-body">
                <div class="alert alert-info mb-0">
                    No tienes alumnos programados para hoy.
                </div>
            </div>
        </div>
    @endif

    @if($programaciones->isNotEmpty())
        <div class="card">
            <div class="card-header bg-primary">
                Programaci&oacute;n de Nivelaci&oacute;n
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Horario</th>
                            <th>Aula</th>
                            <th>Materia</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($programaciones as $index => $alumno)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $alumno['nombre'] !== '' ? $alumno['nombre'] : 'Sin nombre' }}</td>
                                <td>{{ $alumno['hora_inicio'] }} - {{ $alumno['hora_fin'] }}</td>
                                <td>{{ $alumno['aula'] }}</td>
                                <td>{{ $alumno['detalle'] }}</td>
                                <td>
                                    <span class="badge badge-{{ $alumno['estado_badge'] }}">{{ $alumno['estado_label'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    @if($programacionesCom->isNotEmpty())
        <div class="card">
            <div class="card-header bg-info">
                Programaci&oacute;n de Computaci&oacute;n
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>#</th>
                            <th>Alumno</th>
                            <th>Horario</th>
                            <th>Aula</th>
                            <th>Asignatura</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($programacionesCom as $index => $alumno)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $alumno['nombre'] !== '' ? $alumno['nombre'] : 'Sin nombre' }}</td>
                                <td>{{ $alumno['hora_inicio'] }} - {{ $alumno['hora_fin'] }}</td>
                                <td>{{ $alumno['aula'] }}</td>
                                <td>{{ $alumno['detalle'] }}</td>
                                <td>
                                    <span class="badge badge-{{ $alumno['estado_badge'] }}">{{ $alumno['estado_label'] }}</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@stop
