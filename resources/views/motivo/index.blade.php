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
                                {{ __('Archivos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('motivos.create') }}" class="btn btn-primary btn-sm float-right text-white"  data-placement="left">
                                    {{ __('Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="motivos" class="table table-striped table-hover table-borderless">
                                <thead class="">
                                    <tr>
                                        <th>No</th>
										<th>motivo</th>
										<th>tipo</th>
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
    @include('motivo.modales')
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
            let fila=1;
            var tablamotivos=$('#motivos').dataTable({
                "responsive":true,
                "searching":true,
                "paging":   true,
                "autoWidth":false,
                "ordering": true,
                "info":     true,
                "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                },
                "ajax": "{{ url('listar/motivos') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'motivo'},
                    {data: 'tipomotivo'},
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
            $('#motivos').on('click', '.mostrar', function(e) {
                e.preventDefault(); 
                let motivo_id =$(this).closest('tr').attr('id');
                
                //var fila=$(this).json;
                $.ajax({
                    url : "motivo/mostrar/",
                    data : { id :motivo_id },
                    success : function(json) {
                        console.log(json);
                        $("#modal-mostrar").modal("show");
                        $("#tabla-mostrar").empty();
                        $html="";
                        $html+="<tr><td>ID</td>"+"<td>"+ json.motivo.id +"</td></tr>";
                        $html+="<tr><td>MOTIVO</td>"+"<td>"+json.motivo.motivo+"</td></tr>";
                        $html+="<tr><td>TIPO MOTIVO</td>"+"<td>"+json.tipomotivo.tipomotivo+"</td></tr>";
                        $html+="<tr><td>CREADO POR </td>"+"<td>"+json.user.name+"</td></tr>";
                        $html+="<tr><td>CREADO</td>"+"<td>"+ moment(json.motivo.created_at).format('LLLL') +"</td></tr>";
                        $html+="<tr><td>ACTUALIZADO</td>"+"<td>"+moment(json.motivo.updated_at).format('LLLL')+"</td></tr>";
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
                let id_motivo =$(this).closest('tr').attr('id');
                $("#error_motivo").empty();
                    $.ajax({
                    url : "motivo/editar/",
                    data : { id :id_motivo },
                    success : function(json) {
                        $("#modal-editar").modal("show");
                        $("#formulario-editar").empty();
                        $("#tipomotivo_id").empty();
                            $html="<div class='row'>";
                            $("#motivo").val(json.motivo.motivo);
                            $("#motivo_id").val(json.motivo.id);
                            $html="<option value=''>Seleccione un motivo</option>";
                            for (let j in json.tipomotivos) {
                                if(json.tipomotivos[j].id==json.motivo.tipomotivo_id){
                                    $html+="<option  value='"+json.tipomotivos[j].id +"' selected >"+json.tipomotivos[j].tipomotivo+"</option>";
                                }else{
                                    $html+="<option  value='"+json.tipomotivos[j].id +"'>"+json.tipomotivos[j].tipomotivo+"</option>";
                                }
                            }
                            
                            $('#tipomotivo_id').append($html);

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
            
                $motivo=$('#motivo').val();
                $motivo_id=$('#motivo_id').val();
                $tipomotivo_id=$('#tipomotivo_id').val();
                var token = $("input[name=_token]").val();
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : "motivo/actualizar/",
                    headers:{'X-CSRF-TOKEN':token},
                    data:{
                            motivo:$motivo,
                            tipomotivo_id:$tipomotivo_id,
                            id:$motivo_id,
                            token:token,
                        },
                    success : function(json) {
                        if(json.error){
                        $("#error_motivo").html(json.error);
                        }else{
                            $("#modal-editar").modal("hide");
                            $('#motivos').DataTable().ajax.reload();
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
                        
                    },
                });
            });
            
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% E L I M I N A R  M O T I V O %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
            $('table').on('click','.eliminargenerico',function (e) {
                e.preventDefault(); 
                registro_id=$(this).closest('tr').attr('id');
                eliminarRegistro(registro_id,'motivo',tablamotivos);
            });

        });
    </script>

@endsection
