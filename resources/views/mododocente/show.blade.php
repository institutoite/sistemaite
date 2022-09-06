@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('content')
        <div class="card">
            <div class="card-header bg-primary">
                Mostrar Mododocente <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('mododocentes.index')}}">Listar Mododocentes</a>
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
                            <td>{{$mododocente->id}}</td>
                        </tr>
                        <tr>
                            <td>Mododocente</td>
                            <td>{{$mododocente->mododocente}}</td>
                        </tr>
                        <tr>
                            <td>CREADO</td>
                            <td>{{$mododocente->created_at}}</td>
                        </tr>
                        <tr>
                            <td>ACTUALIZADO</td>
                            <td>{{$mododocente->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
@stop

@section('js')

@stop