@extends('layouts.app')

@section('template_title')
    {{ $observacion->name ?? 'Show Observacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Observacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('observacions.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Objetivo:</strong>
                            {{ $observacion->Objetivo }}
                        </div>
                        <div class="form-group">
                            <strong>Activo:</strong>
                            {{ $observacion->activo }}
                        </div>
                        <div class="form-group">
                            <strong>Inscripcione Id:</strong>
                            {{ $observacion->inscripcione_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
