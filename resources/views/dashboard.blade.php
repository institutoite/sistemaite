@extends('adminlte::page')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="mb-3" style="color: rgb(55,95,122); font-weight: bold;">Panel de Control</h2>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 col-md-6 mb-2">
            <div class="card shadow h-100" style="border-left: 5px solid rgb(55,95,122);">
                <div class="card-body">
                    <h6 class="text-uppercase" style="color: rgb(38,186,165);">Docentes Habilitados</h6>
                    <h3 class="fw-bold" style="color: rgb(55,95,122);">{{ $docentesHabilitados ?? 0 }}</h3>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-2">
            <div class="card shadow h-100" style="border-left: 5px solid rgb(38,186,165);">
                <div class="card-body">
                    <h6 class="text-uppercase" style="color: rgb(55,95,122);">Top 5 Docentes por Alumnos Atendidos</h6>
                    <ol class="mb-0" style="padding-left: 1.2em;">
                        @foreach($rankingDocentes as $docente)
                            <li><strong>{{ $docente->persona->nombre ?? $docente->nombre }}</strong> <span class="text-muted">({{ $docente->alumnos_atendidos ?? 0 }} alumnos)</span></li>
                        @endforeach
                    </ol>
                    <hr>
                    <h6 class="text-uppercase mt-3" style="color: rgb(38,186,165);">Top 5 Docentes Computación</h6>
                    <ol class="mb-0" style="padding-left: 1.2em;">
                        @foreach($rankingDocentesComputacion as $docente)
                            <li><strong>{{ $docente->persona->nombre ?? $docente->nombre }}</strong> <span class="text-muted">({{ $docente->alumnos_computacion ?? 0 }} alumnos)</span></li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs mb-4" id="dashboardTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="tab-dia" data-toggle="tab" href="#tab-dia-pane" role="tab">Diario</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-semana" data-toggle="tab" href="#tab-semana-pane" role="tab">Semanal</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-mes" data-toggle="tab" href="#tab-mes-pane" role="tab">Mensual</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-anio" data-toggle="tab" href="#tab-anio-pane" role="tab">Anual</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="tab-historico" data-toggle="tab" href="#tab-historico-pane" role="tab">Histórico</a>
        </li>
    </ul>
    <div class="tab-content" id="dashboardTabsContent">
        @foreach(['dia','semana','mes','anio','historico'] as $periodo)
        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-{{ $periodo }}-pane" role="tabpanel">
            <div class="row" id="dashboard-metrics-{{ $periodo }}">
                <div class="col-md-3 mb-4">
                    <div class="card shadow h-100" style="border-left: 5px solid rgb(38,186,165);">
                        <div class="card-body">
                            <h6 class="text-uppercase" style="color: rgb(55,95,122);">Clases Pasadas</h6>
                            <h3 class="fw-bold" style="color: rgb(38,186,165);">{{ $clasesPasadas[$periodo] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card shadow h-100" style="border-left: 5px solid rgb(38,186,165);">
                        <div class="card-body">
                            <h6 class="text-uppercase" style="color: rgb(55,95,122);">Estudiantes Faltantes</h6>
                            <h3 class="fw-bold" style="color: rgb(38,186,165);">{{ $estudiantesFaltantes[$periodo] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card shadow h-100" style="border-left: 5px solid rgb(38,186,165);">
                        <div class="card-body">
                            <h6 class="text-uppercase" style="color: rgb(55,95,122);">Pagos Realizados</h6>
                            <h3 class="fw-bold" style="color: rgb(38,186,165);">{{ $pagosRealizados[$periodo] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card shadow h-100" style="border-left: 5px solid rgb(38,186,165);">
                        <div class="card-body">
                            <h6 class="text-uppercase" style="color: rgb(55,95,122);">Licencias</h6>
                            <h3 class="fw-bold" style="color: rgb(38,186,165);">{{ $licencias[$periodo] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card shadow h-100" style="border-left: 5px solid rgb(38,186,165);">
                        <div class="card-body">
                            <h6 class="text-uppercase" style="color: rgb(55,95,122);">Inscripciones</h6>
                            <h3 class="fw-bold" style="color: rgb(38,186,165);">{{ $inscripciones[$periodo] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card shadow h-100" style="border-left: 5px solid rgb(38,186,165);">
                        <div class="card-body">
                            <h6 class="text-uppercase" style="color: rgb(55,95,122);">Matriculaciones Computación</h6>
                            <h3 class="fw-bold" style="color: rgb(38,186,165);">{{ $matriculacionesComputacion[$periodo] ?? 0 }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="card shadow h-100" style="border-left: 5px solid rgb(38,186,165);">
                        <div class="card-body">
                            <h6 class="text-uppercase" style="color: rgb(55,95,122);">Dinero Ingresado Secretaría</h6>
                            <h3 class="fw-bold" style="color: rgb(38,186,165);">Bs {{ number_format($dineroSecretaria[$periodo] ?? 0, 2, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <h4 class="mb-3" style="color: rgb(55,95,122); font-weight: bold;">Métricas por Usuario Administrativo</h4>
        <ul class="nav nav-tabs mb-3" id="adminTabs" role="tablist">
            @foreach(['dia','semana','mes','anio','historico'] as $periodo)
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="admin-tab-{{ $periodo }}" data-toggle="tab" href="#admin-{{ $periodo }}" role="tab">{{ ucfirst($periodo) }}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="adminTabsContent">
            @foreach(['dia','semana','mes','anio','historico'] as $periodo)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="admin-{{ $periodo }}" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Usuario</th>
                                <th>Inscripciones</th>
                                <th>Matriculaciones</th>
                                <th>Clases</th>
                                <th>Clases Computación</th>
                                <th>Pagos</th>
                                <th>Licencias</th>
                                <th>Dinero Recaudado (Bs)</th>
                                <th>Licencias</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($usuariosAdministrativos as $usuario)
                            <tr>
                                <td><strong>{{ $usuario->name }}</strong></td>
                                <td>{{ $metricasAdministrativos[$usuario->id][$periodo]['inscripciones'] ?? 0 }}</td>
                                <td>{{ $metricasAdministrativos[$usuario->id][$periodo]['matriculaciones'] ?? 0 }}</td>
                                <td>{{ $metricasAdministrativos[$usuario->id][$periodo]['clases'] ?? 0 }}</td>
                                <td>{{ $metricasAdministrativos[$usuario->id][$periodo]['clasescom'] ?? 0 }}</td>
                                <td>{{ $metricasAdministrativos[$usuario->id][$periodo]['pagos'] ?? 0 }}</td>
                                <td>{{ $metricasAdministrativos[$usuario->id][$periodo]['licencias'] ?? 0 }}</td>
                                <td>Bs {{ number_format($metricasAdministrativos[$usuario->id][$periodo]['dinero'] ?? 0, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <h4 class="mb-3" style="color: rgb(55,95,122); font-weight: bold;">Métricas por Docente Habilitado</h4>
        <ul class="nav nav-tabs mb-3" id="docenteTabs" role="tablist">
            @foreach(['dia','semana','mes','anio','historico'] as $periodo)
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ $loop->first ? 'active' : '' }}" id="docente-tab-{{ $periodo }}" data-toggle="tab" href="#docente-{{ $periodo }}" role="tab">{{ ucfirst($periodo) }}</a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="docenteTabsContent">
            @foreach(['dia','semana','mes','anio','historico'] as $periodo)
            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="docente-{{ $periodo }}" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Docente</th>
                                <th>Clases</th>
                                <th>Clases Computación</th>
                                <th>Estudiantes Únicos</th>
                                <th>Materias Diferentes</th>
                                <th>Dinero Generado (Bs)</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($docentesHabilitadosList as $docente)
                            <tr>
                                <td><strong>{{ $docente->persona->nombre ?? $docente->nombre }}</strong></td>
                                <td>{{ $metricasDocentes[$docente->id][$periodo]['clases'] ?? 0 }}</td>
                                <td>{{ $metricasDocentes[$docente->id][$periodo]['clasescom'] ?? 0 }}</td>
                                <td>{{ $metricasDocentes[$docente->id][$periodo]['estudiantesUnicos'] ?? 0 }}</td>
                                <td>{{ $metricasDocentes[$docente->id][$periodo]['materiasDiferentes'] ?? 0 }}</td>
                                <td>Bs {{ number_format($metricasDocentes[$docente->id][$periodo]['dinero'] ?? 0, 2, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
