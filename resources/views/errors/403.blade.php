@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Error 403')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>No tienes permiso Error 403 <i class="fas fa-lock text-danger"></i></h1>
        </div>
        <div class="card-body">
            <p class="text-secondary">
                403 Forbidden es un error por que no tienes permiso para realizar la acción que intentaste.
            </p>
            
            <p class="text-secondary">
                Existen varias formas en la que los sitios web pueden mostrar un error de este estilo, pero en el grueso de los casos usan estos nombres que son ligeramente diferentes como lo ves aquí:
            </p>
            
            <ul class="text-primary">
                <li>
                    403 Prohibido
                </li>
                <li>
                    HTTP 403
                </li>
                <li>
                    Prohibido
                </li>
                <li>
                    Error HTTP 403 – Prohibido
                </li>
                <li>
                    Error HTTP 403.14 – Prohibido
                </li>
                <li>
                    Error 403
                </li>
                <li>
                    Prohibido: No tiene permiso para acceder al directorio x en este servidor
                </li>
                <li>
                    Error 403 – Prohibido
                </li>
            </ul>

            <img src="{{URL::to('/')}}/storage/error/404.png" alt="">
            <div class="container-fluid h-100 mt-3"> 
                <div class="row w-100 align-items-center">
                    <div class="col text-center">
                        
                        <a href="{{route('home')}}" class="btn btn-primary text-white">Vover al inicio</a>
                        
                    </div>	
                </div>
            </div>
        </div>
    </div>
@stop
