@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Nivel Ver')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="float-left">
                            <span class="card-title">Mostrar Nivel</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('nivels.index') }}"> Atras</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nivel:</strong>
                            {{ $nivel->nivel }}
                        </div>
                        <div class="form-group">
                            <strong>Creado:</strong>
                            {{ $nivel->created_at }}
                        </div>
                        <div class="form-group">
                            <strong>Actualizado:</strong>
                            {{ $nivel->updated_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
