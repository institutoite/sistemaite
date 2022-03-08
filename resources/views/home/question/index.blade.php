@extends('adminlte::page')

@section('title', 'Preguntas')

@section('content_header')
    <h1 class="text-center text-primary">Preguntas Frecuentas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Lista de Preguntas Frecuentas<a class="btn btn-secondary text-white btn-sm float-right" href="{{route('homequestion.create')}}">Nuevo Pregunta</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Pregunta</th>
                        <th>Respuesta</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($questions as $question)
                        <tr>
                            <td>
                                {{$question->question}}
                            </td>

                            <td>
                                {{$question->answer}}
                            </td>

                            <td width="10px">
                                <form action="{{route('homequestion.destroy', $question->id)}}" method="POST">
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
