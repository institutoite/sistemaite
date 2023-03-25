@extends('adminlte::page')

@section('title', 'Ventajas')

@section('content_header')
    <h1 class="text-center text-primary">Ventajas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Lista de Ventajas<a class="btn btn-secondary text-white btn-sm float-right" href="{{route('ventaja.create')}}">Nueva Ventaja</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Descripcion</th>
                        <th>Interes</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($ventajas as $ventaja)
                        <tr>
                            <td>
                                {{$ventaja->descripcion}}
                            </td>

                            <td>
                                {{$ventaja->interest->interest}}
                            </td>

                            <td width="10px">
                                <form action="{{route('ventaja.destroy', $ventaja->id)}}" method="POST">
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
