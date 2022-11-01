@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/mapa.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('title', 'Convenios')
@section('plugins.jquery', true)
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
            <div class="card-header">
                <div class="float-right">
                <a href="{{ route('convenio.create') }}" class="btn btn-primary btn-sm float-right text-white"  data-placement="left">
                    {{ __('Create convenio') }}
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="convenios" class="table table-hover table-striped table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Descripcion</th>
                        <th>Foto</th>
                        <th>Option</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> 
<script type="text/javascript" src="{{ asset('dist/js/jquery.leanModal.min.js')}}"></script>
<script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
<script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script>
        $(document).ready(function() {
            
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE COMOS %%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
               var tablaconvenios=$('#convenios').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{ 
                            "url":'listar/convenios',
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['id']); 
                        },
                        "columns": [
                            {data:'id'},
                            {data:'titulo'},
                            {data:'descripcion'},
                            {
                                "name": "foto",
                                "data": "foto",
                                "render": function (data, type, full, meta) {
                                    return "<img class='materialboxed zoomify' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\"/>";
                                },
                                "title": "FOTO",
                                "orderable": false,
                
                            },     
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],
                        //order: [[0, 'desc']],
                        "language":{
                            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                        },
                        "paging":   true,
                    }
                );
            //*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%    ELIMINAR     %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                 $('table').on('click','.eliminargenerico',function (e) {
                    e.preventDefault(); 
                    registro_id=$(this).closest('tr').attr('id');
                    console.log(registro_id);
                    eliminarRegistro(registro_id,'convenio',tablaconvenios);
                    
                });
        } );
        
    </script>
@endsection
