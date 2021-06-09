@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@stop

@section('title', 'Estudiantes Presentes')

@section('content_header')
    
@stop

@section('content')
    <table id="presentes" class="table table-hover table-bordered table-striped display" width="100%">
        <thead class="">
            <tr>
                <th>#</th>
                <th>ESTUDIANTE</th>
                <th>HORARIO</th>

                <th>TIEMPO</th>
                <th>MATERIA</th>
                <th>AULA</th>

                <th>TEMA</th>
                <th>TEMA</th>
                <th>TEMA</th>
                <th width="120px">Opciones</th>
            </tr>
        </thead>
        
    </table>
    
@stop

@section('js') 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/searchbuilder/1.0.1/js/dataTables.searchBuilder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.0.3/js/dataTables.dateTime.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    <script src="//cdn.datatables.net/plug-ins/1.10.21/sorting/datetime-moment.js"></script>
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script>
        $(document).ready(function() {
            
          
            $('#presentes').dataTable({
                "createdRow": function( row, data, dataIndex){
                    data['horainicio']=moment(data['horainicio']).format('LT');
                    data['horafin']=moment(data['horafin']).format('LT');
                },
                "serverSide": true,
                "ordering":false,
                "responsive":true,
                "paging":   false,
                "info":     false,
                "autoWidth":false,
                "columns": [
                        {data: 'id'},
                        {data: 'name'},
                        {data: 'horainicio'},
                        {data:'horafin'},
                        {data:'nombre'},
                        {data:'materia'},
                        {data:'aula'},
                        {data:'tema'},
                        {data:'foto'},
                        {data: 'btn'},
                    ],
                "ajax": "{{ url('clases/presentes/ahorita') }}",
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: -1 }
                ],
                "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                },  
            });
        } );
    </script>
@stop
