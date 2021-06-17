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
                            <button id="botonplus" class="btn btn-primary d-none" type="button">Agregar <i class="fas fa-plus-square"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('inscripcione.form_configurar')
                        @if ($tipo=='actualizando')
                            <form method="POST" id="formulario" action="{{ route('inscripcion.actualizar.configuracion',$inscripcion->id)}}"  role="form" enctype="multipart/form-data">       
                                @csrf                                           
                                <input id="fecha" class="form-control border-warning mb-3" name="fecha" value="{{$inscripcion->fechaini->format('Y-m-d')}}" type="date">
                                <div id="sesiones" style="background :blueviolet,opacity: '0.1';width:200px;">
fds
                                </div>
                                <div class="card-tools text-lg-center mt-4">                                                   
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
    @include('programacion.registros')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            

            $('#horainicio').blur(function() {
                if(($('#horainicio').val()=='')||(($('#horafin').val()<=$('#horainicio').val()))){
                    $('#horainicio').addClass('is-invalid');
                    $('#botonplus').hide();
                }else{
                    $(this).addClass('is-valid');
                    $(this).removeClass('is-invalid');
                }    
            });
            $('#horafin').blur(function() {
                if(($('#horafin').val()=='')||($('#horafin').val()<=$('#horainicio').val())){
                    $('#horafin').addClass('is-invalid');
                    $('#horainicio').addClass('is-invalid');
                    $('#botonplus').hide();
                }else{
                    $(this).addClass('is-valid');
                    $('#horainicio').blur();
                    $("#botonplus").removeClass('d-none');
                    $(this).removeClass('is-invalid');
                    $('#botonplus').show(300);
                    
                }    
            });

            //console.log($('input[type=time]').size);

            $("#botonplus").click(function(){
                var $html="<div class='row'><div class='col-xs-12 col-sm-6 col-md-3 col-lg-2 input-group text-sm'>";
                    $html+="<select class='form-control' id='dias' name='dias[]' value="+$("#dia").val()+">"+ $("#dia").html() +"</option>  </select></div>";
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
                    
                    $("#sesiones").append("<div class='alert alert-primary alert-dismissible fade show' role='alert'> "+$html+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span> </button></div>");

                    
                    
                    $("#sesiones").animate({
                        opacity: '1',
                        width: '100%',
                    }, 1500);
                    var ultimaAlerta=$("div .alert").last().animate({
                        
                    });
                }); 
        });
    </script>
@endsection
