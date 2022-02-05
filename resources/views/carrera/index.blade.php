@extends('adminlte::page')

@section('title', 'carreras')

@section('content_header')
    <h1 class="text-center text-primary">carreras</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Lista de carreras<a class="btn btn-secondary text-white btn-sm float-right" href="{{route('carrera.create')}}">Nuevo carrera</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Carrera</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($carreras as $carrera)
                        <tr>
                            <td>
                                {{$carrera->carrera}}
                            </td>

                            <td>
                                {{$carrera->precio}}
                            </td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('carrera.edit', $carrera)}}">Editar</a>
                            </td>

                            <td width="10px">
                                <form action="{{route('carrera.destroy', $carrera->id)}}" method="POST">
                                    @csrf
                                    @method('delete')

                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            <td></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
