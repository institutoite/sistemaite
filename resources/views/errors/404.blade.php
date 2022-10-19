@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
@stop

@section('title', 'Error 400')
@section('content')
    
<div class="card">
    <div class="card-header">
        <h1>Error 404 <i class="fas fa-eye-slash text-danger"></i></h1>
    </div>
    <div class="card-body">
        <p class="text-secondary">
            El detonante clásico del error 404 es que el contenido de la web ha sido eliminado o trasladado a otro URL. Sin embargo, hay otras razones por las que puede aparecer una página HTTP 404 en tu navegador. Repasamos aquí las más comunes:
        </p>
        <p class="text-secondary">
            La dirección URL o sus contenidos (archivos o imágenes) se han eliminado o cambiado (los enlaces internos del sitio no han redireccionado a la nueva página de destino).
        </p>
        <p class="text-secondary">
            El enlace no se colocó correctamente (por ejemplo, por falta de atención en la creación o rediseño), el URL se enlazó de forma incorrecta (no se marcó adecuadamente) o la dirección que el usuario introdujo en la barra del navegador no concuerda con el URL.  
        </p>
        <p class="text-secondary">
            El servidor web responsable no está en funcionamiento o hay problemas de conexión.
        </p>
        <p class="text-secondary">
            El nombre de dominio solicitado no puede ser convertido en una dirección IP por el Domain Name System.
        </p>
        <p class="text-secondary">
            El nombre de dominio (ya) no existe.
        </p>
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
