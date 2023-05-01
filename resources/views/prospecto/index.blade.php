@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop
@section('title', 'listar prospectos')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Prospectos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('prospecto.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                {{ __('Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                   

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="prospectos" class="table table-striped table-hover">
                                <thead class="thead bg-primary">
                                    <tr>
                                        <th>No</th>
										<th>Prospecto</th>
										<th>Estado</th>
										<th>UltimaObservacion</th>
										<th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    @include('observacion.modalcreate')
@endsection
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('assets/js/observacion.js')}}"></script>
    <script src="{{asset('assets/js/derivarpotenciales.js')}}"></script>

    <script>
        let tablaprospecto;
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
        $('table').on('click', '.mostrarobservacionesprospecto', function(e) {
            e.preventDefault();
                observable_id =$(this).closest('tr').attr('id');
                console.log(observable_id);
                observable_type ="Prospecto";
                url="../observaciones/" + observable_id + "/" + observable_type,
                // console.log(url);
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

        /*%%%%%%%%%%%%%%%%%%%%%  OCULTA DIVERROR DE MODAL CUANDO SE CIERRA MODAL GUARDAR %%%%%%*/
        $('#modal-agregar-observacion').on('hidden.bs.modal', function (e) {
            $("#diverror").addClass("d-none");
        });
        
        /*%%%%%%%%%%%%%%%%%%%%%  OCULTA DIVERROR DE MODAL CUANDO SE CIERRA MODAL EDITAR %%%%%%*/
        $('#modal-editar-observacion').on('hidden.bs.modal', function (e) {
            $(".diverror").addClass("d-none");
        });
        
        /*%%%%%%%%%%%%%%%%%%% JS GENERAL AGREGA UNA CLASE DE FORMA TEMPORAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
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
            tablaprospecto=$('#prospectos').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']);
                        
                        $('td', row).eq(1).html("<a target='_blank' href='https://wa.me/591"+data['telefono']+"'>"+ data['telefono']+"</a>"); 
                        $('td', row).eq(3).html(moment(data['ultima_observacion']).fromNow()); 
                    },
                    "ajax": "{{ url('prospectos/listar') }}",
                    "columns": [
                        {data: 'id'},
                        {data: 'telefono'},
                        {data: 'estado'},
                        {data: 'ultima_observacion'},
                        {data: 'name'},
                        {data: 'btn'},
                    ],
                    "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    }  
                }
            );
            $('table').on('click','.eliminargenerico',function (e) {
                e.preventDefault(); 
                registro_id=$(this).closest('tr').attr('id');
                eliminarRegistro(registro_id,'prospecto',tablaprospecto);
            });
        } );
    </script>
@stop
