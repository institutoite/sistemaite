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
                            <td>{{$periodo->id}}</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{$persona->nombre}}</td>
                        </tr>
                        <tr>
                            <td>Apellidop</td>
                            <td>{{$persona->apellidop}}</td>
                        </tr>
                        <tr>
                            <td>Apellidom</td>
                            <td>{{$persona->apellidom}}</td>
                        </tr>
                        <tr>
                            <td>Periodable type</td>
                            <td>{{$periodable_type}}</td>
                        </tr>
                        <tr>
                            <td>FechaInicio</td>
                            <td>{{$periodo->fechaini}}</td>
                        </tr>
                        <tr>
                            <td>FechaFin</td>
                            <td>{{$periodo->fechafin}}</td>
                        </tr>
                        <tr>
                            <td>Estado Pago</td>
                            <td>
                                @php
                                    if($periodo->pagado==1){
                                        $icono="<i class='fas fa-thumbs-up text-success fa-2x'></i><p class='
                                        text-gray'
                                        > Pagado</p>";
                                    }else{
                                        $icono="<i class='fas fa-thumbs-down text-danger fa-2x'></i><p class='text-gray'> No pagado aún</p>";
                                    }
                                @endphp
                                {!!$icono!!}
                            </td>
                        </tr>
                        <tr>
                            <td>CREADO</td>
                            <td>{{$periodo->created_at}}</td>
                        </tr>
                        <tr>
                            <td>ACTUALIZADO</td>
                            <td>{{$periodo->updated_at}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    
@stop

@section('js')

@stop