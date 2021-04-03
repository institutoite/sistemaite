@extends('adminlte::page')
@section('css')
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('dist/lbgalery/css/zoomify.min.css')}}">
    
@stop

@section('title', 'Personas')

@section('content_header')
    <h1 class="text-center text-primary">Buscar Cliente</h1>
@stop

@section('content')
    @isset($persona)
        {{$persona->nombre}}
        {{$persona->id}}
        {{$persona->apellidop}}
        {{$persona->apellidom}}
    @endisset

    <table id="personas" class="table table-bordered table-hover table-striped">
        <thead class="bg-primary">
            <tr>
                <th>ID</th>
                <th>OLD</th>
                <th>NOMBRE</th>
                <th>APATERNO</th>
                <th>AMATERNO</th>
                <th>FOTO</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
    </table>
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{asset('dist/vendor/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('dist/lbgalery/js/zoomify.min.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <!-- JavaScript Bundle with Popper -->
    

    <script>
        $(document).ready(function() {
            
            $('#personas').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,

                    "ajax": "{{ url('api/personas') }}",
                    "columns": [
                        {data: 'id'},
                        {data:'idantiguo'},
                        {data: 'nombre'},
                        {data: 'apellidop'},
                        {data: 'apellidom'},
                        {
                            "name": "foto",
                            "data": "foto",
                            "render": function (data, type, full, meta) {
                                return "<img class='zoomify' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\"/>";
                            },
                            "title": "Image",
                            "orderable": true,
            
                        },     
                        {data: 'btn'},
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },  
                }
            );
        } );
        $('.zoomify').zoomify();
    </script>
@stop