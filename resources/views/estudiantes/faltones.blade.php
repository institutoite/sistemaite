@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop
@section('title', 'Faltones')
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
                <table id="inscripcionfaltones" class="table table-striped table-hover">
                    <thead class="thead">
                        <tr>
                            <th>#</th>
                            <th>NOMBRE</th>
                            <th>APELLIDOP</th>
                            <th>APELLIDOM</th>
                            <th>TELEFONO</th>
                            <th>USUARIO</th>
                            <th>OPTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody> 
                </table>
            </div>
        </div>
    </div>
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
            let tabla=$('#inscripcionfaltones').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "ajax":{ 
                        "url":'estudiante/faltones',
                    },
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']); 
                    },
                    ->select('personas.id','nombre','apellidop','apellidom','telefono','foto')
                    "columns": [
                        {data:'nombre'},
                        {data:'apellidop'},
                        {data:'apellidom'},
                        {data:'telefono'},
                        {data:'telefono'},
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
