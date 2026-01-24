@extends('adminlte::page')

@section('title', 'Panel de Padres')

@section('css')
    <style>
        :root {
            --primary-color: #26BAA5;
            --secondary-color: #375F7A;
        }
        .padre-hero { background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%); color: #fff; border-radius: .85rem; }
        .padre-hero small { opacity: .9; }
        .padre-stat { border-radius: .75rem; border: 1px solid #e9ecef; background: #fff; }
        .padre-stat .value { font-size: 1.4rem; font-weight: 700; color: #1f2d3d; }
        .padre-card { border: 1px solid #e9ecef; border-radius: .75rem; padding: .95rem; background: #fff; box-shadow: 0 2px 8px rgba(0,0,0,.03); }
        .padre-card + .padre-card { margin-top: .75rem; }
        .padre-card-title { font-size: 1rem; font-weight: 700; color: #1f2d3d; }
        .padre-card-meta { font-size: .82rem; color: #6c757d; }
        .padre-chip { font-size: .75rem; padding: .2rem .5rem; border-radius: 999px; }
        .padre-actions .btn { border-radius: .5rem; }
        .padre-chip-primary { background: var(--primary-color); color: #fff; }
        .padre-chip-secondary { background: var(--secondary-color); color: #fff; }
        .btn-primary { background-color: var(--primary-color); border-color: var(--primary-color); }
        .btn-secondary { background-color: var(--secondary-color); border-color: var(--secondary-color); }
        .btn-outline-primary { color: var(--primary-color); border-color: var(--primary-color); }
        .btn-outline-primary:hover { background-color: var(--primary-color); color: #fff; }
        .btn-outline-secondary { color: var(--secondary-color); border-color: var(--secondary-color); }
        .btn-outline-secondary:hover { background-color: var(--secondary-color); color: #fff; }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <div class="padre-hero p-3 p-md-4 mb-3">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between">
                <div>
                    <h4 class="mb-1">Panel de Padres</h4>
                    <small>Consulta rápida de hijos, inscripciones y matriculaciones.</small>
                </div>
                <span class="badge mt-2 mt-md-0" style="background: #375F7A; color: #fff;"><i class="fas fa-eye mr-1"></i>Vista solo lectura</span>
            </div>
        </div>

        @php
            $totalHijos = $hijos->count();
            $totalInscripciones = $hijos->sum(function($h){ return optional($h->estudiante)->inscripciones->count() ?? 0; });
            $totalMatriculaciones = $hijos->sum(function($h){ return optional($h->computacion)->matriculaciones->count() ?? 0; });
        @endphp
        <div class="row mb-3">
            <div class="col-12 col-md-4 mb-2 mb-md-0">
                <div class="padre-stat p-3 h-100">
                    <div class="text-muted">Hijos</div>
                    <div class="value">{{$totalHijos}}</div>
                </div>
            </div>
            <div class="col-12 col-md-4 mb-2 mb-md-0">
                <div class="padre-stat p-3 h-100">
                    <div class="text-muted">Inscripciones</div>
                    <div class="value">{{$totalInscripciones}}</div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="padre-stat p-3 h-100">
                    <div class="text-muted">Matriculaciones</div>
                    <div class="value">{{$totalMatriculaciones}}</div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header text-white" style="background: #26BAA5;">
                Mis hijos
            </div>
            <div class="card-body">
                @if($hijos->isEmpty())
                    <p class="text-muted mb-0">No se encontraron hijos asociados.</p>
                @else
                    <div class="d-block d-md-none">
                        @foreach ($hijos as $hijo)
                            <div class="padre-card">
                                <div class="padre-card-title">{{ $hijo->nombre }} {{ $hijo->apellidop }} {{ $hijo->apellidom }}</div>
                                <div class="padre-card-meta mt-1">Teléfono: {{ $hijo->telefono ?? 'Sin teléfono' }}</div>
                                <div class="mt-2 d-flex align-items-center flex-wrap">
                                    <span class="padre-chip padre-chip-primary mr-2">Inscripciones: {{ optional($hijo->estudiante)->inscripciones->count() ?? 0 }}</span>
                                    <span class="padre-chip padre-chip-secondary">Matriculaciones: {{ optional($hijo->computacion)->matriculaciones->count() ?? 0 }}</span>
                                </div>
                                <div class="mt-3 padre-actions">
                                    @if($hijo->estudiante)
                                        <a class="btn btn-sm btn-outline-primary mr-1" href="{{ route('tus.inscripciones', $hijo->estudiante) }}">
                                            Ver inscripciones
                                        </a>
                                        <a class="btn btn-sm btn-outline-secondary" href="{{ route('matriculaciones.de.estudiante', ['estudiante_id' => $hijo->estudiante->id]) }}">
                                            Ver matriculaciones
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="table-responsive d-none d-md-block">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th>Hijo</th>
                                    <th>Teléfono</th>
                                    <th>Inscripciones</th>
                                    <th>Matriculaciones</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($hijos as $hijo)
                                    <tr>
                                        <td>{{ $hijo->nombre }} {{ $hijo->apellidop }} {{ $hijo->apellidom }}</td>
                                        <td>{{ $hijo->telefono ?? 'Sin teléfono' }}</td>
                                        <td>{{ optional($hijo->estudiante)->inscripciones->count() ?? 0 }}</td>
                                        <td>{{ optional($hijo->computacion)->matriculaciones->count() ?? 0 }}</td>
                                        <td class="padre-actions">
                                            @if($hijo->estudiante)
                                                <a class="btn btn-sm btn-primary" href="{{ route('tus.inscripciones', $hijo->estudiante) }}">
                                                    Ver inscripciones
                                                </a>
                                            @endif
                                            @if($hijo->estudiante)
                                                <a class="btn btn-sm btn-secondary" href="{{ route('matriculaciones.de.estudiante', ['estudiante_id' => $hijo->estudiante->id]) }}">
                                                    Ver matriculaciones
                                                </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-muted mb-0">Desde las inscripciones podrás ver asistencias, pagos, faltas y próximos pagos.</p>
                @endif
            </div>
        </div>
    </div>
@stop
