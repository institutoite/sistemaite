@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Motivos')
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
                                {{ __('Grados') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('grados.create') }}" class="btn btn-primary btn-sm float-right text-white"  data-placement="left">
                                    {{ __('Create Grado') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="grados" class="table table-striped table-hover table-borderless">
                                <thead class="">
                                    <tr>
                                        <th>No</th>
										<th>Grado</th>
										<th>Nivel</th>
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
    @include('grado.modales')
@endsection

@section('js')
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
    
    {{-- %%%%%%%%%%%%%% muestra el ok de la insersion de datos %%%%%%%%%%%%%%%%% --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                })
                Toast.fire({
                type: 'success',
                title: 'Se Inserto correctamente el registro'
            })
            </script>
        </div>
    @endif


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

        $(document).ready(function() {
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATA TABLE  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            let fila=1;
            $('#grados').dataTable({
                "responsive":true,
                "searching":true,
                "paging":   true,
                "autoWidth":false,
                "ordering": true,
                "info":     true,
                "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                    $('td', row).eq(0).html(fila++);
                },
                "ajax": "{{ url('api/grados')}}",
                "columns": [
                    {data: 'id'},
                    {data: 'grado'},
                    {data: 'nivel'},
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
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                },
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#grados').on('click', '.mostrar', function(e) {
                e.preventDefault(); 
                let id_grado =$(this).closest('tr').attr('id');
                console.log(id_grado);
                $.ajax({
                    url : "grado/mostrar/",
                    data : { id :id_grado },
                    success : function(json) {
                        // console.log(json);
                        $("#modal-mostrar").modal("show");
                        $("#tabla-mostrar").empty();
                        $html="";
                        $html+="<tr><td>ID</td>"+"<td>"+ json.grado.id +"</td></tr>";
                        $html+="<tr><td>GRADO</td>"+"<td>"+json.grado.grado+"</td></tr>";
                        $html+="<tr><td>NIVEL</td>"+"<td>"+json.nivel.nivel+"</td></tr>";
                        $html+="<tr><td>CREADO POR </td>"+"<td>"+json.user.name+"</td></tr>";
                        $html+="<tr><td>CREADO </td>"+"<td>"+ moment(json.grado.created_at).format('LLLL') +"</td></tr>";
                        $html+="<tr><td>ACTUALIZADO</td>"+"<td>"+moment(json.grado.updated_at).format('LLLL')+"</td></tr>";
                        $("#tabla-mostrar").append($html);
                    },
                    error : function(xhr, status) {

                        Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'Saque una captura para mostrar al servicio T??cnico!',
                        })
                    },
                });
            });
             /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO MOSTRAR EDITAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.editar', function(e) {
                e.preventDefault(); 
                let id_grado =$(this).closest('tr').attr('id');
                    $("#error_motivo").empty();

                    $.ajax({
                        url : "grado/editar/",
                        data : { id :id_grado },
                        success : function(json) {
                            console.log(json);
                            $("#modal-editar").modal("show");
                            $("#formulario-editar").empty();
                                $html="<div class='row'>";
                                $("#grado").val(json.grado.grado);
                                $("#grado_id").val(json.grado.id);
                                $htmlNiveles="";
                                for (let j in json.niveles) {
                                    $htmlNiveles+="<option value='"+ json.niveles[j].id +"'>"+json.niveles[j].nivel+"</option>";
                                }
                                $("#nivel_id").append($htmlNiveles);    
                                $("#formulario-editar").append($html);
                        },
                        error : function(xhr, status) {
                            Swal.fire({
                            type: 'error',
                            title: 'Ocurrio un Error',
                            text: 'Saque una captura para mostrar al servicio T??cnico!',
                            })
                        },  
                    });
            });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ACTUALIZAR ENVIO DE FORMULARIO PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $(document).on("submit","#formulario-editar-grado",function(e){
                e.preventDefault();//detenemos el envio
            
                $grado=$('#grado').val();
                $nivel_id=$('#nivel_id').val();
                $grado_id=$('#grado_id').val();
                console.log($grado_id);
                var token = $("input[name=_token]").val();
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : "grado/actualizar/",
                    headers:{'X-CSRF-TOKEN':token},
                    data:{
                            grado:$grado,
                            nivel_id:$nivel_id,
                            token:token,
                            grado_id:$grado_id,
                        },
                    success : function(json) {
                        if($.isEmptyObject(json.error)){
                            $("#message-error").addClass("d-none");
                            $("#modal-editar").modal("hide");
                            $('#grados').DataTable().ajax.reload();
                        }else{
                            $("#message-error").removeClass("d-none");
                            imprimeErrores(json);

                        }                        
                    },
                    error:function(jqXHR,estado,error){
                        
                    },
                });
            });

            function imprimeErrores(errores) {
                $htmlErrores="";
                for (let j in errores) {
                    for (let k in errores[j]) {
                        $htmlErrores+="<li>"+errores[j][k]+" x "+"</li>";
                    }
                }
                $("#error").append($htmlErrores);
                
                
            }
            
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% E L I M I N A R  M O T I V O %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
            $('#motivos').on('click','.eliminar',function (e) {
                e.preventDefault(); 
                 var id_motivo =$(this).closest('tr').attr('id');
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jam??s!",
                    type: 'question',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#26baa5',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: 'eliminar/motivo/'+id_motivo,
                            type: 'DELETE',
                            data:{
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(result) {
                                $('#motivos').DataTable().ajax.reload();
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                })
                                Toast.fire({
                                type: 'success',
                                title: 'Se elimin?? correctamente el registro'
                                })   
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                switch (xhr.status) {
                                    case 500:
                                        Swal.fire({
                                            title: 'No se complet?? esta operaci??n por que este registro est?? relacionado con otros registros',
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
                            type: 'error',
                            title: 'No se elimin?? el registro'
                        })
                    }
                })
            });

        });
    </script>

@endsection
