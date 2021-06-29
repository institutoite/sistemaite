@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
@endsection

@section('title', 'Estudiantes Presentes')

@section('content_header')
    
@stop
@section('plugins.Datatables',true)
@section('plugins.Jquery',true)


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
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script> --}}

    <script src="{{asset('dist/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script>
        
        console.log(moment().format('MMMM Do YYYY, h:mm:ss a'));
        console.log(moment().format('LTS'));
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
                    var horainicio=moment.duration(data['horainicio']);
                    var horafin=moment.duration(data['horafin']);
                    
                    let hinicio=moment(data['horainicio']);
                    let hfin=moment(data['horafin']);
                    let ahora=moment();
                    //console.log(hinicio.hour());
                    console.log(hinicio.format('LT'));
                    console.log(hfin.format('LT'))
                    console.log(hfin.from(ahora));
                    console.log(hfin.diff(ahora,'minutes'));

                    //console.log(moment.duration(moment(),'minutes').locale('es').humanize());
                    $('td', row).eq(0).html('<small>'+data['id']+'</small>');
                    $('td', row).eq(1).html('<small>'+data['name']+'</small>');
                    $('td', row).eq(2).html('<small>'+moment(data['horainicio']).format('HH:mm')+'-'+moment(data['horafin']).format('HH:mm')+'</small>');
                    //$('td', row).eq(3).html('<small>'+ moment.duration(horafin.subtract(moment.duration()),'minutes').humanize() +'</small>');
                    $('td', row).eq(3).html('<small>'+ hfin.from(ahora)+'('+hfin.diff(ahora,'minutes')+')</small>');
                    $('td', row).eq(4).html('<small>'+data['nombre']+'</small>');
                    $('td', row).eq(5).html('<small>'+data['materia']+'</small>');
                    $('td', row).eq(6).html('<small>'+data['aula']+'</small>');
                    $('td', row).eq(7).html('<small>'+data['tema']+'</small>');
              
                

                },
                // "drawCallback":function(settings){
                //     var api = this.api();
                //     $(api.column(3).footer()).html('<p>hola como estas</p>');
                // },
                
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
                        {data: 'horafin'},
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
