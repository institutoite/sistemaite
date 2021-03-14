@extends('adminlte::page')

@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Paises')

@section('content_header')
    <h1 class="text-center text-primary">Paises</h1>
    
@stop

@section('content')
  
    <table id="zonas" class="table table-bordered table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>PAIS</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
          
    </table>
   @include('sweetalert::alert')
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    
    <script>
        $(document).ready(function() {
            $('#zonas').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,

                    "ajax": "{{ url('api/zonas') }}",
                    "columns": [
                        {data: 'id'},
                        {data:'zonda'},
                        {data:'ciudad_id'},
                        {data: 'btn'},
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },
                    "headers": {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }  
                }
            );
        } );
    </script>
@stop