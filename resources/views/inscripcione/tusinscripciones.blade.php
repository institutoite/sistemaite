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
                    @include('inscripcione.modales')
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
{{-- <script src="{{asset('assets/js/observacion.js')}}"></script> --}}
    
    <script>
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
                    },
                    "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                        if (moment(data['fecha_proximo_pago']).format('YY-MM-DD')>moment().format('YY-MM-DD')){
                            $(row).addClass('text-success')
                        }else{
                            $(row).addClass('text-danger')
                        }
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
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },
                    // "info":     false, 
                    // "searching": false,
                    "paging":   true,
                }
            );
            $('#matriculacionesVigentes').dataTable(
                {
                    "serverSide":true,
                    "responsive":true,
                    "autoWidth":false,
                    "ajax":{ 
                        "url":'../tusmatriculaciones',
                        "data":{
                            estudiante_id:"{{$persona->estudiante->id }}",  //mandar computacion
                        },
                        // "success":function (result) {
                        //     console.log(result);
                        // },
                    },
                    "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                        if (moment(data['fecha_proximo_pago']).format('YY-MM-DD')>moment().format('YY-MM-DD')){
                            $(row).addClass('text-success table-success');
                        }else{
                            $(row).addClass('text-danger table-danger');
                        }
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

            

            CKEDITOR.replace('editor1', {
                height: 120,
                width: "100%",
                removeButtons: 'PasteFromWord'
            });

            $('table').on('click', '.observacion', function (e) {
                e.preventDefault();
                let objeto_id = $(this).closest('tr').attr('id');
                $("#observable_id").val(objeto_id);
                $("#observable_type").val('Inscripcione');
                console.log(objeto_id);
                //console.log(objeto_type);
                CKEDITOR.instances.editor1.setData("");
                $("#modal-agregar-observacion").modal("show");
            });

            $('#guardar-observacion').on('click', function (e) {
                e.preventDefault();
                let observable_id = $("#observable_id").val();
                let observable_type = $("#observable_type").val();
                for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }

                $.ajax({
                    url: "../guardar/observacion",
                    data: {
                        //obs: $("#observacionx").val(),
                        observacion: $("#editor1").val(),
                        observable_id: observable_id,
                        observable_type: observable_type,
                    },
                    success: function (json) {
                        console.log()
                        $("#" + observable_id).addTempClass('bg-success text-white', 3000);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        Toast.fire({
                            type: 'success',
                            title: "Guardado corectamente: " + json.observacion,
                        })
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-agregar-observacion").modal("hide");
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  OBSERVACION DE MATRICULACIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

            CKEDITOR.replace('editor2', {
                height: 120,
                width: "100%",
                removeButtons: 'PasteFromWord'
            });

            $('table').on('click', '.observacion-matriculacion', function (e) {
                e.preventDefault();
                let objeto_id = $(this).closest('tr').attr('id');
                $("#observable_id_matriculacion").val(objeto_id);
                $("#observable_type__matriculacion").val('Matriculacion');
                console.log(objeto_id);
                //console.log(objeto_type);
                CKEDITOR.instances.editor2.setData("");
                $("#modal-agregar-observacion-matriculacion").modal("show");
            });
            $('#guardar-observacion-matriculacion').on('click', function (e) {
                e.preventDefault();
                let observable_id = $("#observable_id_matriculacion").val();
                let observable_type = $("#observable_type_matriculacion").val();
                for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }

                $.ajax({
                    url: "../guardar/observacion",
                    data: {
                        //obs: $("#observacionx").val(),
                        observacion: $("#editor2").val(),
                        observable_id: observable_id,
                        observable_type: observable_type,
                    },
                    success: function (json) {
                        console.log()
                        $("#" + observable_id).addTempClass('bg-success text-white', 3000);
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        Toast.fire({
                            type: 'success',
                            title: "Guardado corectamente: " + json.observacion,
                        })
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-agregar-observacion-matriculacion").modal("hide");
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR OBSERVACIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                
            $('table').on('click', '.mostrarobservacionesinscripcion', function(e) {
                e.preventDefault();
                console.log('MostrarClick mostrarobservacionesinscripcion'); 
                observable_id =$(this).closest('tr').attr('id');
                console.log(observable_id);
                observable_type ="Inscripcion";
                    var fila=$(this).closest('tr');
                    $("#modal-mostrar-observaciones").modal("show");
                    $("#tabla-observaciones").empty();
                            $.ajax({
                            url :"../observaciones/general",
                            data:{
                                observable_id:observable_id,
                                observable_type:observable_type,
                            },
                            success : function(json) {
                                console.log(json);
                                $html="";
                                $clase="";
                                for (let j in json) {
                                    if(json[j].activo==1){
                                        $clase="text-success";
                                    }else{
                                        $clase="text-danger";    
                                    }
                                    $html+="<tr class='"+$clase+"'><td>"+ json[j].observacion +"</td>";
                                    $html+="<td>"+json[j].name+"</td>";
                                    $html+="<td>"+moment(json[j].created_at).format('LLL') +"</td>";
                                    $html+="<td>"+moment(json[j].updated_at).format('LLL') +"</td></tr>";
                                }
                                $("#tabla-observaciones").append($html);
                            },
                            error : function(xhr, status) {
                                alert('Disculpe, existió un problema');
                            },
                        });
                });
        
            
        } );
    </script>
@stop
