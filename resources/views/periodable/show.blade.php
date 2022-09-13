@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Mostrar Asignatura')


@section('content_header')
    <h1 class="text-center text-primary">Mostrar Asignatura</h1>
@stop

@section('content')
        <div class="card">
            <div class="card-header bg-primary">
                Mostrar Estado <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('como.index')}}">Listar Como se entero</a>
            </div>
            <div class="card-body">
                <table class="table table-light table-striped table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>ATRIBUTO</th>
                            <th>VALOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td>{{$como->id}}</td>
                        </tr>
                        <tr>
                            <td>Como</td>
                            <td>{{$como->como}}</td>
                        </tr>
                        <tr>
                            <td>CREADO</td>
                            <td>{{$como->created_at}}</td>
                        </tr>
                        <tr>
                            <td>ACTUALIZADO</td>
                            <td>{{$como->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
@stop

@section('js')

@stop