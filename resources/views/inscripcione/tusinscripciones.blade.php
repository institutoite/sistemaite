@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop
@section('title', 'Mis Inscripciones')

@section('plugins.Jquery',true)
@section('plugins.SweetAlert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
        <div class="card-header bg-primary" >
            <div style="display: flex; justify-content: space-between; align-items: center;">

                <span id="card_title">
                    {{ __('Inscripciones VIGENTES de: ')}} <strong> {{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom }}</strong>
                </span>

                <div class="float-right">
                    <a href="{{ route('inscribir',$persona) }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                    {{ __('Inscribir') }} <i class="fa fa-plus-circle text-white"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="inscripcionesVigentes" class="table table-striped table-hover">
                    <thead class="thead">
                        <tr>
                            <th>#</th>
                            <th>Objetivo</th>
                            <th>PAGO</th>
                            <th>Fecha Pago</th>
                            <th>Modalidades</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
    @if($persona->computacion)
        <div class="card"> 
            <div class="card-header bg-primary" >
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    <span id="card_title">
                        {{ __('MATRICULACIOENS VIGENTES de: ')}} <strong> {{$persona->nombre.' '.$persona->apellidop.' '.$persona->apellidom }}</strong>
                    </span>

                    <div class="float-right">
                        <a href="{{route('miscarreras.listar',$persona->computacion)}}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                        {{ __('Matricular') }} <i class="fa fa-plus-circle text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="matriculacionesVigentes" class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>#</th>
                                <th>Objetivo</th>
                                <th>acuenta</th>
                                <th>costo</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                    @include('observacion.modalcreate')
                    {{-- @include('inscripcione.modales') --}}
                    {{-- @include('observacion.modaleditar') --}}
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
<script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
<script src="{{asset('dist/js/moment.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
        $('table').on('click', '.mostrarobservacionesinscripcion', function(e) {
            e.preventDefault();
                observable_id =$(this).closest('tr').attr('id');
                console.log(observable_id);
                observable_type ="Inscripcione";
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

        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%       JS MATRICULACION   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

       
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR OBSERVACIONES MATRICULACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.mostrarobservacionesmatriculacion', function(e) {
            e.preventDefault();
                observable_id =$(this).closest('tr').attr('id');
                console.log(observable_id);
                observable_type ="Matriculacion";
                url="../observaciones/" + observable_id + "/" + observable_type,
                console.log(url);
                mostrarCrudObservaciones(url);
                $("#modal-mostrar-observaciones").modal("show");
        });
       

        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%       JS GENERAL       %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        
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
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE INSCRIPCIONES VIGENTES %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            let tabla=$('#inscripcionesVigentes').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "ajax":{ 
                        "url":'../tusinscripciones',
                        "data":{
                            estudiante_id:"{{ $persona->estudiante->id }}",
                        },
                        // "success":function(json) {
                        //     console.log(json);
                        // }
                    },
                    "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                        if (moment(data['fecha_proximo_pago']).format('YY-MM-DD')>moment().format('YY-MM-DD')){
                            $(row).addClass('text-success')
                            
                        }else{
                            $(row).addClass('text-success')
                            $('td', row).eq(2).addClass('text-danger');
                            $('td', row).eq(3).addClass('text-danger');
                        }

                        if (data['vigente']==0){
                            $(row).addClass('table-danger text-white')
                        }
                        $clase="";
                        switch (data['estado']) {
                            case "RESERVADO":
                                $clase="warning text-warning";
                                $icono="<i class='fas fa-exclamation-triangle'></i>";
                                break;
                            case "CORRIENDO":
                                $clase="success text-success";
                                $icono="<i class='fas fa-running'></i>";
                                break;
                            case "CONGELADO":
                                $clase="secondary text-secondary";
                                $icono="<i class='fas fa-stop'></i>";
                                break;
                            case "FINALIZADO":
                                $clase="success text-success";
                                $icono="<i class='fas fa-hourglass-end'></i>";
                                break;
                            case "DESVIGENTE":
                                $clase="danger text-danger";
                                $icono="<i class='fas fa-user-lock'></i>";
                                break;
                            default:
                                $clase="danger text-danger";
                                $icono="<i class='fas fa-info-circle'></i>";
                                break;
                        }

                        $('td', row).eq(1).html(data['objetivo']+"</br><div class='alert alert-" +$clase+" d-flex align-items-center'>"+$icono+ "&nbsp;"+data['estado'] +"</div>");
                            $.ajax({
                                url:"{{url('saldo/inscripcion')}}",
                                data:{inscripcion_id:data['id']},
                                success : function(json) {
                                      
                                    $('td', row).eq(2).html('<strong>Acuenta: </strong>'+json.acuenta+'<br>'+'<strong>Costo: </strong>'+json.costo+'<br><strong>Saldo: </strong>'+json.saldo);  
                                    $('td', row).eq(3).html(json.fechaHumamizado+'<br>'+moment(data['fecha_proximo_pago']).format('DD-MM-YYYY'));  
                                },
                            }); 
                    },
                    "columns": [
                        {data:'id'},
                        {data:'objetivo'},
                        {data:'costo'},
                        {data:'fecha_proximo_pago'},
                        {data:'modalidad'},
                        {
                            "name":"btn",
                            "data": 'btn',
                            "orderable": false,
                        },
                    ],
                    order: [[0, 'desc']],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },
                    "paging":   true,
                }
            );
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE MATRICULACIONES VIGENTES %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/    
            var tablamatriculaciones=$('#matriculacionesVigentes').dataTable(
                {
                    "serverSide":true,
                    "responsive":true,
                    "autoWidth":false,
                    "ajax":{ 
                        "url":'../tusmatriculaciones',
                        "data":{
                            estudiante_id:"{{$persona->estudiante->id }}",  //mandar computacion
                        },
                    },
                    "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                        if (moment(data['fecha_proximo_pago']).format('YY-MM-DD')>moment().format('YY-MM-DD')){
                            $(row).addClass('text-success')
                        }else{
                            $(row).addClass('text-success')
                            $('td', row).eq(2).addClass('text-danger');
                            $('td', row).eq(3).addClass('text-danger');
                        }
                        if (data['vigente']==0){
                            $(row).addClass('table-danger text-white')
                        }
                         $clase="";
                        switch (data['estado']) {
                            case "RESERVADO":
                                $clase="warning text-warning";
                                $icono="<i class='fas fa-exclamation-triangle'></i>";
                                break;
                            case "CORRIENDO":
                                $clase="success text-success";
                                $icono="<i class='fas fa-running'></i>";
                                break;
                            case "CONGELADO":
                                $clase="secondary text-secondary";
                                $icono="<i class='fas fa-stop'></i>";
                                break;
                            case "FINALIZADO":
                                $clase="success text-success";
                                $icono="<i class='fas fa-hourglass-end'></i>";
                                break;
                            case "DESVIGENTE":
                                $clase="danger text-danger";
                                $icono="<i class='fas fa-user-lock'></i>";
                                break;
                            default:
                                $clase="danger text-danger";
                                $icono="<i class='fas fa-info-circle'></i>";
                                break;
                        }

                        $('td', row).eq(1).html(data['asignatura']+"</br><div class='alert alert-" +$clase+" d-flex align-items-center'>"+ $icono+ "&nbsp;"+data['estado'] +"</div>");
                            $.ajax({
                                url:"{{url('saldo/matriculacion')}}",
                                data:{matriculacion_id:data['id']},
                                success : function(json) {
                                    $('td', row).eq(2).html('<strong>Acuenta:</strong>'+json.acuenta+'<br>'+'<strong>Costo: </strong>'+json.costo+'<br><strong>Saldo: </strong>'+json.saldo);  
                                    $('td', row).eq(3).html(json.fechaHumamizado+'<br>'+moment(data['fecha_proximo_pago']).format('DD-MM-YYYY'));  
                                },
                            }); 
                    },
                    "columns": [
                        {data:'id'},
                        {data:'asignatura'},
                        {data:'costo'},
                        {data:'fecha_proximo_pago'},
                        {
                            "name":"btn",
                            "data": 'btn',
                            "orderable": false,
                        },
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },
                    "info":false, 
                    "searching":false,
                    "paging":true, 
                }
            );
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%  ELIMINAR INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click','.eliminarinscripcion',function (e) {
                e.preventDefault(); 
                id=$(this).parent().parent().parent().find('td').first().html();
                //console.log(id);
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jamás!",
                    icon: 'question',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#25ff80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '../eliminar/inscripcion/'+id,
                            type: 'DELETE',
                            data:{
                                id:id,
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(result) {
                                tabla.ajax.reload();
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                                })
                                Toast.fire({
                                icon: 'success',
                                title: 'Se eliminó correctamente el registro'
                                })   
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                switch (xhr.status) {
                                    case 500:
                                        Swal.fire({
                                            title: 'No se pudo eliminar el registro Codigo error:500',
                                            showClass: {
                                                popup: 'animate__animated animate__fadeInDown'
                                            },
                                            hideClass: {
                                                popup: 'animate__animated animate__fadeOutUp'
                                            }
                                        })
                                        break;
                                
                                    default:
                                        break;
                                }
                                
                            }
                        });
                    }else{
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'error',
                            title: 'No se eliminó el registro'
                        })
                    }
                })
            });            
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%  ELIMINAR MATRICULACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click','.eliminarmatriculacion',function (e) {
                e.preventDefault(); 
                id=$(this).parent().parent().parent().find('td').first().html();
                //console.log(id);
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jamás!",
                    icon: 'question',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#25ff80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '../eliminar/matriculacion/'+id,
                            type: 'DELETE',
                            data:{
                                id:id,
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(result) {
                                console.log(result);
                                tablamatriculaciones.api().ajax.reload();
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                                })
                                Toast.fire({
                                icon: 'success',
                                title: 'Se eliminó correctamente el registro'
                                })   
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                switch (xhr.status) {
                                    case 500:
                                        Swal.fire({
                                            title: 'No se pudo eliminar el registro Codigo error:500',
                                            showClass: {
                                                popup: 'animate__animated animate__fadeInDown'
                                            },
                                            hideClass: {
                                                popup: 'animate__animated animate__fadeOutUp'
                                            }
                                        })
                                        break;
                                
                                    default:
                                        break;
                                }
                                
                            }
                        });
                    }else{
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast.fire({
                            icon: 'error',
                            title: 'No se eliminó el registro'
                        })
                    }
                })
            });            
        } );
    </script>
@stop
