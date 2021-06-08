@extends('layouts.app')

@section('template_title')
    {{ $licencia->name ?? 'Show Licencia' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Licencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('licencias.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Motivo:</strong>
                            {{ $licencia->motivo }}
                        </div>
                        <div class="form-group">
                            <strong>Solicitante:</strong>
                            {{ $licencia->solicitante }}
                        </div>
                        <div class="form-group">
                            <strong>Parentesco:</strong>
                            {{ $licencia->parentesco }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
