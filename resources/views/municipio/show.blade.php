@extends('layouts.app')

@section('template_title')
    {{ $municipio->name ?? 'Show Municipio' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Municipio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('municipios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $municipio->municipio }}
                        </div>
                        <div class="form-group">
                            <strong>Provincia Id:</strong>
                            {{ $municipio->provincia_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
