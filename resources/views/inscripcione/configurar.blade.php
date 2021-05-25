@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Inscripcion Crear')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Configurar Inscripcion</span>
                        <div class="card-tools">
                            <button id="boton" class="btn btn-primary" type="button"> <i class="fas fa-plus-square"></i></button>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        @include('inscripcione.form_configurar')
                        @if ($tipo=='actualizando')
                            <form method="POST" id="formulario" action="{{ route('inscripcion.actualizar.configuracion',$inscripcion->id)}}"  role="form" enctype="multipart/form-data">       
                                @csrf                                           
                                {{-- <div class="row"> --}}
                                    {{-- <div class="alert alert-warning col-6">Indica desde cuando quieres actualizar </div> 
                                    <div class="col-6 pt-1"></div> --}}
                                    <input class="form-control border-warning" name="fecha" type="date">
                                {{-- </div> --}}
                                <div class="card-tools text-lg-center">
                                    <input id="boton-aceptar" class="btn btn-primary p-2 pl-5 pr-5" type="submit" value="Guardar Cambios">
                                </div>
                            </form>
                        @endif
                        @if ($tipo=='guardando')
                            <form method="POST" id="formulario" action="{{ route('inscripcion.guardar.configuracion',$inscripcion->id)}}"  role="form" enctype="multipart/form-data">       
                                @csrf
                                <div class="card-tools text-lg-center">
                                    <input id="boton-aceptar" class="btn btn-primary p-2 pl-5 pr-5" type="submit" value="Guardar Cambios">
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#boton").click(function(){
                var $html="<div class='row'><div class='col-xs-12 col-sm-6 col-md-3 col-lg-2 input-group text-sm'>";
                    $html+="<select class='form-control' name='dias[]' value="+$("#dia").val()+">"+ $("#dia").html() +"</option>  </select></div>";
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>"
                    $html+="<select class='form-control' name='materias[]' value="+$("#materia").val()+">"+ $("#materia").html() +"</select></div>";
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>"
                    $html+="<select class='form-control' name='docentes[]' value="+$("#docente").val()+">"+ $("#docente").html() +"</select></div>";
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>"
                    $html+="<select class='form-control' name='aulas[]' value="+$("#aula").val()+">"+ $("#aula").html() +"</select></div>";
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>"
                    $html+="<input type='time' class='form-control' name='horainicio[]' id='horainicio' value="+ $('#horainicio').val() +"></div>";
                    
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>"
                    $html+="<input type='time' class='form-control' name='horafin[]' id='horafin' value="+ $('#horafin').val() +"></div>";
    	            $("#boton-aceptar").before("<div class='alert alert-primary alert-dismissible fade show' role='alert'> "+$html+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span> </button></div>");
	        }); 
        });
    </script>
@endsection
