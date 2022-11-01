@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Grados')
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
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>


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
            // let fila=1;
            var tablagrados=$('#grados').dataTable({
                "responsive":true,
                "searching":true,
                "paging":   true,
                "autoWidth":false,
                "ordering": true,
                "info":     true,
                "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
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
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                },
            });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#grados').on('click', '.mostrar', function(e) {
                e.preventDefault(); 
                let id_grado =$(this).closest('tr').attr('id');
                $.ajax({
                    url : "grado/mostrar/",
                    data : { id :id_grado },
                    success : function(json) {
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
                        text: 'Saque una captura para mostrar al servicio Técnico!',
                        })
                    },
                });
            });
             /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% INICIO MOSTRAR EDITAR PROGRAMACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.editar', function(e) {
                e.preventDefault(); 
                let id_grado =$(this).closest('tr').attr('id');
                   $("#message-error").addClass('d-none');
                    $("#error").empty();
                    $.ajax({
                        url : "grado/editar/",
                        data : { id :id_grado },
                        success : function(json) {
                            $("#modal-editar").modal("show");
                            $("#formulario-editar").empty();
                                $html="<div class='row'>";
                                $("#grado").val(json.grado.grado);
                                $("#grado_id").val(json.grado.id);
                                $htmlNiveles="";
                                for (let j in json.niveles) {
                                    if(json.niveles[j].id==json.grado.nivel_id)
                                        $htmlNiveles+="<option selected value='"+ json.niveles[j].id +"'>"+json.niveles[j].nivel+"</option>";
                                    else
                                        $htmlNiveles+="<option value='"+ json.niveles[j].id +"'>"+json.niveles[j].nivel+"</option>";
                                }
                                $("#nivel_id").append($htmlNiveles);    
                                $("#formulario-editar").append($html);
                                //$("#grados").
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
            $(document).on("submit","#formulario-editar-grado",function(e){
                e.preventDefault();//detenemos el envio
            
                $grado=$('#grado').val();
                $nivel_id=$('#nivel_id').val();
                $grado_id=$('#grado_id').val();
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
                        console.log(json);
                        if($.isEmptyObject(json.error)){
                            $("#message-error").addClass("d-none");
                            $("#modal-editar").modal("hide");
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
                        }else{
                            $("#message-error").removeClass("d-none");
                            imprimeErrores(json);
                        }  
                        $('#grados').DataTable().ajax.reload();
                        
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
                $("#error").empty();
                $("#error").append($htmlErrores);
                
                
            }
            
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% E L I M I N A R  M O T I V O %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
            $('table').on('click','.eliminargenerico',function (e) {
                e.preventDefault(); 
                registro_id=$(this).closest('tr').attr('id');
                console.log(registro_id);
                eliminarRegistro(registro_id,'grado',tablagrados);
            });


        });
    </script>

@endsection
