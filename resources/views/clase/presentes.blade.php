@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@endsection

@section('title', 'Estudiantes Presentes')

@section('content_header')
    
@stop
@section('plugins.Datatables',true)

@section('content')
    <table id="presentes" class="table table-hover table-bordered table-striped display" width="100%">
        <thead class="">
            <tr>
                <th>#</th>
                <th>ESTUDIANTE</th>
                <th>HORARIO</th>
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
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
    <script>
        $(document).ready(function() {
            
            $('table').on('click', 'a', function(e) { 
                 e.preventDefault(); 
                var id_estudiante =$(this).closest('tr').find('td:first-child').text();
                var fila=$(this).closest('tr');
                console.log(id_estudiante);
		        $.ajax({
                    url : "clase/finalizar/",
                    data : { id :id_estudiante },
                    success : function(json) {
                            console.log(json);
                            fila.remove();
                            // html="<div id='' class='alert alert-primary' role='alert'>"+ json.message +"</div>";
                            // $('#alerta').html(html);
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                                })

                                Toast.fire({
                                icon: 'success',
                                title: json.message
                                })
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
	        });


            $('#presentes').dataTable({
                "createdRow": function( row, data, dataIndex){
                    var horainicio=moment(data['horainicio']).format('HH:mm');
                    var horafin=moment(data['horafin']).format('HH:mm');

                    $('td', row).eq(0).html('<small>'+data['id']+'</small>');
                    $('td', row).eq(1).html('<small>'+data['name']+'</small>');
                    $('td', row).eq(2).html('<small>'+horainicio+'-'+horafin+'</small>');
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
                    { responsivePriority: 2, targets: 8 }
                ],
                "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                },  
            });
        } );
    </script>
@stop
