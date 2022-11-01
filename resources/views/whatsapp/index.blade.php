@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Mensajes')
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
                                {{ __('Mensajes para enviar') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('mensaje.create') }}" class="btn btn-primary btn-sm float-right text-white"  data-placement="left">
                                    {{ __('Crear Mensaje Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    

                    <div class="card-body">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading"><i class="fas fa-exclamation-triangle text-danger"></i>No eliminar</h4>
                            <strong>Solo!</strong> puedes editar los mensajes por que estan reservados para la automatizacion 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <hr>
                            <ol>
                                <li>Cumpleañeros</li>
                                <li>Faltones clases</li>
                                <li>Faltones Computacion</li>
                                <li>Saludo general</li>
                                <li>Mensaje para enviar masivamente</li>
                            </ol>
                                
                            <hr>
                            %0A salto de linea %20 Espacio ~ Tachado  * Negrita _Cursiva
                        </div>

                        <div class="table-responsive">
                            <table id="mensajes" class="table table-striped table-hover table-borderless">
                                <thead class="">
                                    <tr>
                                        <th>No</th>
										<th>nombre</th>
										<th>Mensaje</th>
										<th>Vigente</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>

    {{-- %%%%%%%%%%%%%% muestra el ok de la insersion de datos %%%%%%%%%%%%%%%%% --}}
    


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
            let tablamensajes=$('#mensajes').dataTable({
                "responsive":true,
                "searching":true,
                "paging":   true,
                "autoWidth":false,
                "ordering": true,
                "info":     true,
                "createdRow": function( row, data, dataIndex ) {
                    $(row).attr('id',data['id']); 
                    if(data['vigente']==1){
                        $(row).addClass('text-success');
                        $('td', row).eq(3).html('Si');
                    }else{
                        $('td', row).eq(3).html('No');
                        $(row).addClass('text-danger');
                    }
                },
                "ajax": "{{ url('listar/mensajes') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'nombre'},
                    {data: 'mensaje'},
                    {data: 'vigente'},
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

           /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DA DE BAJA UNA OBSERVACION UTILIZA AJAX %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.bajamensaje', function (e) {
                e.preventDefault();
                let mensaje_id = $(this).closest('tr').attr('id');
                console.log("id"+mensaje_id);
                $.ajax({
                    url: "darbaja/mensaje",
                    data: {
                        //obs: $("#observacionx").val(),
                        mensaje_id: mensaje_id,
                    },
                    success: function (json) {
                        $("#" + mensaje_id).addTempClass('bg-danger', 3000);
                        $('#mensajes').DataTable().ajax.reload();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        Toast.fire({
                            type: 'success',
                            title: json.mensaje,
                        })

                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });
        
        /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DA DE ALTA UNA OBSERVACION QUE ESTA CON BAJA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.altamensaje', function (e) {
            e.preventDefault();
            let mensaje_id = $(this).closest('tr').attr('id');
            console.log(mensaje_id);
            $.ajax({
                url: "daralta/mensaje",
                data: {
                    //obs: $("#mensajex").val(),
                    mensaje_id: mensaje_id,
                },
                success: function (json) {
                    $("#" + mensaje_id).addTempClass('bg-success', 3000);
                    $('#mensajes').DataTable().ajax.reload();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    Toast.fire({
                        type: 'success',
                        title: json.mensaje,
                    })
                },
                error: function (xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });
        });

            
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% E L I M I N A R  M O T I V O %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
            $('table').on('click','.eliminargenerico',function (e) {
                e.preventDefault(); 
                registro_id=$(this).closest('tr').attr('id');
                eliminarRegistro(registro_id,'mensaje',tablamensajes);
            });
            
        });
    </script>

@endsection
