@extends('layouts.app')

@section('template_title')
    {{ $feriado->name ?? 'Show Feriado' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Feriado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('feriados.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $feriado->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Festividad:</strong>
                            {{ $feriado->festividad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
