@extends('adminlte::page')
@section('css')
    

    
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
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
    <div class="content pt-4">
        <div class="card">
            <div class="card-header bg-secondary">
                ESTUDIANTES PRESENTES AHORITA
            </div>
            <div class="card-body">
                <table id="presentes" class="table table-hover table-bordered table-striped display" width="100%">
                    <thead class="bg-primary">
                        <tr>
                            <th>ESTUDIANTE</th>
                            <th>MATERIA</th>
                            <th>AULA</th>
                            <th>DOCENTE</th>
                            <th>HORARIO</th>
                            <th>TIEMPO</th>
                            <th>FOTO</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                </table >
            </div>
        </div>
    </div>
    @include('clase.modalmostrar') 
    @include('clase.modaleditar') 

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
                var id_estudiante =$(this).closest('tr').attr('id');
                var           fila=$(this).closest('tr');
                console.log(id_estudiante);
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
                                })

                                Toast.fire({
                                type: 'success',
                                title: json.message
                                })
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
	        });

            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MUESTRA FORMULARIO AGREGAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.editar', function(e) {
                e.preventDefault(); 
                let id_clase=$(this).closest('tr').attr('id');
                $("#modal-editar").modal("show");
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


            let tablaPresentes=$('#presentes').dataTable({
                "createdRow": function( row, data, dataIndex){
                    var horainicio=moment.duration(data['horainicio']);
                    var horafin=moment.duration(data['horafin']);
                    
                    let hinicio=moment(data['horainicio']);
                    let hfin=moment(data['horafin']);
                    let ahora=moment();
                    let minutosRestantantes=hfin.diff(ahora,'minutes');
                        
                        if(minutosRestantantes<-10){
                            $(row).addClass('text-bold text-danger');
                        }
                        if((minutosRestantantes<=0)&&(minutosRestantantes>=-10)){
                            $(row).addClass('text-danger');
                        }
                        if((minutosRestantantes>=0)&&(minutosRestantantes<15)){
                            $(row).addClass('text-warning');
                        }
                        if(minutosRestantantes>15){
                            $(row).addClass('text-success');
                        }
                    $(row).attr('id',data['id']);
                    
                    $('td', row).eq(4).html(moment(data['horainicio']).format('HH:mm')+'-'+moment(data['horafin']).format('HH:mm'));
                    $('td', row).eq(5).html( hfin.from(ahora)+'('+hfin.diff(ahora,'minutes'));

                },
                
                "serverSide": true,
                "ordering":true,
                "responsive":true,
                "paging":   true,
                "info":     true,
                "autoWidth":false,
                "columns": [
                        {data: 'name'},
                        {data: 'materia'},
                        {data: 'aula'},
                        
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
                    { responsivePriority: 2, targets: 7 },
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
            
            setInterval(function(){
                $('#presentes').DataTable().ajax.reload();
		    },60000);

        } );
        
    </script>
@stop

{{-- %%%%%%%%%%fin seccion JS --}}
