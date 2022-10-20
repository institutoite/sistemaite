@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Mostrar constante')

@section('content')
        <div class="card">
            <div class="card-header bg-primary">
                Mostrar Constante <a class="btn btn-secondary text-white btn-sm float-right text-white" href="{{route('constante.index')}}">Listar Constante</a>
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
                            <td>{{$constante->id}}</td>
                        </tr>
                        <tr>
                            <td>CONSTANTE</td>
                            <td>{{$constante->constante}}</td>
                        </tr>
                        <tr>
                            <td>VALOR</td>
                            <td>{!!$constante->valor!!}</td>
                        </tr>
                       
                        <tr>
                            <td>CREADO</td>
                            <td>{{$constante->created_at}}</td>
                        </tr>
                        <tr>
                            <td>ACTUALIZADO</td>
                            <td>{{$constante->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
@stop

@section('js')

@stop