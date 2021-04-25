@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop
@section('title', 'Provincias Mostrar')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="float-left">
                            <span class="card-title">Provincia: {{$provincia->provincia}}</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('provincias.index') }}"> Atrás</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Provincia:</strong>
                            {{ $provincia->provincia }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $provincia->departamento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
