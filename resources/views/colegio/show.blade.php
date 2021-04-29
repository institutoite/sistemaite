@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Colegio Crear')

@section('content_header')
    <h1 class="text-center text-primary">Colegios</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Mostrar Colegio</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('colegios.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $colegio->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Rue:</strong>
                            {{ $colegio->rue }}
                        </div>
                        <div class="form-group">
                            <strong>Director:</strong>
                            {{ $colegio->director }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $colegio->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $colegio->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Celular:</strong>
                            {{ $colegio->celular }}
                        </div>
                        <div class="form-group">
                            <strong>Dependencia:</strong>
                            {{ $colegio->dependencia }}
                        </div>
                        <div class="form-group">
                            <strong>Nivel:</strong>
                            {{ $colegio->nivel }}
                        </div>
                        <div class="form-group">
                            <strong>Turno:</strong>
                            {{ $colegio->turno }}
                        </div>
                        <div class="form-group">
                            <strong>Departamento:</strong>
                            {{ $departamento->departamento }}
                        </div>
                        <div class="form-group">
                            <strong>Provincia:</strong>
                            {{ $provincia->provincia }}
                        </div>
                        <div class="form-group">
                            <strong>Municipio:</strong>
                            {{ $municipio->municipio }}
                        </div>
                        <div class="form-group">
                            <strong>Distrito:</strong>
                            {{ $colegio->distrito }}
                        </div>
                        <div class="form-group">
                            <strong>Areageografica:</strong>
                            {{ $colegio->areageografica }}
                        </div>
                        <div class="form-group">
                            <strong>Coordenadax:</strong>
                            {{ $colegio->coordenadax }}
                        </div>
                        <div class="form-group">
                            <strong>Coordenaday:</strong>
                            {{ $colegio->coordenaday }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
