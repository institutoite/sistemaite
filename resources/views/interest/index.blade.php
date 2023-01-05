@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Intereses')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Intereses') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('interest.create') }}" class="btn btn-primary btn-sm float-right text-white"  data-placement="left">
                                    {{ __('Crear Intereses') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="interests" class="table table-striped table-hover table-borderless">
                                <thead class="">
                                    <tr>
                                        <th>No</th>
										<th>Interes</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                            {{-- se carga con ajax --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('interest.modales')
    @include('observacion.modalcreate')
@endsection

@section('js')
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
    
    
    {{-- %%%%%%%%%%%%%% muestra el ok de la insersion de datos %%%%%%%%%%%%%%%%% --}}
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>
    <script src="{{asset('assets/js/observacion.js')}}"></script>

    <script>
         //%%%%%%%%%%%%%%%%%%%%%%% INICIALIZA EL CKEDITOR CREAR OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%
        CKEDITOR.replace('editorguardar', {
            height: 120,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
        //%%%%%%%%%%%%%%%%%%%%%%% INICIALIZA EL CKEDITOR EDITAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%
        CKEDITOR.replace('editoreditar', {
            height: 120,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });

        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%       JS INSCRIPCION   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/


        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CREAR OBSERVACION INSCIRPCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.observacion', function (e) {
            e.preventDefault();
            let objeto_id = $(this).closest('tr').attr('id');
            console.log(objeto_id);
            $("#observable_id").val(objeto_id);
            $("#observable_type").val($(this).attr('id'));
            console.log("click en observacion crear");
            CKEDITOR.instances.editorguardar.setData("");
            $("diverror").addClass("d-none");
            $("#modal-agregar-observacion").modal("show");
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CLICK BOTON GUARDAR OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('#guardar-observacion').on('click', function (e) {
            e.preventDefault();
            console.log("click en guardar obsrvacion");
            let observable_id = $("#observable_id").val();
            console.log(observable_id);
            let observable_type = $("#observable_type").val();
            console.log(observable_type);
            for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }
            observacion=$("#editorguardar").val();
            console.log(observacion);
            url ="../guardar/observacion"
            guardarObservacion(observacion,observable_id,observable_type,url);
            
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR OBSERVACIONES INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.mostrarobservacionesintereses', function(e) {
            e.preventDefault();
                observable_id =$(this).closest('tr').attr('id');
                console.log(observable_id);
                observable_type ="Interest";
                url="../observaciones/" + observable_id + "/" + observable_type,
                console.log(url);
                mostrarCrudObservaciones(url);
                $("#modal-mostrar-observaciones").modal("show");
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% DAR BAJA OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

        $('table').on('click', '.bajaobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            console.log(observacion_id);
            url="../darbaja/observacion";
            darBaja(observacion_id,url);
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% DAR ALTA OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.altaobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            url="../daralta/observacion";
            darAlta(observacion_id,url);
        });

        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ELIMINAR OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.eliminarobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            url="../eliminar/general"
            eliminarObservacion(observacion_id,url);
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% EDITAR OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.editarobservacion', function (e) {
            e.preventDefault();
            observacion_id =$(this).closest('tr').attr('id');
            url="../observacion/editar";
            editarObservacion(observacion_id,url);
            $("#modal-mostrar-observaciones").modal("hide");
            $("#modal-editar-observacion").modal("show");
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ACTUALIZAR OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('#actualizar-observacion').on('click', function (e){ 
            e.preventDefault();
            observacion_id =$("#observable_id").val();
            observacion=CKEDITOR.instances.editoreditar.getData();
            console.log(observacion);
            url="../observacion/actualizar";
            actualizarObservacion(observacion_id,observacion,url)
            // $("#modal-editar-observacion").modal("hide");
            // $("#modal-editar-observacion").modal("show");
        });
       
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
        
        $(document).ready(function() {
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATA TABLE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            //let fila=1;
            var tablainterest=$('#interests').dataTable({
                "responsive":true,
                "searching":true,
                "paging":   true,
                "autoWidth":false,
                "ordering": true,
                "info":     true,
                "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                    $('td', row).eq(2).html(data['descripcion']);
                },
                "ajax":{
                        'url':"listar/interests",
                    },
                "columns": [
                    {data: 'id'},
                    {data: 'interest'},
                    {data: 'descripcion'},
                    {
                        "name":"btn",
                        "data": 'btn',
                        "orderable": false,
                    },
                ],
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                },
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#interests').on('click', '.mostrar', function(e) {
                e.preventDefault(); 
                let id_interest =$(this).closest('tr').attr('id');
                console.log(id_interest)
                //var fila=$(this).json;
                $.ajax({
                    url : "interest/mostrar",
                    data : { id :id_interest },
                    success : function(json) {

                        $("#modal-mostrar").modal("show");
                        $("#tabla-mostrar").empty();
                        $html="";
                        $html+="<tr><td>ID</td>"+"<td>"+ json.interest.id +"</td></tr>";
                        $html+="<tr><td>INTEREST</td>"+"<td>"+json.interest.interest+"</td></tr>";
                        $html+="<tr><td>CREADO POR </td>"+"<td>"+json.user.name+"</td></tr>";
                        $html+="<tr><td>DESCRIPCION </td>"+"<td>"+json.descripcion+"</td></tr>";
                        $html+="<tr><td>CREADO</td>"+"<td>"+ moment(json.interest.created_at).format('LLLL') +"</td></tr>";
                        $html+="<tr><td>ACTUALIZADO</td>"+"<td>"+moment(json.interest.updated_at).format('LLLL')+"</td></tr>";
                        $("#tabla-mostrar").append($html);
                    },
                    error : function(xhr, status) {

                        Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'Saque una captura para mostrar al servicio Técnico!',
                        })
                    },
                });
            });
             /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO MOSTRAR EDITAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.editar', function(e) {
                e.preventDefault(); 
                let id_interest =$(this).closest('tr').attr('id');
                console.log(id_interest);
                $("#erroresdiv").addClass('d-none');

                    $.ajax({
                    url : "interest/editar/",
                    data : { id :id_interest },
                    success : function(json) {
                        console.log(json);
                        $("#modal-editar").modal("show");
                        $("#formulario-editar").empty();
                            $html="<div class='row'>";
                            $("#interest").val(json.interest);
                            $("#interest_id").val(json.id);
                            $("#descripcion").val(json.descripcion);
                            $("#formulario-editar").append($html);
                    },
                    error : function(xhr, status) {
                        Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'Saque una captura para mostrar al servicio Técnico!',
                        })
                    },  
                });
            });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ACTUALIZAR ENVIO DE FORMULARIO PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $(document).on("submit","#formulario-editar-motivo",function(e){
                e.preventDefault();//detenemos el envio
            
                $interest=$('#interest').val();
                $interest_id=$('#interest_id').val();
                $descripcion=$('#descripcion').val();
                
                var token = $("input[name=_token]").val();
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : "interest/actualizar/",
                    headers:{'X-CSRF-TOKEN':token},
                    data:{
                            interest:$interest,
                            id:$interest_id,
                            descripcion:$descripcion,
                            token:token,
                        },
                    success : function(json) {
                        console.log(json);
                        if(json.errores){
                            $html="";
                            for (let j in json.errores) {
                                $html+="<li>"+ json.errores.interest[0] +"</li>";
                            }
                            $("#erroresdiv").removeClass('d-none');
                            $("#errores").append($html);
                        }else{
                            $("#modal-editar").modal("hide");
                            $('#interests').DataTable().ajax.reload();
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                })
                                Toast.fire({
                                type: 'success',
                                title: 'Se actualizó correctamente el registro'
                            })   
                        } 
                    },
                    error:function(jqXHR,estado,error){
                        console.log("fdsf");
                    },
                });
            });
            
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% E L I M I N A R  M O T I V O %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
            $('table').on('click','.eliminargenerico',function (e) {
                e.preventDefault(); 
                registro_id=$(this).closest('tr').attr('id');
                eliminarRegistro(registro_id,'interest',tablainterest);
            });

        });
    </script>

@endsection
