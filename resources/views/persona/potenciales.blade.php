@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Personas')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="pt-4">
        <div class="card">
            <div class="card-header bg-primary">
                {{-- Lista de Estudiantes <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('personas.create')}}">Crear Estudiante</a> --}}
            </div>
            
            <div class="card-body">
                
                <table id="potenciales" class="table table-bordered table-hover table-striped">
                    <thead class="bg-primary text-center">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>APELLIDOP</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    @include('persona.modalespotenciales')
    

@stop

@section('js')
    <script src="https://kit.fontawesome.com/067a2afa7e.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            var tabla=$('#potenciales').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,

                        "ajax": "{{ url('potenciales') }}",
                        "columns": [
                            {data: 'id'},
                            {data: 'nombre'},
                            {data: 'apellidop'},
                            
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


            $('table').on('click', '.observacion', function(e) {
                e.preventDefault(); 
                persona_id=$(this).parent().parent().find('td').first().html();
                $("#observable_type").val("App\\Models\\Persona");
                $("#observable_id").val(persona_id);
                $("#observacion").val("");
                $("#modal-gregar-observacion").modal("show");
            });


            $('table').on('click', '.unsuscribe', function(e) {
                e.preventDefault(); 
                persona_id=$(this).parent().parent().find('td').first().html();
                //console.log(persona_id);
                $.ajax({
                    url : "../persona/potenciales/unsuscribe",
                    data:{ persona_id:persona_id },
                    success : function(json) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            })
                            Toast.fire({
                            type: 'success',
                            title: "Guardado corectamente: "+ json.mensaje,
                            })
                        $('#potenciales').DataTable().ajax.reload();
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });
        
            $('table').on('click','.ver',function (e) {
                e.preventDefault(); 
                persona_id=$(this).parent().parent().find('td').first().html();
                //console.log(persona_id);
                $.ajax({
                    url: '../ver/potencial',
                    type: 'GET',
                    data:{
                        persona_id:persona_id,
                    },
                    success: function(json) {
                        console.log(json); 
                        $("#modal-mostrar").modal("show");
                        $("#tabla-mostrar-observaciones").empty();
                        $("#tabla-mostrar-potencial").empty();
                        $("#tabla-mostrar-contactos").empty();
                        $html="";
                        $html+="<tr><td>CODIGO</td><td>"+json.potencial.id+"</td></tr>";
                        $html+="<tr><td>NOMBRE</td><td>"+json.potencial.nombre+"</td></tr>";
                        $html+="<tr><td>APELLIDO PATERNO</td><td>"+json.potencial.apellidop+"</td></tr>";
                        $html+="<tr><td>APELLIDO MATERNO</td><td>"+json.potencial.apellidom+"</td></tr>";
                        if (json.potencial.telefono!=null)
                            $html+="<tr><td>TELEFONO</td><td>"+json.potencial.telefono+"</td></tr>";
                        else
                            $html+="<tr><td>TELEFONO</td><td>No tiene</td></tr>";
                        $html+="<tr><td>CREADO</td><td>"+moment(json.potencial.created_at).format('LLLL')+"</td></tr>";
                        $html+="<tr><td>AUTOR</td><td>"+json.autorPotencial +"</td></tr>";
                        
                        $("#tabla-mostrar-potencial").append($html);

                        for (let j in json.observaciones) {
                            $htmlObservaciones="";
                            $htmlObservaciones+="<tr id='"+json.observaciones[j].id +"''><td>"+ json.observaciones[j].id +"</td>"+"<td>"+json.observaciones[j].observacion+"</td>";
                            $htmlObservaciones+="<td>"+ moment(json.observaciones[j].created_at).format('LLLL')  +"</td>";
                            $htmlObservaciones+="<td>"+ json.observaciones[j].name +"</td>";
                            $htmlObservaciones+="<td>";
                            $htmlObservaciones+="<a class='btn-accion-tabla tooltipsC btn-sm mr-2 editarobservacion' title='Editar esta Observacion'>";
                            $htmlObservaciones+="<i class='fa fa-fw fa-edit text-primary'></i></a>";
                            $htmlObservaciones+="<a class='btn-accion-tabla tooltipsC btn-sm mr-2 eliminarobservacion' title='Eliminar esta observacion'>";
                            $htmlObservaciones+="<i class='fas fa-trash-alt text-danger'></i>";
                            $htmlObservaciones+="</td>";
                            
                            $("#tabla-mostrar-observaciones").append($htmlObservaciones);
                        }
                        
                        $htmlApoderados="";
                        for (let j in json.apoderados) {
                            $htmlApoderados+="<tr><td>"+ json.apoderados[j].nombre +"</td>"+"<td>"+json.apoderados[j].apellidop+"</td>";
                            $htmlApoderados+="<td><a target='_blank' href=https://wa.me/591"+json.apoderados[j].telefono +">"+ json.apoderados[j].telefono  +"</a></td>";
                            $htmlApoderados+="<td><a href=tel:"+ json.apoderados[j].telefono + "><i class='fa-solid fa-phone-flip'></i></a> <a target='_blank' href=https://wa.me/591"+json.apoderados[j].telefono +"> <i class='fa-brands fa-whatsapp'></i> </a> </td>";
                            $htmlApoderados+="<td>"+ moment(json.apoderados[j].created_at).format('LLLL') +"</a></td>";
                            $htmlApoderados+="<td>"+ "david" +"</td>";
                            $htmlApoderados+="<td>"+ json.apoderados[j].pivot.parentesco +"</td>";
                            $htmlApoderados+="</tr>";
                        }
                        $("#tabla-mostrar-contactos").append($htmlApoderados);
                    },
                });
            });

            function  Quienes(datos){
                return new Promise(function(resolver, rechazar){
                    $.ajax({
                    url:'../quien',
                    success : function(data){resolver(data);},
                    error : function(error){rechazar(error)}
                    });
                });
                }

            $('#guardar-observacion').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url : "../observacion/guardar",
                    data : $("#formulario-guardar-observacion").serialize(),
                    success : function(json) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            })
                            Toast.fire({
                            type: 'success',
                            title: "Guardado corectamente: "+ json.observacion,
                            })
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-gregar-observacion").modal("hide");
            });

            $(document).on("submit","#formulario-editar-observacion",function(e){
                e.preventDefault();//detenemos el envio
                $observacion=$('#observacionx').val();
                $observacion_id=$('#observacion_id').val();
                $programacion_id=$('#programacion_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url : "../observacion/actualizar/",
                    data:{
                            observacion:$observacion,
                            observacion_id:$observacion_id,
                            programacion_id:$programacion_id,
                        },
                    success : function(json) {
                        $('#editar-observacion').modal('hide');
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });
            $('table').on('click','.eliminarobservacion',function (e) {
                e.preventDefault(); 
                let id_programacioncom=$(this).closest('tr').attr('id');
                Swal.fire({
                    title: 'Estas seguro(a) de eliminar este registro?',
                    text: "Si eliminas el registro no lo podras recuperar jamás!",
                    icon: 'question',
                    showCancelButton: true,
                    showConfirmButton:true,
                    confirmButtonColor: '#25ff80',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar..!',
                    position:'center',        
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '../eliminar/observacion/'+id_programacioncom,
                            type: 'DELETE',
                            data:{
                                id:id_programacioncom,
                                _token:'{{ csrf_token() }}'
                            },
                            success: function(result) {
                                $("#modal-mostrar").modal("hide");
                                const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', Swal.stopTimer)
                                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                                }
                                })
                                Toast.fire({
                                icon: 'success',
                                title: 'Se eliminó correctamente el registro'
                                })  
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                switch (xhr.status) {
                                    case 500:
                                        Swal.fire({
                                            title: 'No se completó esta operación por que este registro está relacionado con otros registros',
                                            showClass: {
                                                popup: 'animate__animated animate__fadeInDown'
                                            },
                                            hideClass: {
                                                popup: 'animate__animated animate__fadeOutUp'
                                            }
                                        })
                                        break;
                                
                                    default:
                                        break;
                                }
                            }
                        });
                    }else{
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 4000,
                            timerProgressBar: true,
                            onOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })
                        Toast.fire({
                            icon: 'error',
                            title: 'No se eliminó el registro'
                        })
                    }
                })
            });
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MUESTRA FORMULARIO EDITAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.editarobservacion', function(e) {
                e.preventDefault(); 
                let id_observacion=$(this).closest('tr').attr('id');
                $htmlobs="";
                $.ajax({
                    url : "../observacion/editar",
                    data :{
                        id:id_observacion,
                    },
                    success : function(json) {
                        $("#modal-mostrar").modal("hide");
                        $("#editar-observacion").modal("show");
                        $("#formulario-editar-observacion").empty();
                        
                        $htmlobs+="<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12'><div class='form-floating mb-3 text-gray'>";
                        $htmlobs+="<input type='text' name='observacion' class='form-control @error('observacion') is-invalid @enderror texto-plomo' id='observacionx'"; 
                        $htmlobs+="value=\'"+ json.observacion +"'\>";
                        $htmlobs+="<label for='observacion'>Nombre de persona Observacion</label></div></div>";
                        $htmlobs+="</div>";// div del row
                        
                        //%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  CAMPO OCULTO DE id observacion %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
                        $htmlobs+="<input id='observacion_id'  type='text' hidden readonly name='observacion_id' value='"+json.id +"'>";
                        $htmlobs+="<input id='programacioncom_id'  type='text' hidden  readonly name='programacion_id' value='"+json.observable_id +"'>";

                        $htmlobs+="<div class='container-fluid h-100 mt-3'>"; 
                        $htmlobs+="<div class='row w-100 align-items-center'>";
                        $htmlobs+="<div class='col text-center'>";
                        $htmlobs+="<button type='submit' id='actualizarobservacion' class='btn btn-primary text-white btn-lg'>Guardar <i class='far fa-save'></i></button> ";       
                        $htmlobs+="</div>";
                        $htmlobs+="</div>";
                        $htmlobs+="</div>";
                        $("#formulario-editar-observacion").append($htmlobs);
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });

        });
            
        
    </script>
@stop