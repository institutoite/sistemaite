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
                <th></th>
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

    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    
    <script src="{{asset('vendor/sweetalert/sweetalert.all.js')}}"></script>

    <script>
        $(document).ready(function() {
            
            $('#tr').on('click', 'td', function() { 
                var id_estudiante = $(this);//.closest('tr').attr('id');
                console.log(id_estudiante);
		        // $.ajax({
                //     url : "{{--route('clases.finalizar')--}}"",
                //     data : { id : colocar el id sacado },
                //     type : 'GET',
                //     dataType : 'json',
                //     success : function(json) {
                //         $('<h1/>').text(json.title).appendTo('body');
                //         $('<div class="content"/>')
                //             .html(json.html).appendTo('body');
                //     },
                //     error : function(xhr, status) {
                //         alert('Disculpe, existió un problema');
                //     },
                //     complete : function(xhr, status) {
                //         alert('Petición realizada');
                //         }
                // });
	        });


            $('#presentes').dataTable({
                "createdRow": function( row, data, dataIndex){
                    var horainicio=moment(data['horainicio']).format('HH:mm');
                    var horafin=moment(data['horafin']).format('HH:mm');
                    $('td', row).eq(0).html('<small>'+data['id']+'</small>');
                    $('td', row).eq(1).html('<small>'+data['name']+'</small>');
                    $('td', row).eq(2).html('<small>'+horainicio+'</small>');
                    $('td', row).eq(3).html('<small>'+horafin+'</small>');
                    $('td', row).eq(4).html('<small>'+data['nombre']+'</small>');
                    $('td', row).eq(5).html('<small>'+data['materia']+'</small>');
                    $('td', row).eq(6).html('<small>'+data['aula']+'</small>');
                    $('td', row).eq(7).html('<small>'+data['tema']+'</small>');

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
                        {
                            "name": "foto",
                            "data": "foto",
                            "render": function (data, type, full, meta) {
                                return "<img class='materialboxed' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\"/>";
                            },
                            "title": "FOTO",
                            "orderable": false,
            
                        },  
                        {data: 'btn'},
                    ],
                "ajax": "{{ url('clases/presentes/ahorita') }}",
                "columnDefs": [
                    { responsivePriority: 1, targets: 0 },  
                    { responsivePriority: 2, targets: 9 }
                ],
                "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                },  
            });
        } );
    </script>
@stop
