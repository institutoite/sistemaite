@extends('adminlte::page')

@section('title', 'misestudiantess')

@section('content_header')
    <h1 class="text-center text-primary">Listado de estudiantes por carrera</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
    

                <tbody>
                    @foreach ($carrera as $carr)
                        
                        <div class="card-header bg-primary">
                            {{$carr->carrera}}
                        </div>
                            
                        <ul>
                            @foreach($carr->computacion as $compu)
                                
                                <li>ID de Alumno: {{ $compu->persona_id }}</li>
                                
                                
                            @endforeach
                        </ul>

                        
                        
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
