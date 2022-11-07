@extends('adminlte::page')
@section('css')
@stop

@section('title', 'Inscripcion Crear')

@section('content')
 
    <section class="content container-fluid">
        <div class="row">
           
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header bg-secondary">
                        <span class="card-title">Actualizar Configuracion de Matriculación </span>
                        <div class="card-tools" id="divfuera">
                            <a href="{{route('opcion.principal', $matriculacion->computacion->persona->estudiante->id)}}" class="btn btn-primary text-white tooltipsC mr-2" title="ir a opciones de la persona">
                                Conservar clases sin modificar &nbsp;<i class="fas fa-bars"></i>
                            </a>
                            <button id="botonplus" class="btn btn-primary d-none" type="button">Agregar  Sesiones<i class="fas fa-plus-square"></i></button>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        {{-- @include('matriculacione.guarderia.config') --}}
                        @include('matriculacion.form_configurar')
                            <form method="POST" id="formulario" action="{{ route('matriculacion.actualizar.configuracion',$matriculacion->id)}}"  role="form" enctype="multipart/form-data">       
                                @csrf
                                <div class="card">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                            @if($errors->has('radioconfig'))
                                                <span class="text-danger"> {{ $errors->first('radioconfig')}}</span>
                                            @endif
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="radioconfig" id="radiodesde" value="radiodesde" {{$clasesConsumidas == 0 ? '' : 'checked' }}>
                                                <label class="form-check-label text-gray" for="radiodesde">Modificar desde la fecha (de aqui en adelante)</label>
                                            </div>
                                            
                                                <div class="form-check form-check-inline"  >
                                                    <input class="form-check-input" type="radio" {{$clasesConsumidas == 0 ? 'enabled' : 'disabled' }} name="radioconfig" id="radiotodo" value="radiotodo">
                                                    <label class="form-check-label text-gray" for="radiotodo">Cambiar Fecha Inicio (Todo)</label>
                                                </div>
                                            
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
                                            @if($errors->has('fecha'))
                                                <span class="text-danger"> {{ $errors->first('fecha')}}</span>
                                            @endif
                                        </div>
                                        {{-- {{dd($matriculacion->fechaini->format('d/m/Y'));}} --}}
                                        <div class="col-12">
                                            @isset($ultimaclasepasada)
                                            <input id="fecha" min={{ $ultimaclasepasada->fecha}} class="form-control border-warning mb-3" name="fecha" value="{{$matriculacion->fechaini->format('Y-m-d')}}" type="date">
                                            @else
                                            <input id="fecha" class="form-control border-warning mb-3" name="fecha" value="{{$matriculacion->fechaini->format('Y-m-d')}}" type="date">
                                            @endisset
                                            <p id="mensajefecha" class="d-none text-gray">La fecha no es necesaria ya que lo tomara de la inscripción, esta opcion edita todas las clases</p>

                                        </div>
                                    </div>
                                    <div id="titulosesion" class="card-header bg-warning">
                                        
                                    </div>
                                    <div class="card-body">
                                        <div id="sesiones" class="p-3">
                                            
                                        </div>
                                        <div class="card-tools text-lg-center">
                                            <input id="boton-aceptar" class="btn btn-primary p-2 pl-5  d-none pr-5" type="submit" value="Guardar Cambios">
                                        </div>
                                    </div>
                                </div>
                                
                            </form>
                       
                    </div>
                    <div class="container-fluid h-100 mt-3"> 
                        <div class="row w-100 align-items-center">
                            <div class="col text-center">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="{{route('reservar.matriculacion',$matriculacion->id )}}">
                                            <button type="button" class="btn btn-danger text-white btn-lg" data-bs-toggle="tooltip" data-bs-placement="left" title="Click aqui si solo va reservar sin pagar: solo si no trajo dinero el Supercliente">
                                                Solo reservar: Sin dinero <i class="fas fa-times-circle"></i>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-center">
                                        <img class="img-thumbnail rounded" src="{{asset('imagenes/sindinero.jpg')}}" width="200" alt="No traje dinero solo quiero reservar">
                                        </div>
                                    </div>
                                </div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- {{ dd($programacioncoms) }} --}}
    @isset($programacioncoms)
        @if (count($programacioncoms)>0)
            @include('programacioncom.registros')    
        @endif
    @endisset
    
@endsection


@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    
    

    <script>
        $(document).ready(function() {
            
            let cantida_sesiones=0;

            $("#titulosesion").html("<h4>Tiene: "+cantida_sesiones+" sesiones por semana para esta Matriculación</h4>");

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

            $('input[type=radio][name=radioconfig]').on('change',function(){
                if ($("#radiotodo").is(':checked')){
                    $('#fecha').attr('readonly',true);
                    $("#mensajefecha").removeClass('d-none');
                }
                if ($("#radiodesde").is(':checked')){
                    $('#fecha').attr('readonly',false);
                    $("#mensajefecha").addClass('d-none');
                }
            });

            $("#botonplus").click(function(){
                cantida_sesiones=cantida_sesiones+1;
                $("#dia option[value="+ cantida_sesiones +"]").attr("selected",true);
                if(cantida_sesiones>0){
                    $("#boton-aceptar").removeClass('d-none');
                    console.log(cantida_sesiones);
                }
                var $html="<div class='row'><div class='col-xs-12 col-sm-6 col-md-3 col-lg-2 input-group text-sm'>";
                    $html+="<select class='form-control' name='dias[]' value="+$("#dia").val()+">"+ $("#dia").html() +"</option>  </select></div>";
                    
                    $html+="<div class='col-xs-12 col-sm-6 col-md-4 col-lg-4 input-group text-sm'>"
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

                    $("#titulosesion").html("<h4>Tine: "+cantida_sesiones+" sesiones por semana para esta matriculación</h4>");
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
                $("#titulosesion").html("<h4>Tine: "+cantida_sesiones+" sesiones por semana para esta Matriculación </h4>");
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
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    },  
            });

        });
    </script>
@endsection
