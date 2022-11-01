@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/mapa.css')}}">
@endsection

@section('title', 'Feriados')
@section('plugins.jquery', true)
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
            <div class="card-header">
                <div class="float-right">
                <a href="{{ route('feriados.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                    {{ __('Crear Feriado') }}
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="feriados" class="table table-striped table-hover">
                <thead class="thead">
                    <tr>
                        <th>No</th>
                        <th>Fecha</th>
                        <th>Festividad</th>
                        <th>Vigencia</th>
                        <th>Options</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection

{{-- --Feriados hacerlo con ajax -- --}}
@section('js')

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="{{asset('assets/js/eliminargenerico.js')}}"></script>
    <script src="{{asset('assets/js/mensajeAjax.js')}}"></script>
    <script>
        $(document).ready(function() {
        
            var tablaferiado=$('#feriados').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "ajax":"{{url('api/feriados')}}",
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']); 
                    },
                    "columns": [
                        {"data": 'id'},
                        {"data": "fecha"},     
                        {"data": "festividad"},     
                        {"data": "vigente"},     
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
                }
            );
/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% E L I M I N A R  P E R S O N A %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
            $('table').on('click','.eliminargenerico',function (e) {
                e.preventDefault(); 
                registro_id=$(this).closest('tr').attr('id');
                eliminarRegistro(registro_id,'feriado',tablaferiado);
            });
        } );
        
    </script>
@endsection
