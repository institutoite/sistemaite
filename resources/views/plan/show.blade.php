@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Mostrar Cargos')

@section('content')
        <div class="card">
            <div class="card-header bg-primary">
                Mostrar Como <a class="btn btn-secondary text-white btn-sm float-right text-white" href="{{route('convenio.index')}}">Listar Convenios</a>
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
                            <td>{{$convenio->id}}</td>
                        </tr>
                        <tr>
                            <td>Título</td>
                            <td>{{$convenio->titulo}}</td>
                        </tr>
                        <tr>
                            <td>Descripcion</td>
                            <td>{!!$convenio->descripcion!!}</td>
                        </tr>
                        <tr>
                            <td>Descripcion</td>
                            <td><img width="75%" src="{{URL::to('/').Storage::url("$convenio->foto")}}" alt=""></td>
                        </tr>
                        <tr>
                            <td>CREADO</td>
                            <td>{{$convenio->created_at}}</td>
                        </tr>
                        <tr>
                            <td>ACTUALIZADO</td>
                            <td>{{$convenio->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
@stop

@section('js')

@stop