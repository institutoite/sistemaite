@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">

@stop

@section('title', 'Programación')

@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)



@if ($dias_que_faltan_para_pagar<0)
    @php $clase="dias-negativos" @endphp
@else
    @if ($dias_que_faltan_para_pagar==0)
        @php
            $clase="dias0";
        @endphp
    @else
        @switch($dias_que_faltan_para_pagar)
            @case(1)
                @php $clase="dias1"; @endphp
                @break
            @case(2)
                @php $clase="dias2"; @endphp
                @break
            @case(3)
                @php $clase="dias3"; @endphp
                @break
            @case(4)
                @php $clase="dias4"; @endphp
                @break
            @case(5)
                @php $clase="dias5"; @endphp
                @break
            @default
                @php $clase="bg-success"; @endphp 
        @endswitch
    @endif
@endif

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <span id="card_title">
                                {{ __('Programacion') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('programacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Inicio') }}
                                </a>
                            </div>
                        
                    </div>
                    <div class="container-fluid mt-2">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-info"><i class="fas fa-user-graduate"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Total Clase</span>
                                        <span class="info-box-number">{{$inscripcion->totalhoras}}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-success"><i class="far fa-star"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Asistencias</span>
                                        <span class="info-box-number">{{$presentes}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>

                                    <div class="info-box-content">
                                        <span class="info-box-text">Licencias</span>
                                        <span class="info-box-number">{{$licencias}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-12">
                                <div class="info-box">
                                <span class="info-box-icon bg-danger"><i class="fas fa-skull-crossbones"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Faltas</span>
                                    <span class="info-box-number">{{$faltas}}</span>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container-fluid">
                        <div class="row">
                            @if ($inscripcion->costo==$pago)
                                @php $clasetabla="bg-success text-white" @endphp
                            @else
                                @if ($pago>0)
                                    @php $clasetabla="bg-warning text-white" @endphp
                                @else 
                                    @php $clasetabla="dias-negativos text-white" @endphp
                                @endif
                            @endif

                            <div class="col-6">
                                <table class="table table-bordered table-hover table-striped">
                                    <tbody class="{{$clasetabla}}" >    
                                        <tr class="">
                                            <td><strong>COSTO</strong></td>
                                            <td><strong>{{'Bs. '. floor($inscripcion->costo)}}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td><strong>PAGOS</strong></td>
                                            <td><strong>{{'Bs. '.$pago }}</strong></td>
                                        </tr>
                                        <tr class="">
                                            <td><strong>DEBE</strong></td>
                                            <td> <strong>Bs. {{$inscripcion->costo-$pago}}</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> 
                            
                            <div class="col-6 text-center">
                                <div class="circulo {{$clase}}">
                                    @if ($dias_que_faltan_para_pagar==0)
                                        <span>PAGA HOY</span> <br>
                                    @else
                                        @if ($dias_que_faltan_para_pagar>0)
                                            <h2>Faltan <br> {{$dias_que_faltan_para_pagar}}  días</h2><br>
                                        @else
                                            <p> Ya Hace<br> {{$dias_que_faltan_para_pagar}} días</p>
                                        @endif
                                    @endif
                                
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="success"></div>
                        @include('programacion.hoy')
                        @include('programacion.futuro')
                        @include('programacion.pasado')
                        @include('programacion.todo')
                        @include('programacion.modales')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('js')
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
    /*%%%%%%%%%%%%%%%%%%%%%%  funcion que agrega clase por tiempo x y luego lo destruye %%%%%%%%%%%*/
        ( function ( $ ) {
            'use strict';
            $.fn.addTempClass = function ( className, expire, callback ) {
                className || ( className = '' );
                expire || ( expire = 2000 );
                return this.each( function () {
                    $( this ).addClass( className ).delay( expire ).queue( function () {
                        $( this ).removeClass( className ).clearQueue();
                        callback && callback();
                    } );
                } );
            };
        } ( jQuery ) );
         /*%%%%%%%%%%%%%%%%%%%%%%  CODIGO QUE SE CARGA DESPUES DE CARGAR LA PAGINA %%%%%%%%%%%*/
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();  
            


            $('#tabla_hoy').dataTable({
                "responsive":true,
                "searching":true,
                "paging":   true,
                "autoWidth":true,
                "createdRow": function( row, data, dataIndex ) {
                    debugger;
                    for(var i=0; i < d.results.length; ++i) {
                        if(data.ID == d.results[i].UnterpunktvonId){
                            $(row).children('td:first').addClass( 'details-control' );
                            var td = $('td', row).eq(0);
                            var tr = td.closest('tr');
                            var nRow = this.api().row( tr );
                            nRow.child(format ( d.results[i] ));
                        }
                    }
                },
                "ordering": true,
                "info":     true,
                "language":{
                    "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                }, 
                "ajax" : {
                    'url' : "{{ route('programaciones.hoy',['inscripcion'=>$inscripcion->id])}}",
                    "dataSrc": '',
                },
                "columns": [
                        {"data": "id"},
                        {"data": "fecha"},
                        {"data": "estado"},
                        {"data": "hora_ini"},
                        {"data": "hora_fin"},
                        {"data": "habilitado"},
                    ],
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#futuro').on('click', '.mostrar', function(e) {
                e.preventDefault(); 
                // var id_programacion =$(this).closest('tr').find('td:first-child').text();
                let id_programacion =$(this).closest('tr').attr('id');
                //var fila=$(this).json;
                console.log(id_programacion);
                $.ajax({
                    url : "../../programacion/mostrar/",
                    data : { id :id_programacion },
                    success : function(json) {
                        console.log(json);
                        $("#modal-mostrar").modal("show");
                        $("#tabla-mostrar").empty();
                        $html="";
                        $html+="<tr><td>Fecha</td>"+"<td>"+moment(json.programacion.fecha).format('dddd')+' '+moment(json.programacion.fecha).format('LL')+"</td></tr>";
                        $html+="<tr><td>Hora Inicio</td>"+"<td>"+moment(json.programacion.hora_ini).format('HH:mm:ss')+"</td></tr>";
                        $html+="<tr><td>Hora Fin</td>"+"<td>"+moment(json.programacion.hora_fin).format('HH:mm:ss')+"</td></tr>";
                        $html+="<tr><td>Horas por clase</td>"+"<td>"+json.programacion.horas_por_clase+"</td></tr>";
                        $html+="<tr><td>Estado Pago</td>"+"<td>"+(json.programacion.habilitado==1) ? 'Pagado' :'Impaga'+"</td></tr>";
                        $html+="<tr><td>Estado Activo</td>"+"<td>"+(json.programacion.activo==1) ? 'Activo' :'Desactivado'+"</td></tr>";
                        $html+="<tr><td>Estado</td>"+"<td>"+json.programacion.estado+"</td></tr>";
                        $html+="<tr><td>Docente</td>"+"<td>"+json.docente.nombre+"</td></tr>";
                        $html+="<tr><td>Materia</td>"+"<td>"+json.materia.materia+"</td></tr>";
                        $html+="<tr><td>Aula</td>"+"<td>"+json.aula.aula+"</td></tr>";
                        $sumaCambio=0;
                        for (let j in json.observaciones) {
                            $html+="<tr><td>OBS-"+ j +"</td>"+"<td>"+json.observaciones[j].observacion+"</td></tr>";
                        }
                        $("#tabla-mostrar").append($html);
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% FIN MOSTRAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO MOSTRAR EDITAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#futuro').on('click', '.editar', function(e) {
                e.preventDefault(); 
                let id_programacion =$(this).closest('tr').attr('id');
                console.log(id_programacion);
                    $.ajax({
                    url : "../../programacion/editar/",
                    data : { id :id_programacion },
                    success : function(json) {
                        console.log(json);
                        $("#modal-editar").modal("show");
                        $("#formulario-editar").empty();
                            $html="<div class='row'>";
                            $html+="<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'><div class='form-floating mb-3 text-gray'>";
                            $html+="<input type='date' name='fecha' class='form-control' id='fecha' "; 
                            $html+="value=\'"+moment(json.programacion.fecha).format('YYYY-MM-DD') +"'\>";
                            $html+="<label for='fecha'>Fecha</label></div></div>";

                            $html+="<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'><div class='form-floating mb-3 text-gray'>";
                            $html+="<input type='time' name='hora_ini' class='form-control @error('hora_ini') is-invalid @enderror texto-plomo' id='hora_ini'"; 
                            $html+="value=\'"+moment(json.programacion.hora_ini).format('HH:mm:ss') +"'\>";
                            $html+="<label for='hora_ini'>hora inicio</label></div></div>";

                            $html+="<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'><div class='form-floating mb-3 text-gray'>";
                            $html+="<input type='time' name='hora_fin' class='form-control @error('hora_fin') is-invalid @enderror texto-plomo' id='hora_fin'"; 
                            $html+="value=\'"+moment(json.programacion.hora_fin).format('HH:mm:ss') +"'\>";
                            $html+="<label for='hora_fin'>hora Fin</label></div></div>";
                            $html+="</div>";// div del row
                            

                            //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  CAMPO OCULTO DE INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                            $html+="<input id='inscripcione_id'  type='text' hidden readonly name='inscripcione_id' value='"+json.programacion.inscripcione_id +"'>";
                            $html+="<input id='programacion_id'  type='text' hidden readonly name='programacion_id' value='"+json.programacion.id +"'>";
                            //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  CAMPO OCULTO DE DOCENTE %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                            $html+="<div class='row'>";
                            $html+="<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'>";
                            $html+="<div class='form-floating mb-3 text-gray'>";
                            $html+="<select class='form-control @error('docente_id') is-invalid @enderror' name='docente_id' id='docente_id'>";
                            
                            for (let j in json.docentes) {
                                if(json.docentes[j].id==json.programacion.docente_id){
                                    $html+="<option  value='"+json.docentes[j].id +"' selected >"+json.docentes[j].nombre+"</option>";
                                }else{
                                    $html+="<option  value='"+json.docentes[j].id +"'>"+json.docentes[j].nombre+"</option>";
                                }
                            }
                            $html+="</select>";                
                            $html+="<label for='docente_id'>Docente</label></div></div>";
                            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  CAMPO MATERIA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                            $html+="<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'>";
                            $html+="<div class='form-floating mb-3 text-gray'>";
                            $html+="<select class='form-control @error('materia_id') is-invalid @enderror' name='materia_id' id='materia_id'>";
                            for (let j in json.materias) {
                                if(json.materias[j].id==json.programacion.materia_id){
                                    $html+="<option  value='"+json.materias[j].id +"' selected >"+json.materias[j].materia+"</option>";
                                }else{
                                    $html+="<option  value='"+json.materias[j].id +"'>"+json.materias[j].materia+"</option>";
                                }
                            }
                            $html+="</select>";                
                            $html+="<label for='materia_id'>Materia</label></div></div>";
                            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  CAMPO AULA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                            $html+="<div class='col-xs-12 col-sm-12 col-md-6 col-lg-4'>";
                            $html+="<div class='form-floating mb-3 text-gray'>";
                            $html+="<select class='form-control @error('aula_id') is-invalid @enderror' name='aula_id' id='aula_id'>";
                            for (let j in json.aulas) {
                                if(json.aulas[j].id==json.programacion.aula_id){
                                    $html+="<option  value='"+json.aulas[j].id +"' selected >"+json.aulas[j].aula+"</option>";
                                }else{
                                    $html+="<option  value='"+json.aulas[j].id +"'>"+json.aulas[j].aula+"</option>";
                                }
                            }
                            $html+="</select>";                
                            $html+="<label for='aula_id'>Aula</label></div></div>";
                            $html+="</div>";// fin de row

                            $html+="<div class='row'>";
                            // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  CAMPO ESTADO EN VENTANA MODAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%                            
                            $html+="<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>";
                            $html+="<div class='form-floating mb-3 text-gray'>";
                            $html+="<select class='form-control @error('estado') is-invalid @enderror'  name='estado' id='estado'>";
                            $html+="<option value=''> Elija estado</option>";
                            if(json.programacion.estado == 'INDEFINIDO'){
                                $html+="<option value='INDEFINIDO'"+" selected>INDEFINIDO</option>";
                            }else{
                                $html+="<option value='INDEFINIDO'>INDEFINIDO</option>";
                            }
                            if(json.programacion.estado == 'PRESENTE'){
                                $html+="<option value='PRESENTE'"+" selected>PRESENTE</option>";
                            }else{
                                $html+="<option value='PRESENTE'>PRESENTE</option>";
                            }
                            if(json.programacion.estado == 'FINALIZADO'){
                                $html+="<option value='FINALIZADO'"+" selected>FINALIZADO</option>";
                            }else{
                                $html+="<option value='FINALIZADO'>FINALIZADO</option>";
                            }
                            $html+="</select>";                
                            $html+="<label for='estado'>Estado</label></div></div>";
                        // %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  CAMPO ACTIVO EN VENTANA MODAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                            $html+="<div class='col-xs-12 col-sm-12 col-md-6 col-lg-6   '>";
                            $html+="<div class='form-floating mb-3 text-gray'>";
                            $html+="<select class='form-control @error('activo') is-invalid @enderror'  name='activo' id='activo'>";
                            $html+="<option value=''> Elija activo</option>";
                            if(json.programacion.activo == 1){
                                $html+="<option value='1'"+" selected>Activo</option>";
                            }else{
                                $html+="<option value='1'>Activo</option>";
                            }
                            if(json.programacion.activo == 0){
                                $html+="<option value='0'"+" selected>Inactivo</option>";
                            }else{
                                $html+="<option value='0'>Inactivo</option>";
                            }
                            $html+="</select>";                
                            $html+="<label for='activo'>activo</label></div></div>";

                            $html+="</div>";// div del row
                            
                            $html+="<div class='container-fluid h-100 mt-3'>"; 
                            $html+="<div class='row w-100 align-items-center'>";
                            $html+="<div class='col text-center'>";
                            $html+="<button type='submit' id='guardar' class='btn btn-primary text-white btn-lg'>Guardar <i class='far fa-save'></i></button> ";       
                            $html+="</div>";
                            $html+="</div>";
                            $html+="</div>";
                        
                            $("#formulario-editar").append($html);
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },  
                });
            });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ACTUALIZAR ENVIO DE FORMULARIO PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $(document).on("submit","#formulario-editar",function(e){
                e.preventDefault();//detenemos el envio
                
                $hora_inicio=$('#hora_ini').val();
                $hora_fin=$('#hora_fin').val();
                $fecha=$('#fecha').val();
                
                $habilitado=$('#habilitado').val();
                $estado=$('#estado').val();
                $activo=$('#activo').val();
                
                $horas_por_clase=$('#hora_por_clase').val();
                $docente_id=$('#docente_id').val();
                $materia_id=$('#materia_id').val();
                $aula_id=$('#aula_id').val();
                $inscripcione_id=$('#inscripcione_id').val();
                $programacion_id=$('#programacion_id').val();
                
                
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url : "../../programacion/actualizar/",
                    data:{
                            hora_ini:$hora_inicio,
                            hora_fin:$hora_fin,
                            fecha:$fecha,
                            habilitado:$habilitado,
                            estado:$estado,
                            activo:$activo,
                            horas_por_clase:$horas_por_clase,
                            docente_id:$docente_id,
                            materia_id:$materia_id,
                            aula_id:$aula_id,
                            inscripcione_id:$inscripcione_id,
                            programacion_id:$programacion_id,
                        },
                    
                    success : function(json) {
                        let programacion_actualizar=$('#programacion_id').val();
                        console.log(programacion_actualizar);
                        $('#'+programacion_actualizar+' td:nth-child(2)').text(moment(json.programacion.fecha).format('D-M-Y dddd'));
                        $('#'+programacion_actualizar+' td:nth-child(3)').text(moment(json.programacion.hora_ini).format('HH:mm')+'-'+moment(json.programacion.hora_fin).format('HH:mm'));
                        $('#'+programacion_actualizar+' td:nth-child(4)').text(json.docente.nombre);
                        $('#'+programacion_actualizar+' td:nth-child(5)').text(json.materia.materia);
                        $('#'+programacion_actualizar+' td:nth-child(6)').text(json.aula.aula);
                        $('#modal-editar').modal('hide');
                        $("#"+programacion_actualizar).addTempClass( 'bg-success', 3000 );
                        $('#tabla_hoy').draw();
                        
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });

            /* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ADELANTAR PRO */
        });
</script>

@endsection
