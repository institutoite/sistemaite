@extends('adminlte::page')

@section('title', 'metas')

@section('content_header')
    <h1 class="text-center text-primary">Metas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Lista de metas<a class="btn btn-secondary text-white btn-sm float-right" href="{{route('meta.create')}}">Nuevo meta</a>
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
                    @foreach ($metas as $meta)
                        <tr>
                            <td>
                                {{$meta->nombre}}
                            </td>

                            <td>
                                {{$meta->carrera->carrera}}
                            </td>

                            

                            <td width="10px">
                                <form action="{{route('meta.destroy', $meta->id)}}" method="POST">
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
