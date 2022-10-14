@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Mostrar Caracteristica')

@section('content')
        <div class="card">
            <div class="card-header bg-primary">
                Mostrar Caracteristica <a class="btn btn-secondary text-white btn-sm float-right text-white" href="{{route('caracteristica.index')}}">Listar Caracteristica</a>
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
                            <td>{{$caracteristica->id}}</td>
                        </tr>
                        <tr>
                            <td>Título</td>
                            <td>{!!$caracteristica->caracteristica!!}</td>
                        </tr>
                        <tr>
                            <td>Plan</td>
                            <td>{!!$caracteristica->plan->titulo !!}</td>
                        </tr>
                        <tr>
                            <td>CREADO</td>
                            <td>{{$caracteristica->created_at}}</td>
                        </tr>
                        <tr>
                            <td>ACTUALIZADO</td>
                            <td>{{$caracteristica->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
@stop

@section('js')

@stop