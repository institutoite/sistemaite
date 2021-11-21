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
                Mostrar Asignatura <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('carrera.index')}}">Listar Asignaturas</a>
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
                            <td>{{$carrera->id}}</td>
                        </tr>
                        <tr>
                            <td>CARRERA</td>
                            <td>{{$carrera->carrera}}</td>
                        </tr>
                        <tr>
                            <td>creado</td>
                            <td>{{$carrera->created_at}}</td>
                        </tr>
                        <tr>
                            <td>Actualizado</td>
                            <td>{{$carrera->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
@stop

@section('js')

@stop