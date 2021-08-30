@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/mapa.css')}}">
@stop

@section('title', 'Menus')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="container pt-4" id="container">
        @if ($persona->isEstudiante())
            @include('opcion.menu_estudiante')
        @endif
        @if ($persona->isDocente())
            @include('opcion.menu_docente')
        @endif
        
        @if ($persona->isComputacion())
            @include('opcion.menu_computacion')
        @endif

        @if ($persona->isCliservicio())
            @include('opcion.menu_cliservicio')
        @endif
        @if ($persona->isClicopy())
            @include('opcion.menu_copy')
        @endif
    </div>
    @include('opcion.modales')
@stop   

@section('js')
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
    
    {{-- <script>
        $(document).ready(function() {
            $("#crear").on("click", function(){
                $("#modal-crear-gestion").modal("show");
                $.ajax({
                    url : "../colegio/all",
                    success : function(json) {
                        $("#colegio_id").empty();
                        //console.log(json);
                        //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  C A M P O  C O L E G I O S %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                        htmlcolegio="";
                        $.each( json, function( key, value ) {
                            htmlcolegio+="<option value='"+ value.id +"''>"+ value.nombre +"</option>"
                        });
                        $("#colegio_id").append(htmlcolegio);
                    },
                    error : function(xhr, status) {
                        console.log(xhr);
                        Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'Saque una captura para mostrar al servicio Técnico!',
                        })
                    },  
                });
                $.ajax({
                    url : "../grados/no/cursados/{{$id}}",
                    success : function(json) {
                        $("#grado_id").empty();
                       //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  C A M P O  G R A D O S %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
                        htmlgrado="";
                        $.each( json, function( key, value ) {
                            htmlgrado+="<option value='"+ value.id +"''>"+ value.grado +"</option>"
                        });
                        $("#grado_id").append(htmlgrado);

                        htmlanio="";
                        var anio=moment().format('y')-15; 
                       //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  C A M P O  A Ñ O S  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 
                       while(anio<=moment().format('y')) {
                            htmlanio+="<option value='"+ anio +"''>"+ anio +"</option>"
                            anio++;
                        }
                        $("#anio").empty();
                        $("#anio").append(htmlanio);
                    },
                    error : function(xhr, status) {
                        //console.log(xhr);
                        Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'Saque una captura para mostrar al servicio Técnico!',
                        })
                    },  
                });
            });
            $(document).on("submit","#formulario-guardar-gestion",function(e){
                e.preventDefault();
                    var persona_id=$("#persona_id").val();
                    var grado_id=$("#grado_id").val();
                    var colegio_id=$("#colegio_id").val();
                    var anio=$("#anio").val();
                    var token = $("input[name=_token]").val();
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : "../guardar/gestion",
                    headers:{'X-CSRF-TOKEN':token},
                    data:{
                        persona_id:persona_id,
                        grado_id:grado_id,
                        colegio_id:colegio_id,
                        anio:anio,
                        token:token,
                    },
                    success : function(json) {
                        console.log(json);
                        /*%%%%%%%%% un item de timeline %%%%%%%%%*/
                        
                        var htmlitem="";
                         $.each( json, function( key, value ) {
                            
                            htmlitem+="<div class='timeline' id='time_line'>";
                                htmlitem+="<div class='time-label'>";
                                    htmlitem+="<span class='bg-secondary'>"+ value.pivot.anio +"</span>";
                                htmlitem+="</div>";
                                htmlitem+="<div>";
                                    htmlitem+="<i class='fas fa-school bg-primary'></i>";
                                    htmlitem+="<div class='timeline-item'>";
                                        htmlitem+="<span class='time'><i class='fas fa-clock'></i>{{Carbon\Carbon::now()}}</span>";
                                        htmlitem+="<h3 class='timeline-header'><a href='#'>Titulo de la tabla</a> </h3>";
                                        htmlitem+="<div class='timeline-body'>";
                                            htmlitem+="<div class='card card-primary collapsed-card'>";
                                                htmlitem+="<div class='card-header'>";
                                                    htmlitem+="<h3 class='card-title'>Mostrar Colegio detallado</h3>";
                                                    htmlitem+="<div class='card-tools'>";
                                                        htmlitem+="<button type='button' class='btn btn-tool' data-card-widget='collapse'><i class='fas fa-plus'></i></button>";
                                                    htmlitem+="</div>";
                                                htmlitem+="</div>";
                                                htmlitem+="<div class='card-body'>";
                                                htmlitem+="</div>";
                                            htmlitem+="</div>";
                                        htmlitem+="</div>";
                                    htmlitem+="</div>";
                                htmlitem+="</div>";
                            htmlitem+="</div>";
                        });
                        $('#gestiones').empty();
                        $('#gestiones').after(htmlitem);
                    },
                    error : function(xhr, status) {

                    },  
                });
            });


        });
    </script> --}}
@stop