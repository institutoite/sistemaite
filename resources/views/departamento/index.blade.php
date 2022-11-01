@extends('adminlte::page')

@section('title', 'Departamentos')
@section('plugins.Jquery', true)
@section('plugins.Sweetalert2', true)
@section('plugins.Datatables', true)
@section('plugins.Datatables',true)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Departamento') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('departamentos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Create Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="departamentos" class="table table-bordered table-striped table-hover">
                                <thead class="thead bg-primary">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Departamento</th>

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

    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script>
    $(document).ready(function() {
        var tabladepartamento=$('#departamentos').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,

                    "ajax": "{{ url('api/departamentos') }}",
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']);
                    },
                    "columns": [
                        {data: 'id'},
                        {data:'departamento'},
                        {data: 'btn'},
                    ],
                    "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    }  
                }
            );
        $('table').on('click','.eliminargenerico',function (e) {
            e.preventDefault(); 
            registro_id=$(this).closest('tr').attr('id');
            eliminarRegistro(registro_id,'departamento',tabladepartamento);
        });

        } );
    </script>
@stop
