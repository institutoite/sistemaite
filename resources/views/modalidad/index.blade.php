@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Listar Mododocente')
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
                                {{ __('Modalidades') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('modalidads.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Crear Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div id="temporal" class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="modalidades" class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Modalidad</th>
										<th>Costo</th>
										<th>Cargahoraria</th>

                                        <th></th>
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
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script>
    $(document).ready(function() {
        var tablamodalidades=$('#modalidades').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,

                    "ajax": "{{ url('api/modalidades') }}",
                    "createdRow": function(row, data, dataIndex) {
                        $(row).attr('id', data['id']);
                    },
                    "columns": [
                        {data: 'id'},
                        {data: 'modalidad'},
                        {data:'costo'},
                        {data:'cargahoraria'},
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
                eliminarRegistro(registro_id,'modalidad',tablamodalidades);
            });
       
        } );

        
    </script>
@stop