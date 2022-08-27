@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link href="{{asset('dist/css/zoomify.css')}}" rel="stylesheet" type="text/css">
@stop

@section('title', 'Docentes')
@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            Lista de Docentes <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('docentes.create')}}">Crear Docente</a>
        </div>
        <div class="card-body">
            <table id="docentes" class="table table-bordered table-hover table-striped">
                <thead class="bg-primary text-center">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>APELLIDOMP</th>
                        <th>APELLIDOM</th>
                        <th>MODO</th>
                        <th>PERFIL</th>
                        <th>FOTO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    @include('estudiantes.modal')
@stop

@section('js')
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>

    <script src="https://cdn.ckeditor.com/4.19.0/standard-all/ckeditor.js"></script>
    <script src="{{asset('assets/js/observacion.js')}}"></script>
    <!-- JavaScript Bundle with Popper -->
    

    <script>
        ( function ( $ ) {
            'use strict';
            $.fn.addTempClass = function ( className, expire, callback ) {
                className || ( className = '' );
                expire || ( expire = 2000 );
                return this.each( function () {
                    $( this ).addClass( className ).delay( expire ).queue( function () {
                        $( this ).removeClass( className ).clearQueue();
                        callback && callback();
                    } );
                } );
            };
        } ( jQuery ) );
        
        $(document).ready(function() {
            var tabla=$('#docentes').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "ajax":"{{url('listar/docentes')}}",
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']); // agrega dinamiacamente el id del row
                    },
                    "columns": [
                        {data: 'id'},
                        {data: 'nombre'},
                        {data: 'apellidop'},
                        {data: 'apellidom'},
                        {data: 'mododocente'},
                        {data: 'perfil'},    
                        {
                            "name": "foto",
                            "data": "foto",
                            "render": function (data, type, full, meta) {
                                return "<img class='materialboxed zoomify' src=\"{{URL::to('/')}}/storage/" + data + "\" height=\"50\"/>";
                            },
                            "title": "FOTO",
                            "orderable": false,
                        }, 
                        {
                            "name":"btn",
                            "data": 'btn',
                            "orderable": false,
                        },
                    ],
                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    },  
                }
            );
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  ZOOMIFY %%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click','.zoomify',function (e){
                Swal.fire({
                    title: 'Codigo: '+ $(this).closest('tr').find('td').eq(0).text(),
                    text: $(this).closest('tr').find('td').eq(1).text(),
                    imageUrl: $(this).attr('src'),
                    imageWidth: 400,
                    showCloseButton:true,
                    confirmButtonColor:'#26baa5',
                    type: 'success',
                    imageHeight:400,
                    imageAlt: 'Custom image',
                    confirmButtonText:"Aceptar",
                    
                })
            });
            $('table').on('click', '.enviarmensaje', function(e) {
                e.preventDefault();
                persona_id =$(this).attr('id');
                    $("#modal-mostrar-contactos").modal("show");
                    $("#tabla-contactos").empty();
                            $.ajax({
                            url :"persona/enviar/mensaje",
                            data:{
                                persona_id:persona_id,
                            },
                            success : function(json) {
                                //tabla.ajax.reload();
                                $html="<tr id='"+ json.persona.telefono +"'><td>"+ json.persona.nombre +"</td>";
                                $html+="<td>Teléfono personal</td>";
                                $html+="<td>"+json.persona.telefono+"</td>";
                                $html+="<td>"+moment(json.persona.created_at).format('L') +"</td>";
                                $html+="<td>"+moment(json.persona.updated_at).format('L') +"</td>";
                                if (json.persona.telefono!=0)
                                    $html+="<td><a target='_blank' href='https://api.whatsapp.com/send?phone=591"+ json.persona.telefono+"&text="+ json.mensaje +"' class='falta'><i class='fab fa-whatsapp'></i></a></td></tr>";
                                else
                                    $html+="<td><a class=''>No tiene número</a></td></tr>";
                                for (let j in json.apoderados) {
                                    $html+="<tr id='"+ json.apoderados[j].telefono +"'><td>"+ json.apoderados[j].nombre +"</td>";
                                    $html+="<td>"+json.apoderados[j].pivot.parentesco+"</td>";
                                    $html+="<td>"+json.apoderados[j].telefono+"</td>";
                                    $html+="<td>"+moment(json.apoderados[j].created_at).format('LLL') +"</td>";
                                    $html+="<td>X"+moment(json.apoderados[j].updated_at).format('LLL') +"</td>";
                                    $html+="<td><a target='_blank' href='https://api.whatsapp.com/send?phone=591"+ json.apoderados[j].telefono +"&text="+ json.mensaje +"' class='falta'><i class='fab fa-whatsapp'></i></a></td></tr>";
                                }
                                tabla.ajax.reload();
                                $("#tabla-contactos").append($html);
                            },
                            error : function(xhr, status) {
                                alert('Disculpe, existió un problema');
                            },
                        });
                });
        } );
        
    </script>
@stop