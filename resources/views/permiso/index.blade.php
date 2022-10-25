@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Permisos')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Listado de Permisos') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('permiso.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Nuevo Permiso') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="permisos" class="table table-striped table-hover">
                                <thead class="thead bg-primary">
                                    <tr>
                                        <th>No</th>
										<th>Permisos</th>
										<th>Guard Name</th>
										<th>Creado</th>
										<th>Actualizado</th>
                                        <th>Acciones</th>
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
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script>
    $(document).ready(function() {
        var tablanivel=$('#permisos').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']); 
                        $('td',row).eq(3).html(moment(data['created_at']).format('DD-MM-YYYY'));
                        $('td',row).eq(4).html(moment(data['updated_at']).format('DD-MM-YYYY'));
                    },
                    "ajax": "{{ url('listar/permisos') }}",
                    "columns": [
                        {data: 'id'},
                        {data: 'name'},
                        {data: 'guard_name'},
                        {data: 'created_at'},
                        {data: 'updated_at'},
                        {data: 'btn'},
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    }  
                }
            );
        
            $('table').on('click','.eliminargenerico',function (e) {
                e.preventDefault(); 
                registro_id=$(this).closest('tr').attr('id');
                eliminarRegistro(registro_id,'permiso',tablanivel);
            });
            
        } );
    </script>
@stop