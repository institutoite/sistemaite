@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/mapa.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Periodos')
@section('plugins.jquery', true)
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)


@section('content')
   
    <div class="card">
            <div class="card-header bg-secondary">
                LISTA DE TODOS LOS PERIODOS DE ADMINISTRATIVOS
                <div class="float-right">
                        
                        Nuevo periodo
                    <a href="{{route("periodable.create",["periodable_id"=>$periodable_id,"periodable_type"=>$periodable_type])}}" class="btn-accion-tabla tooltipsC btn-sm mr-2" title="Agregar Periodo a este Administrativo">
                        <i class="far fa-calendar-plus fa-2x text-primary"></i>
                    </a>
                </div>
            </div>

        <div class="card-body">
            <table id="periodoadministrativos" class="table table-hover table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellidop</th>
                        <th>fechaIni</th>
                        <th>fechaFin</th>
                        <th>$</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('observacion.modalcreate')
@endsection

@section('js')

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('assets/js/addTempClass.js')}}"></script>
    <script src="{{asset('assets/js/observacion.js')}}"></script>

    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script>

        //%%%%%%%%%%%%%%%%%%%%%%% INICIALIZA EL CKEDITOR %%%%%%%%%%%%%%%%%%%%%%%%%%%
        CKEDITOR.replace('editorguardar', {
            height: 120,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
        //%%%%%%%%%%%%%%%%%%%%%%% INICIALIZA EL CKEDITOR %%%%%%%%%%%%%%%%%%%%%%%%%%%
        CKEDITOR.replace('editoreditar', {
            height: 120,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CREAR OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.observacion', function (e) {
            e.preventDefault();
            let objeto_id = $(this).closest('tr').attr('id');
            console.log(objeto_id);
            $("#observable_id").val(objeto_id);
            $("#observable_type").val($(this).attr('id'));
            CKEDITOR.instances.editorguardar.setData("");
            console.log("Click en Observacion crear:"+$("#observable_type").val());
            $("#modal-agregar-observacion").modal("show");
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CLICK BOTON GUARDAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('#guardar-observacion').on('click', function (e) {
            e.preventDefault();
            console.log("click en guardar obsrvacion");
            let observable_id = $("#observable_id").val();
            console.log(observable_id);
            let observable_type = $("#observable_type").val();
            console.log(observable_type+"Type");
            for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }
            observacion=$("#editorguardar").val();
            url = "../../../guardar/observacion"
            guardarObservacion(observacion,observable_id,observable_type,url);
            
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR OBSERVACIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.mostrarobservacionesperiodable', function(e) {
            e.preventDefault();
                observable_id =$(this).closest('tr').attr('id');
                observable_type ="Periodable";
                url="../../../observaciones/" + observable_id + "/" + observable_type,
                mostrarCrudObservaciones(url);
                $("#modal-mostrar-observaciones").modal("show");
        });


        $('table').on('click', '.bajaobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            console.log(observacion_id);
            url="../../../darbaja/observacion";
            darBaja(observacion_id,url);
        });
        
        $('table').on('click', '.altaobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            url="../../../daralta/observacion";
            darAlta(observacion_id,url);
        });

        $('table').on('click', '.eliminarobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            url="../../../eliminar/general"
            eliminarObservacion(observacion_id,url);
        });
        $('table').on('click', '.editarobservacion', function (e) {
            e.preventDefault();
            observacion_id =$(this).closest('tr').attr('id');
            url="../../../observacion/editar";
            editarObservacion(observacion_id,url);
            $("#modal-mostrar-observaciones").modal("hide");
            $("#modal-editar-observacion").modal("show");
        });
        $('#actualizar-observacion').on('click', function (e){ 
            e.preventDefault();
            observacion_id =$("#observable_id").val();
            observacion=CKEDITOR.instances.editoreditar.getData();
            url="../../../observacion/actualizar";
            actualizarObservacion(observacion_id,observacion,url);
        });

        $(document).ready(function() {
            let tablaperiodos;
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE COMOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                tablaperiodos=$('#periodoadministrativos').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":'../../../listar/misperiodos/'+"{{$periodable_id}}/"+"{{$periodable_type}}",
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['id']); 
                            $('td',row).eq(3).html(moment(data['fechaini']).format('DD-MM-YYYY'));
                            $('td',row).eq(4).html(moment(data['fechafin']).format('DD-MM-YYYY'));
                            if(data['pagado']==1)
                                $('td',row).eq(5).html("<i class='fas fa-thumbs-up text-success fa-2x'></i>");
                            else
                                $('td',row).eq(5).html("<i class='fas fa-thumbs-down text-danger fa-2x'></i>");
                        },
                        "columns": [
                            {data:'id'},
                            {data:'nombre'},
                            {data:'apellidop'},
                            {data:'fechaini'},
                            {data:'fechafin'},
                            {data:'pagado'},
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],
                        order: [[0, 'desc']],
                        "columnDefs": [
                            { responsivePriority: 1, targets: 0 },
                            { responsivePriority: 2, targets: -1 },
                        ],
                        "language":{
                            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                        },
                        "paging":   true,
                    }
                );
                
            //*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%    ELIMINAR     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                // $('table').on('click','.eliminargenerico',function (e) {
                //     e.preventDefault(); 
                //     registro_id=$(this).closest('tr').attr('id');
                //     eliminarRegistro(registro_id,'periodable',tablaperiodableadministrativos);
                // });
        } );
        
    </script>
@endsection
