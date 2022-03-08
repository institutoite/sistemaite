@extends('adminlte::page')

@section('title', 'cursos')

@section('content_header')
    <h1 class="text-center text-primary">Cursos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Lista de cursos<a class="btn btn-secondary text-white btn-sm float-right" href="{{route('curso.create')}}">Nuevo curso</a>
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
                    @foreach ($cursos as $curso)
                        <tr>
                            <td>
                                {{$curso->nombre}}
                            </td>

                            <td>
                                {{$curso->carrera->carrera}}
                            </td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('curso.edit', $curso)}}">Editar</a>
                            </td>

                            <td width="10px">
                                <form action="{{route('curso.destroy', $curso->id)}}" method="POST">
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
