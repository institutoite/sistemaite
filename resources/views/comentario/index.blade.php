@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Comentarios')
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
                                {{ __('Comentarios escritos desde la Web') }}
                            </span>
                        </div>
                    </div>
                    

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="comentarios" class="table table-striped table-hover table-borderless">
                                <thead class="">
                                    <tr>
                                        <th>No</th>
										<th>nombre</th>
										<th>telefono</th>
										<th>Intereses</th>
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
     @include('observacion.modalcreate')
@endsection

@section('js')
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
      
    <script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>
    <script src="{{asset('assets/js/observacion.js')}}"></script>
    
    {{-- %%%%%%%%%%%%%% muestra el ok de la insersion de datos %%%%%%%%%%%%%%%%% --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
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
            let tabla=$('#comentarios').dataTable({
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
                        // $('td', row).eq(3).html('Si');
                    }else{
                        // $('td', row).eq(3).html('No');
                        $(row).addClass('text-danger');
                    }
                        let str = data['interests'];
                        let vector_intereses = str.split(',');
                            vector_intereses
                        $html="<ol>";
                            $.each(vector_intereses, function( index, value ) {
                                $html+="<li>"+value+"</li>";
                            });
                        $html+="</ol>";
                        
                        $('td', row).eq(3).html($html);
                },
                "ajax": "{{ url('listar/comentarios') }}",
                "columns": [
                    {data: 'id'},
                    {data: 'nombre'},
                    {data: 'telefono'},
                   
                    {data: 'interests'},
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

           /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DA DE BAJA UNA OBSERVACION UTILIZA AJAX %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.bajacomentario', function (e) {
                e.preventDefault();
                let comentario_id = $(this).closest('tr').attr('id');
                $.ajax({
                    url: "darbaja/comentario",
                    data: {
                        //obs: $("#observacionx").val(),
                        comentario_id: comentario_id,
                    },
                    success: function (json) {
                        $("#" + comentario_id).addTempClass('bg-danger', 3000);
                        $('#comentarios').DataTable().ajax.reload();
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
        $('table').on('click', '.altacomentario', function (e) {
            e.preventDefault();
            let comentario_id = $(this).closest('tr').attr('id');
            $.ajax({
                url: "daralta/comentario",
                data: {
                    //obs: $("#comentariox").val(),
                    comentario_id: comentario_id,
                },
                success: function (json) {
                    $("#" + comentario_id).addTempClass('bg-success', 3000);
                    $('#comentarios').DataTable().ajax.reload();
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
            $('#comentarios').on('click','.eliminar',function (e) {
                e.preventDefault(); 
                 var comentario_id =$(this).closest('tr').attr('id');
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jamás!",
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
                            url: 'eliminar/comentario/'+comentario_id,
                            type: 'DELETE',
                            data:{
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(result) {
                                $('#comentarios').DataTable().ajax.reload();
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                })
                                Toast.fire({
                                type: 'success',
                                title: 'Se eliminó correctamente el registro'
                                })   
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                switch (xhr.status) {
                                    case 500:
                                        Swal.fire({
                                            title: 'No se completó esta operación por que este registro está relacionado con otros registros',
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
                            title: 'No se eliminó el registro'
                        })
                    }
                })
            });

        });
    </script>

@endsection
