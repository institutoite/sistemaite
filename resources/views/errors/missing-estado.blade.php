@extends('adminlte::page')

@section('title', 'Estado faltante')

@section('content_header')
    <div class="card">
        <div class="card-header bg-warning">
            <h3 class="card-title text-white mb-0">Estado faltante</h3>
        </div>
        <div class="card-body">
            <p class="mb-0">Se intentó usar un estado que no existe en la tabla <code>estados</code>.</p>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="callout callout-danger">
                <h5><i class="fas fa-exclamation-triangle"></i> Estado requerido</h5>
                <p class="mb-1"><span class="badge badge-danger">{{ $estado ?? 'Desconocido' }}</span></p>
                <small class="text-muted">{{ $mensaje }}</small>
            </div>

            <div class="card">
                <div class="card-body">
                    <p class="mb-2">Acción sugerida:</p>
                    <ul class="mb-0">
                        <li>Registrar el estado en la tabla <code>estados</code>.</li>
                        <li>Verificar el nombre exacto usado en el sistema.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
