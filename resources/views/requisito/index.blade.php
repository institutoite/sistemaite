@extends('adminlte::page')

@section('title', 'requisitos')

@section('content_header')
    <h1 class="text-center text-primary">requisitos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Lista de requisitos<a class="btn btn-secondary text-white btn-sm float-right" href="{{route('requisito.create')}}">Nuevo requisito</a>
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
                    @foreach ($requisitos as $requisito)
                        <tr>
                            <td>
                                {{$requisito->nombre}}
                            </td>

                            <td>
                                {{$requisito->carrera->carrera}}
                            </td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('requisito.edit', $requisito)}}">Editar</a>
                            </td>

                            <td width="10px">
                                <form action="{{route('requisito.destroy', $requisito->id)}}" method="POST">
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
