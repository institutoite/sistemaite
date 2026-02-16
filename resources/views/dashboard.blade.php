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
@endsection
