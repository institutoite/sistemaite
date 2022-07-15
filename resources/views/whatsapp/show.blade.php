@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop
@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div class="float-left">
                            <span class="card-title">Mostrar Mensaje</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mensaje.index') }}">Listar Mensaje</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <th>ATRIBUTO</th>
                                <th>VALOR</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>NOMBRE</td>
                                    <td>{{$mensaje->nombre}}</td>
                                </tr>
                                <tr>
                                    <td>MENSAJE</td>
                                    <td>{{$mensaje->mensaje}}</td>
                                </tr>
                                <tr>
                                    <td>FOTO</td>
                                    <td><img src="{{URL::to('/').'/storage/'.$user->foto}}" alt="{{$user->name}}" height="250px"></td>
                                </tr>
                            </tbody>
                        </table>    
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
