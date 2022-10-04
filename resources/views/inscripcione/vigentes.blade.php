@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)

@section('title', 'Asistencia')
@section('content')
   
                <div class="card">
                    <div class="card-header bg-primary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inscripcione') }}
                            </span>

                            <div class="float-right">
                                
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="inscripciones_vigentes" class="table-bordered table-hover table-striped">
                                <thead class="thead">
                                    <tr>
										<th>Nombre</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
{{-- %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% TABLA MATRICULACION %%%%%%%%%%%%%%%%%%%%%%%%%% --}}
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Matriculaciones') }}
                            </span>

                            <div class="float-right">
                                {{-- <a href="{{ route('inscripciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Nueva Inscripción') }}
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="matriculaciones_vigentes" class="table-bordered table-hover table-striped">
                                <thead class="thead">
                                    <tr>
										<th>Nombre</th>
                                    </tr>
                                </thead>
                                
                            </table>
                        </div>
                    </div>
                </div>
            
   
@endsection
@section('js')
    <script>
    $(document).ready(function() {
        
        /* este codigo o algoritmo coloca falta a todas las clases anterior que no hayan sido marcados*/
        $.ajax({
            url : '../../programacion/asignarfalta/ajax',
            success : function(json) {
                //console.log(json);
            },
            error : function(xhr, status) {
                alert('Disculpe, existió un SXXX problema');
            },
        });
        $.ajax({
            url : '../../programacioncom/asignarfalta/ajax',
            success : function(json) {
               // console.log(json);
            },
            error : function(xhr, status) {
                alert('Disculpe, existió un SXXX problema');
            },
        });


        $('#inscripciones_vigentes').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false, 
                    "ajax": {
                            "url":"{{ url('inscripciones/vigentes/ajax')}}",
                            // "success": function(result) {
                            //     console.log(result);
                            // },
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['id']); // agrega dinamiacamente el id del row

                            $.ajax({
                                url : '../../programacion/asistencia/ajax',
                                data : { inscripcione_id : data['id'] },
                                type : 'GET',
                                dataType : 'json',
                                success : function(json) {
                                    $.each(json, function(i, item) {
                                        var clase=ConfiguraClase(item.estado.charAt(0));
                                        if (item.estado.charAt(0)=='I'){
                                            $("#"+data['id']).append("<td>"+ "&nbsp" +"</td>")
                                        }else{
                                            $("#"+data['id']).append("<td>"+ item.estado.charAt(0) +"</td>")
                                        }
                                        $("#"+data['id']).find("td:last").addClass(clase);
                                        
                                    });
                                },
                                error : function(xhr, status) {
                                    alert('Disculpe, existió un problema normal');
                                },
                            });
                        },
                    "columns": [
                        {data:'nombre'},
						
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },  
                }
            );
        $('#matriculaciones_vigentes').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false, 
                    "ajax": {
                            "url":"{{ url('matriculaciones/vigentes/ajax')}}",
                            // "success": function(result) {
                            //     console.log(result);
                            // },
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['id']+"com"); // agrega dinamiacamente el id del row

                            $.ajax({
                                url : '../../programacioncom/asistencia/ajax',
                                data : { matriculacion_id : data['id'] },
                                type : 'GET',
                                dataType : 'json',
                                success : function(json) {
                                    $.each(json, function(i, item) {
                                        var clase=ConfiguraClase(item.estado.charAt(0));
                                        if (item.estado.charAt(0)=='I'){
                                            $("#"+data['id']+"com").append("<td>"+ "&nbsp" +"</td>")
                                        }else{
                                            $("#"+data['id']+"com").append("<td>"+ item.estado.charAt(0) +"</td>")
                                        }
                                        $("#"+data['id']+"com").find("td:last").addClass(clase);
                                        
                                    });
                                },
                                error : function(xhr, status) {
                                    alert('Disculpe, existió un problema com');
                                },
                            });
                        },
                    "columns": [
                        {data:'nombre'},
						
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },  
                }
            );

            function ConfiguraClase(unEstado) {
                var clase="";
                    if(unEstado =="P"){
                        clase="text-success p-1";
                    }
                    if(unEstado =="F"){
                        clase="text-danger p-1";
                    }
                    if(unEstado =="L"){
                        clase="text-blue p-1";
                    }
                    if(unEstado =="I"){
                        clase="text-gray p-1"; 
                    }
                return clase;
            }

            
        } );
    </script>
@stop




{{-- // $('table').on('click','.eliminar',function (e) {
            //     e.preventDefault(); 
            //     id=$(this).parent().parent().parent().find('td').first().html();
            //     Swal.fire({
            //         title: 'Estas seguro(a) de eliminar este registro?',
            //         text: "Si eliminas el registro no lo podras recuperar jamás!",
            //         icon: 'question',
            //         showCancelButton: true,
            //         showConfirmButton:true,
            //         confirmButtonColor: '#25ff80',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Eliminar..!',
            //         position:'center',        
            //     }).then((result) => {
            //         if (result.value) {
            //             $.ajax({
            //                 url: 'eliminar/inscripcion/'+id,
            //                 type: 'DELETE',
            //                 data:{
            //                     id:id,
            //                     _token:'{{ csrf_token() }}'
            //                 },
            //                 success: function(result) {
            //                     tabla.ajax.reload();
            //                     const Toast = Swal.mixin({
            //                     toast: true,
            //                     position: 'top-end',
            //                     showConfirmButton: false,
            //                     timer: 1500,
            //                     timerProgressBar: true,
            //                     didOpen: (toast) => {
            //                         toast.addEventListener('mouseenter', Swal.stopTimer)
            //                         toast.addEventListener('mouseleave', Swal.resumeTimer)
            //                     }
            //                     })
            //                     Toast.fire({
            //                     icon: 'success',
            //                     title: 'Se eliminó correctamente el registro'
            //                     })   
            //                 },
            //                 error: function (xhr, ajaxOptions, thrownError) {
            //                     switch (xhr.status) {
            //                         case 500:
            //                             Swal.fire({
            //                                 title: 'No se pudo eliminar el registro Codigo error:500',
            //                                 showClass: {
            //                                     popup: 'animate__animated animate__fadeInDown'
            //                                 },
            //                                 hideClass: {
            //                                     popup: 'animate__animated animate__fadeOutUp'
            //                                 }
            //                             })
            //                             break;
                                
            //                         default:
            //                             break;
            //                     }
                                
            //                 }
            //             });
            //         }else{
            //             const Toast = Swal.mixin({
            //                 toast: true,
            //                 position: 'top-end',
            //                 showConfirmButton: false,
            //                 timer: 4000,
            //                 timerProgressBar: true,
            //                 onOpen: (toast) => {
            //                     toast.addEventListener('mouseenter', Swal.stopTimer)
            //                     toast.addEventListener('mouseleave', Swal.resumeTimer)
            //                 }
            //             })

            //             Toast.fire({
            //                 icon: 'error',
            //                 title: 'No se eliminó el registro'
            //             })
            //         }
            //     })
            // }); --}}
