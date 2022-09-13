@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Mostrar Cargos')

@section('content')
        <div class="card">
            <div class="card-header bg-primary">
                Mostrar Cargo <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('cargo.index')}}">Listar Cargos</a>
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
                            <td>{{$cargo->id}}</td>
                        </tr>
                        <tr>
                            <td>CARGO</td>
                            <td>{{$cargo->cargo}}</td>
                        </tr>
                        <tr>
                            <td>CREADO</td>
                            <td>{{$cargo->created_at}}</td>
                        </tr>
                        <tr>
                            <td>ACTUALIZADO</td>
                            <td>{{$cargo->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
@stop

@section('js')

@stop