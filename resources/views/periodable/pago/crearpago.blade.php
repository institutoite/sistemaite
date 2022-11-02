@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Periodo')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
        <div class="row">
           <h5> {{$persona->nombre." ".$persona->apellidop." ".$persona->apellidom}}</h5>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route("periodos.periodable.view",['periodable_id'=>$periodable->periodable_id,'periodable_type'=>$periodable_type])}}"><button type="button" class="btn btn-primary p-2 text-white">MisPeriodos</button></a>
                    <a href="{{route('periodable.index')}}"><button type="button" class="btn btn-secondary p-2">Todos </button></a>
                    <a href="{{route('docentes.index')}}"><button type="button" class="btn btn-primary p-2 text-white">Docentes</button></a>
                    <a href="{{route('administrativos.index')}}"><button type="button" class="btn btn-secondary p-2">Administrativos</button></a>
                </div>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                @php
                        if($saldo>0){
                            $clase="bg-danger";
                            $texto="text-danger";
                        }else{
                            $clase="bg-success";
                            $texto="text-success";
                        }
                    @endphp
                <div class="row">
                    
                    <div class="card">
                        <div class="card-header">
                            RESUMEN
                        </div>
                        <div class="card-body">
                            
                            <table id="tablaresumen" class="table table-bordered table-striped table-hover">
                                <thead class="{{$clase}}">
                                    <tr>
                                        <th>Atributo</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="tablacuerpo {{$texto}}">
                                        <td><strong>Acuenta</strong></td>
                                        <td><strong id="acuenta" >{{ $acuenta }} Bs.</strong></td>
                                    </tr>
                                    <tr class="tablacuerpo {{$texto}}">
                                        <td><strong>Saldo</strong></td>
                                        <td><strong id="saldo">{{$saldo}} Bs.</strong></td>
                                    </tr>
                                    <tr class="tablacuerpo {{$texto}}">
                                        <td><strong>Sueldo Total</strong></td>
                                        <td><strong id="total">{{$acuenta+$saldo}} Bs.</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>    
                <div class="row">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-header bg-primary">
                                Pagar empleado 
                                {{-- <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('periodable.ppagos.listar.view',$periodable->id)}}">Listar pagos</a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{route('periodable.pago.store',$periodable)}}" method="POST">
                                @csrf
                                @include('periodable.pago.formpago')
                                <div class="container-fluid h-100 mt-3"> 
                                    <div class="row w-100 align-items-center">
                                        <div class="col text-center">
                                            <button type="submit" id="guardarpago" class="btn btn-primary text-white btn-lg">Guardar <i class="far fa-save"></i></button>        
                                        </div>	
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                @isset($periodable)
                    <div class="card">
                        <div class="card-header">
                            ADELANTOS DE ESTE SUELDO
                        </div>
                        <div class="card-body">
                            <table id="tablapagos" class="table table-striped table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Monto</th>
                                        <th>Fecha</th>
                                        <th>Usuario</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                @endisset

            </div>
        </div>
        @include('periodable.pago.modales')
        @include('observacion.modalcreate')
@stop

@section('js')
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>

    <script src="{{asset('assets/js/addTempClass.js')}}"></script>
    <script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
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
            console.log(objeto_id+"tipe");
            $("#observable_id").val(objeto_id);
            $("#observable_type").val($(this).attr('id'));
            CKEDITOR.instances.editorguardar.setData("");
            console.log("Click en Observacion crear");
            $("#modal-agregar-observacion").modal("show");
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CLICK BOTON GUARDAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('#guardar-observacion').on('click', function (e) {
            e.preventDefault();
            console.log("click en guardar obsrvacion");
            let observable_id = $("#observable_id").val();
            console.log(observable_id+"ob_id");
            let observable_type = $("#observable_type").val();
            console.log(observable_type+"on_type");
            for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }
            observacion=$("#editorguardar").val();
            url = "../../../guardar/observacion"
            guardarObservacion(observacion,observable_id,observable_type,url);
            
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR OBSERVACIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.mostrarobservacionespago', function(e) {
            e.preventDefault();
                observable_id =$(this).closest('tr').attr('id');
                observable_type ="Pago";
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
        $(document).ready(function(){
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATA TABLE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        let tablapagos;
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE COMOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                tablapagos=$('#tablapagos').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":'../../../periodable/pagos/'+"{{$periodable->id}}",
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['id']); 
                            $('td',row).eq(2).html(moment(data['created_at']).format('DD-MM-YYYY h:m:s'));
                        },
                        "columns": [
                            {data:'id'},
                            {data:'monto'},
                            {data:'created_at'},
                            {data:'name'},
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],
                        "columnDefs": [
                            { responsivePriority: 1, targets: 1 },
                            { responsivePriority: 2, targets: -1 }
                        ],
                        //order: [[0, 'desc']],
                        "language":{
                            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                        },
                        "paging":   true,
                    }
                );
            $("table").on('click',".editarpago", function (e) {
                e.preventDefault();
                pago_id=$(this).closest('tr').attr('id');
                
                 
                 $.ajax({
                    url: "../../../pago/edicion/"+pago_id,
                   
                    success: function (result) {
                        console.log(result);
                        $("#montoedicion").val(result.monto);
                        $("#pagoconedicion").val(result.pagocon);
                        $("#cambioedicion").val(result.cambio);
                        $("#pago_idedicion").val(result.id);
                        $("#modal-editar-pago").modal('show');
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        mensajeErr();
                    }
                });
            });
            $("table").on('click',".eliminarpago", function (e) {
                e.preventDefault();
                registro_id=$(this).closest('tr').attr('id');
                console.log(registro_id);
                url="../../../eliminar/pago/periodable/"+registro_id;
                $.ajaxSetup({
                    headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    console.log(url);
                    Swal.fire({
                        title: 'Estas seguro(a) de eliminar este registro?',
                        text: "Si eliminas el registro no lo podras recuperar jamás!",
                        type: 'question',
                        showCancelButton: true,
                        showConfirmButton: true,
                        confirmButtonColor: '#25ff80',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Eliminar..!',
                        position: 'center',
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url: url,
                                type: 'DELETE',
                                data: {
                                    _token: $("meta[name='csrf-token']").attr("content"),
                                },
                                success: function (result) {
                                    console.log(result);
                                    
                                    $("#" + registro_id).remove();
                                    tablapagos.ajax.reload();
                                    mensajeGrande(result.mensaje, 'success', 2000);
                                    $("#acuenta").html(result.acuenta+" Bs.");
                                    $("#saldo").html(result.saldo+" Bs.");
                                    $("#total").html(result.total+" Bs.");
                                    $("#monto").val('');
                                    $("#pagocon").val('');
                                    $("#cambio").val('');
                                    
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    mensajeErr();
                                }
                            });
                        } else {
                            mensajePequenio('El registro NO se eliminó', 'error', 2000);
                        }
                    })
            });
