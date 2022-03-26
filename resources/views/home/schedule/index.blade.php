@extends('adminlte::page')

@section('title', 'Horarios')

@section('content_header')
    <h1 class="text-center text-primary">Horarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Lista de Horarios <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('homeschedule.create')}}">Nuevo Horario</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($schedules as $schedule)
                        <tr>
                            <td>
                                {{$schedule->title}}
                            </td>

                            <td>
                                {{$schedule->description}}
                            </td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('homeschedule.edit', $schedule)}}">Editar</a>
                            </td>

                            <td width="10px">
                                <form action="{{route('homeschedule.destroy', $schedule->id)}}" method="POST">
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
