@extends('adminlte::page')
@section('css')
@stop

@section('title', 'Inscripcion Crear')

@section('content')
 
    <section class="content container-fluid">
        <div class="row">
            <table class="table table-dark">
                <thead class="thead-light">
                    <tr>
                        <th>Atribubuto</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>HORA INICIO</td><td>{{$datos['horainicio']}}</td></tr>
                    <tr><td>HORA FIN</td><td>{{$datos['horafin']}}</td></tr>
                    <tr><td>HORAS X DIA</td><td>{{$datos['totalhoras']}}</td></tr>
                    <tr><td>TOTAL HORAS</td><td>{{$datos['horas_total']}}</td></tr>
                    <tr><td>COSTO</td><td>{{$datos['costo']}}</td></tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Configurar Inscripcion</span>
                        <div class="card-tools" id="divfuera">
                            <button id="botonplus" class="btn btn-primary d-none" type="button">Agregar  Sesiones<i class="fas fa-plus-square"></i></button>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        {{-- @include('inscripcione.guarderia.config') --}}
                        @include('inscripcione.form_configurar')
                        @if ($tipo=='actualizando')
                       
                            <form method="POST" id="formulario" action="{{ route('inscripcion.actualizar.configuracion',$inscripcion->id)}}"  role="form" enctype="multipart/form-data">       
                                @csrf                                           
                                <input id="fecha" class="form-control border-warning mb-3" name="fecha" value="{{$inscripcion->fechaini->format('Y-m-d')}}" type="date">
                                <div id="sesiones">
                                    
                                </div>
                                <div class="card-tools text-lg-center mt-4">                                                   
                                    <input id="boton-aceptar" class="btn btn-primary p-2 pl-5 pr-5" type="submit" value="Guardar Cambios">
                                </div>
                            </form>
                        @endif
                        @if ($tipo=='guardando')
                       
                            <form method="POST" id="formulario" action="{{ route('inscripcion.guardar.configuracion',$inscripcion->id)}}"  role="form" enctype="multipart/form-data">       
                                @csrf
                                <div class="card">
                                    <div id="titulosesion" class="card-header bg-warning">
                                        
                                    </div>
                                    <div class="card-body">
                                        <div id="sesiones" class="p-3">
                                            @if($nivel->nivel == 'GUARDERIA')
                                                @include('inscripcione.guarderia.config')
                                            @endif
                                        </div>
                                        <div class="card-tools text-lg-center">
                                            <input id="boton-aceptar" class="btn btn-primary p-2 pl-5  d-none pr-5" type="submit" value="Guardar Cambios">
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @isset($programacion)
        @if (count($programacion)>0)
            @include('programacion.registros')    
        @endif
    @endisset
    
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    
    @if($nivel->nivel == 'GUARDERIA')
        @php
            
        @endphp
        <script>
            $('#horainicio').val("<?php echo $datos['horainicio'] ?>");
            $('#horafin').val("<?php echo $datos['horafin'] ?>");
            $("#botonplus").removeClass('d-none');
            $('#horainicio').addClass('is-valid');
            $('#horafin').addClass('is-valid');
            $('#horafin').focus();
            
            
                // var $html_guarderia="<div class='row'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-2 input-group text-sm'>";
                //     $html_guarderia+="<select class='form-control' name='dias[]' value="+i+">"+ $("#dia").html() +"</option>  </select></div>";
                //     $html_guarderia+="<div class='col-xs-12 col-sm-6 col-md-12 col-lg-2 input-group text-sm'>"
                //     $html_guarderia+="<select class='form-control' name='materias[]' value="+$("#materia").val()+">"+ $("#materia").html() +"</select></div>";
                //     $html_guarderia+="<div class='col-xs-12 col-sm-6 col-md-12 col-lg-2 input-group text-sm'>"
                //     $html_guarderia+="<select class='form-control' name='docentes[]' value="+$("#docente").val()+">"+ $("#docente").html() +"</select></div>";
                //     $html_guarderia+="<div class='col-xs-12 col-sm-6 col-md-12 col-lg-2 input-group text-sm'>"
                //     $html_guarderia+="<select class='form-control' name='aulas[]' value="+$("#aula").val()+">"+ $("#aula").html() +"</select></div>";
                //     $html_guarderia+="<div class='col-xs-12 col-sm-6 col-md-12 col-lg-2 input-group text-sm'>"
                //     $html_guarderia+="<input type='time' class='form-control' name='horainicio[]' value="+ $('#horainicio').val() +"></div>";
                //     $html_guarderia+="<div class='col-xs-12 col-sm-6 col-md-12 col-lg-2 input-group text-sm'>"
                //     $html_guarderia+="<input type='time' class='form-control' name='horafin[]' value="+ $('#horafin').val() +"></div>";
                    
                //     $html_guarderia="<div class='row'><div class='col-xs-12 col-sm-12 col-md-12 col-lg-2 input-group text-sm'>";
                //     $html_guarderia+="<select class='form-control' name='dias[]' value="+i+">"+ $("#dia").html() +"</option>  </select></div>";
                //     $html_guarderia+="<div class='col-xs-12 col-sm-6 col-md-12 col-lg-2 input-group text-sm'>"
                //     $html_guarderia+="<select class='form-control' name='materias[]' value="+$("#materia").val()+">"+ $("#materia").html() +"</select></div>";
                //     $html_guarderia+="<div class='col-xs-12 col-sm-6 col-md-12 col-lg-2 input-group text-sm'>"
                //     $html_guarderia+="<select class='form-control' name='docentes[]' value="+$("#docente").val()+">"+ $("#docente").html() +"</select></div>";
                //     $html_guarderia+="<div class='col-xs-12 col-sm-6 col-md-12 col-lg-2 input-group text-sm'>"
                //     $html_guarderia+="<select class='form-control' name='aulas[]' value="+$("#aula").val()+">"+ $("#aula").html() +"</select></div>";
                //     $html_guarderia+="<div class='col-xs-12 col-sm-6 col-md-12 col-lg-2 input-group text-sm'>"
                //     $html_guarderia+="<input type='time' class='form-control' name='horainicio[]' value="+ $('#horainicio').val() +"></div>";
                //     $html_guarderia+="<div class='col-xs-12 col-sm-6 col-md-12 col-lg-2 input-group text-sm'>"
                //     $html_guarderia+="<input type='time' class='form-control' name='horafin[]' value="+ $('#horafin').val() +"></div>";
                    
                    
                //     $("#sesiones").append("<div class='alert alert-success alert-dismissible fade show' role='alert'>"+$html_guarderia+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span> </button></div>");  
            
            </script>
    @endif

    <script>
        $(document).ready(function() {
            
            let cantida_sesiones=0;

            $("#titulosesion").html("<h4>Tine: "+cantida_sesiones+" sesiones por semana para esta inscripción</h4>");

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
                cantida_sesiones=cantida_sesiones+1;
                
                if(cantida_sesiones>0){
                    $("#boton-aceptar").removeClass('d-none');
                    console.log(cantida_sesiones);
                }
                var $html="<div class='row'><div class='col-xs-12 col-sm-6 col-md-3 col-lg-2 input-group text-sm'>";
                    $html+="<select class='form-control' name='dias[]' value="+$("#dia").val()+">"+ $("#dia").html() +"</option>  </select></div>";
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>"
                    $html+="<select class='form-control' name='materias[]' value="+$("#materia").val()+">"+ $("#materia").html() +"</select></div>";
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>"
                    $html+="<select class='form-control' name='docentes[]' value="+$("#docente").val()+">"+ $("#docente").html() +"</select></div>";
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>"
                    $html+="<select class='form-control' name='aulas[]' value="+$("#aula").val()+">"+ $("#aula").html() +"</select></div>";
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>"
                    $html+="<input type='time' class='form-control' name='horainicio[]' value="+ $('#horainicio').val() +"></div>";
                    
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-2 input-group text-sm'>"
                    $html+="<input type='time' class='form-control' name='horafin[]' value="+ $('#horafin').val() +"></div>";
                    
                    $("#sesiones").append("<div class='alert alert-success alert-dismissible fade show' role='alert'> "+$html+"<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span> </button></div>");

                    
                    
                    $("#sesiones").animate({
                        opacity: '1',
                        width: '100%',
                    }, 1500);
                    var ultimaAlerta=$("div .alert").last().animate({
                        
                    });

                    $("#titulosesion").html("<h4>Tine: "+cantida_sesiones+" sesiones por semana para esta inscripción</h4>");
                     if(cantida_sesiones==0){
                    $("#boton-aceptar").addClass('d-none');
                    $("#titulosesion").addClass('bg-warning');
                }
                if(cantida_sesiones==1){
                    $("#boton-aceptar").removeClass('d-none');
                    $("#titulosesion").removeClass('bg-warning');
                    $("#titulosesion").addClass('bg-success');
                }
                   
                }); 
            $("body").on('click','div .alert .close',function() {
                cantida_sesiones=cantida_sesiones-1;
                //console.log(cantida_sesiones);
                if(cantida_sesiones==0){
                    $("#boton-aceptar").addClass('d-none');
                    $("#titulosesion").addClass('bg-warning');
                }
                if(cantida_sesiones==1){
                    $("#boton-aceptar").removeClass('d-none');
                    $("#titulosesion").removeClass('bg-warning');
                    $("#titulosesion").addClass('bg-success');
                }
                console.log(cantida_sesiones);
                $("#titulosesion").html("<h4>Tine: "+cantida_sesiones+" sesiones por semana para esta inscripción </h4>");
            });

                //** data-table
                $('#table-registros').dataTable({
                "responsive":true,
                "searching":false,
                "paging":   false,
                "autoWidth":false,
                "ordering": false,
                "info":     false,
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },  
            });

        });
    </script>
@endsection
