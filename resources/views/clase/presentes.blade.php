@extends('adminlte::page')
@section('css')
    

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('dist/css/zoomify.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">

    {{-- <link href="{{asset('dist/lbgalery/css/galery.css')}}" rel="stylesheet"> --}}
    
    
@endsection

@section('title', 'Estudiantes Presentes')

@section('content_header')
    
@stop
@section('plugins.Jquery',true)
@section('plugins.Datatables',true)
@section('plugins.Sweetalert2',true)



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
        
    </table >
    @include('clase.modalmostrar')  
@stop


{{-- %%%%%%%%%%%%%%%%%%%%%%% inicio seccion JS --}}
@section('js')  
     <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script>
        
        $(document).ready(function() {
                
            $('#presentes').on('click', '.finalizar', function(e) { 
                e.preventDefault(); 
                var id_estudiante =$(this).closest('tr').find('td:first-child').text();
                var fila=$(this).closest('tr');
                console.log('click');
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

            $('table').on('click','.zoomify',function (e){
                console.log($(this).attr('src'));
                Swal.fire({
                    title: 'Estudiantex: '+ $(this).closest('tr').find('td').eq(1).text(),
                    text: 'Materia:'+$(this).closest('tr').find('td').eq(2).text(),
                    imageUrl: $(this).attr('src'),
                    imageWidth: 400,
                    imageHeight:400,
                    showCloseButton:true,
                    confirmButtonColor:'#26baa5',
                    confirmButtonText:"Aceptar",
                    
                })
            });
            $('table').on('click','.zoom',function (e){
                Swal.fire({
                    imageWidth: 400,
                    imageHeight:400,
                    imageUrl: $(this).attr('src'),
                    showCloseButton:true,
                    confirmButtonColor:'#26baa5',
                    confirmButtonText:"Aceptar",
                    
                })
            });


            $('#presentes').dataTable({
                "createdRow": function( row, data, dataIndex){
                    var horainicio=moment.duration(data['horainicio']);
                    var horafin=moment.duration(data['horafin']);
                    
                    let hinicio=moment(data['horainicio']);
                    let hfin=moment(data['horafin']);
                    let ahora=moment();
                    let minutosRestantantes=hfin.diff(ahora,'minutes');
                        
                        if(minutosRestantantes<-10){
                            $(row).addClass('bg-danger');
                        }
                        if((minutosRestantantes<0)&&(minutosRestantantes>=-10)){
                            $(row).addClass('table-danger');
                        }
                        if((minutosRestantantes>0)&&(minutosRestantantes<15)){
                            $(row).addClass('table-warning');
                        }
                        if(minutosRestantantes>15){
                            $(row).addClass('table-success');
                        }

                    
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
                                return "<div><img class='img-thumbnail zoomify' src=\"{{URL::to('/')}}/storage/" + data + "\" width=\"75\"/></div>";
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
                    { responsivePriority: 2, targets: 8 },
                    { responsivePriority: 3, targets: -1 },
                ],
                "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                },  
            });
/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  MOSTRAR CLASE %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', 'a .mostrar', function(e) {
                e.preventDefault(); 
                var id_clase =$(this).closest('tr').find('td:first-child').text();
                var fila=$(this).closest('tr');
                console.log("fila:"+fila);
                $.ajax({
                    url : "clase/mostrar/",
                    data : { id :id_clase },
                    success : function(json) {
                        $("#modal-mostrar").modal("show");
                        $("#tabla-modal").empty();
                        $html="";
                        $html+="<tr><td>DOCENTE</td>"+"<td>"+json.nombre+' '+json.apellidop+' '+json.apellidom+"</td></tr>";
                        $html+="<tr><td>ESTUDIANTE</td>"+"<td>"+fila.find('td').eq(1).html()+"</td></tr>";
                        $html+="<tr><td>AULA</td>"+"<td>"+json.aula+"</td></tr>";
                        $html+="<tr><td>MATERIA</td>"+"<td>"+json.materia+"</td></tr>";
                        $html+="<tr><td>TEMA</td>"+"<td>"+json.tema+"</td></tr>";
                        $html+="<tr><td>FOTO ESTUDIANTE</td>"+"<td>"+fila.find('td').eq(8).html()+"</td></tr>";

                        $html+="<tr><td>FOTO DOCENTE</td>"+"<td><img class='zoom'  src="+"{{URL::to('/')}}/storage/"+json.foto+ " height='150'/></td></tr>";
                        $html+="<tr><td>CREADO</td>"+"<td>"+moment(json.created_at).format('LLLL')+"</td></tr>";
                        $html+="<tr><td>ACTUALIZADO</td>"+"<td>"+moment(json.updated_at).format('LLLL')+"</td></tr>";
                        $("#tabla-modal").append($html);

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                

            });
            
        } );
        
    </script>
@stop

{{-- %%%%%%%%%%fin seccion JS --}}
