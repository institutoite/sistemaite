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
                <th>MATERIA</th>
                <th>AULA</th>
                <th>TEMA</th>

                <th>DOCENTE</th>
                <th>HORARIO</th>
                <th>TIEMPO</th>
                <th>FOTO</th>
                <th>ACTION</th>
            </tr>
        </thead>
        
    </table>
    
@stop

@section('js') 
    <script src="{{asset('dist/js/moment.min.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script>
        
        $(document).ready(function() {
            
            $('table').on('click', 'a .', function(e) { 
                e.preventDefault(); 
                var id_estudiante =$(this).closest('tr').find('td:first-child').text();
                var fila=$(this).closest('tr');
		        $.ajax({
                    url : "clase/finalizar/",
                    data : { id :id_estudiante },
                    success : function(json) {
                            console.log(json);
                            fila.remove();
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

                    $('td', row).eq(6).html(moment(data['horainicio']).format('HH:mm')+'-'+moment(data['horafin']).format('HH:mm'));
                    $('td', row).eq(7).html( hfin.from(ahora)+'('+hfin.diff(ahora,'minutes'));

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
                        {data: 'materia'},
                        {data: 'aula'},
                        {data: 'tema'},
                        {data: 'nombre'},
                        {data: 'horainicio'},
                        {data: 'horafin'},
                        {
                            "name": "foto",
                            "data": "foto",
                            "render": function (data, type, full, meta) {
                                return "<img class='materialboxed' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\"/>";
                            },
                            "title": "FOTO",
                            "orderable": false,
            
                        },  
                        {   
                            "data": "btn"
                        },
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
