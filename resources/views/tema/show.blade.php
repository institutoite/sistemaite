@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Mostrar Asignatura')


@section('content_header')
    <h1 class="text-center text-primary">Mostrar Tema</h1>
@stop

@section('content')
        <div class="card">
            <div class="card-header bg-primary">
                Mostrar Tema <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('tema.index')}}">Listar Temas</a>
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
                            <td>{{$tema->id}}</td>
                        </tr>
                        <tr>
                            <td>TEMA</td>
                            <td>{{$tema->tema}}</td>
                        </tr>
                        <tr>
                            <td>MATERIA</td>
                            <td>{{$tema->materia->materia}}</td>
                        </tr>

                        <tr>
                            <td>Usuario</td>
                            <td>
                                {{$user->name}}
                                <img  src="{{URL::to('/').Storage::url("$user->foto")}}" alt="{{$user->name}}" class="rounded img-thumbnail img-fluid border-primary border-5"> 
                            </td>
                        </tr>

                        <tr>
                            <td>CREADO</td>
                            <td>{{$tema->created_at}}</td>
                        </tr>
                        <tr>
                            <td>ACTUALIZADO</td>
                            <td>{{$tema->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
@stop

@section('js')

@stop