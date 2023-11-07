@extends('adminlte::page')

@section('title', 'misestudiantess')

@section('content_header')
    <h1 class="text-center text-primary">Listado de mis estudiantes de hoy</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
           Listado
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Materia</th>
                        <th>Horario</th>
                        <th>Aula</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($programacion as $progra)
                        <tr>
                            <td>
                                {{$progra->inscripcione->estudiante->persona->id}}
                            </td>

                            <td>
                            {{$progra->inscripcione->estudiante->persona->nombre}} {{$progra->inscripcione->estudiante->persona->apellidop}} {{$progra->inscripcione->estudiante->persona->apellidom}}
                            </td>

                            <td>
                            {{$progra->materia->materia}}
                            </td>

                            <td>
                            {{$progra->hora_ini->isoFormat('H:mm')}} - {{$progra->hora_fin->isoFormat('H:mm')}} 
                            </td>

                            <td>
                            {{$progra->aula->aula}} 
                            </td>
                            
                            

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