/*%%%%%%%%%%%%%%%%%%%%%%%%% guardado con ajax %%%%%%%%%%%%%%%%%%%%%%*/
            $("#actualizarpago").on('click', function (e) {
                e.preventDefault();
                $("#erroresedicion").empty();
                $.ajax({
                    url: '../../../pago/periodable/update/ajax',
                    data:{
                        monto:$("#montoedicion").val(),
                        pagocon:$("#pagoconedicion").val(),
                        cambio:$("#cambioedicion").val(),
                        pago_id:$("#pago_idedicion").val(),
                        _token: $("meta[name='csrf-token']").attr("content"),
                    },
                    success: function (result) {
                       
                        html="";
                        $.each(result.errores, function(i, item) {
                            $.each(item, function(i, error) {
                                html+="<li>"+ item[0] +"</li>";
                                console.log(error);
                            });
                        });
                        $("#erroresedicion").append(html);

                        if (!result.errores){
                            $("#acuenta").html(result.acuenta+" Bs.");
                            $("#saldo").html(result.saldo+" Bs.");
                            $("#total").html(result.total+" Bs.");
                            $("#monto").val('');
                            $("#pagocon").val('');
                            $("#cambio").val('');
                            if(result.saldo>0){
                                $("#tablacuerpo").removeClass('text-success');
                                $("#tablacuerpo").addClass('text-danger');
                                $("thead").removeClass('bg-success');
                                $("thead").addClass('bg-danger');
                            }else{
                                $("#tablacuerpo").removeClass('text-danger');
                                $("#tablacuerpo").addClass('text-success');
                                $("thead").removeClass('bg-danger');
                                $("thead").addClass('bg-success');
                                $("#tablaresumen").addClass('text-success');
                            }
                            tablapagos.ajax.reload();
                             $("#modal-editar-pago").modal('hide');
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    }
                });
            });
/*%%%%%%%%%%%%%%%%%%%%%%%%% guardado con ajax %%%%%%%%%%%%%%%%%%%%%%*/
            $("#guardarpago").on('click', function (e) {
                e.preventDefault();
                $("#errores").empty();
                $.ajax({
                    url: '../../../pago/periodable/ajax',
                    data:{
                        monto:$("#monto").val(),
                        pagocon:$("#pagocon").val(),
                        cambio:$("#cambio").val(),
                        periodable_id:"{{$periodable->id}}",
                        periodable_type:"{{$periodable_type}}",
                    },
                    success: function (result) {
                        html="";
                        $.each(result.errores, function(i, item) {
                            $.each(item, function(i, error) {
                                html+="<li>"+ item[0] +"</li>";
                                console.log(error);
                            });
                        });
                        $("#errores").append(html);

                        if (!result.errores){
                            $("#acuenta").html(result.acuenta+" Bs.");
                            $("#saldo").html(result.saldo+" Bs.");
                            $("#total").html(result.total+" Bs.");
                            $("#monto").val('');
                            $("#pagocon").val('');
                            $("#cambio").val('');
                            if(result.saldo>0){
                                $("#tablacuerpo").removeClass('text-success');
                                $("#tablacuerpo").addClass('text-danger');
                                $("thead").removeClass('bg-success');
                                $("thead").addClass('bg-danger');
                            }else{
                                $("#tablacuerpo").removeClass('text-danger');
                                $("#tablacuerpo").addClass('text-success');
                                $("thead").removeClass('bg-danger');
                                $("thead").addClass('bg-success');
                                $("#tablaresumen").addClass('text-success');
                            }
                            tablapagos.ajax.reload();
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                    }
                });
            });

/*%%%%%%%%%%%%%%%%%%%%%%%%% JS PARA CALCULAR EL CAMBIO AUTOMATICAMENTE %%%%%%%%%%%%%%%%%%%%%%*/
            $('#pagocon').change(function(){
                $('#cambio').val($(this).val()-$('#monto').val());
            });
            $('#monto').change(function(){
                $('#cambio').val($('#pagocon').val()-$('#monto').val());
            });
            $('#pagoconedicion').change(function(){
                $('#cambioedicion').val($(this).val()-$('#montoedicion').val());
            });
            $('#montoedicion').change(function(){
                $('#cambioedicion').val($('#pagoconedicion').val()-$('#montoedicion').val());
            });
        });
    </script>    
@endsection