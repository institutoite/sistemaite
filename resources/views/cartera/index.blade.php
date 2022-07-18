@extends('adminlte::page')
@section('css')
    {{-- <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
    
@stop

@section('title', 'Aula')
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
                                {{ __('Colegio') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('colegios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    {{ __('Create Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="inscripciones" class="table table-striped table-hover">
                                <thead class="thead bg-primary">
                                    <tr>
                                        <th>No</th>
										<th>Nombre</th>
										<th>modalidad</th>
										<th>acuenta</th>
										<th>saldo</th>
										<th>Proximo</th>
                                        <th>Options</th>
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
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script> --}}
    {{-- <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>  --}}
    
<script>
        $(document).ready(function() {
        
        var tabla=$('#inscripciones').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,

                    "ajax": "{{ url('micartera') }}",
                    "columns": [
                        {data: 'id'},
                        {data:'nombre'},
                        {data: 'modalidad'},
                        {data: 'acuenta'},
                        {data: 'saldo'},
                        {data: 'proximo'},
                        {data: 'btn'},
                    ],
                    "columnDefs": [
                        { responsivePriority: 1, targets: 0 },
                        { responsivePriority: 3, targets: -1 }
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },  
                }
            );

        } );
        
    </script>
@stop