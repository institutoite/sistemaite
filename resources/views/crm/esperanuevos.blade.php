@extends('adminlte::page')
@section('css')
    <link rel="stylesheet" href="{{asset('dist/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('custom/css/custom.css')}}">
@stop

@section('title', 'Reinscripcion')
@section('plugins.Sweetalert2',true)
@section('plugins.Datatables',true)

@section('content')
    <div class="pt-1">
       <div class="row">
            @foreach ($estados as $estado)
                <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                    <div class="form-check">
                        <input class="form-check-input estados" type="radio" name="estado" id="{{ $estado->estado }}">
                        <label class="form-check-label" for="{{ $estado->estado }}">
                            {{ $estado->estado }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="card">
            <div class="card-header bg-primary">
                <a class="btn btn-secondary text-white btn-sm float-right" href="{{route('crear.persona.rapido')}}">Crear Nuevo</a>
                EN ESPERA NUEVOS 
            </div>
            <div class="card-body">
                
                <table id="estadodinamico" class="table table-bordered table-hover table-striped">
                    <thead class="text-center">
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>APELLIDOP</th>
                            <th>INTEREST</th>
                            <th>Requerimiento</th>
                            <th>NIVEL</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    {{-- @include('persona.modalespotenciales') --}}
    @include('observacion.modalcreate')
    @include('estudiantes.modal')
    @include('persona.rapidingo.modalespotenciales')
    @include('administrativo.modal')
@stop

@section('js')
    <script src="https://kit.fontawesome.com/067a2afa7e.js" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="{{asset('dist/js/moment.js')}}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/locale/es.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script> 
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{asset('assets/js/observacion.js')}}"></script>
    {{-- <script src="{{asset('assets/js/derivarpotenciales.js')}}"></script> --}}
    
    <script>
        let tabla;
        let tablaadministrativos;
        let $un_potencial;
        //%%%%%%%%%%%%%%%%%%%%%%% INICIALIZA EL CKEDITOR CREAR OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%
        CKEDITOR.replace('editorguardar', {
            height: 120,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
        //%%%%%%%%%%%%%%%%%%%%%%% INICIALIZA EL CKEDITOR EDITAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%
        CKEDITOR.replace('editoreditar', {
            height: 120,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%       JS INSCRIPCION   %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/


        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CREAR OBSERVACION INSCIRPCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.observacion', function (e) {
            e.preventDefault();
            let objeto_id = $(this).closest('tr').attr('id');
            console.log(objeto_id);
            console.log($(this).attr('id'));
            $("#observable_id").val(objeto_id);
            $("#observable_type").val($(this).attr('id'));
            console.log("click en observacion crear");
            CKEDITOR.instances.editorguardar.setData("");
            $("diverror").addClass("d-none");
            $("#modal-agregar-observacion").modal("show");
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CLICK BOTON GUARDAR OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('#guardar-observacion').on('click', function (e) {
            e.preventDefault();
            console.log("click en guardar obsrvacion");
            let observable_id = $("#observable_id").val();
            console.log(observable_id);
            let observable_type = $("#observable_type").val();
            console.log(observable_type);
            for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }
            observacion=$("#editorguardar").val();
            console.log(observacion);
            url ="{{ url('guardar/observacion')}}"
            guardarObservacion(observacion,observable_id,observable_type,url);
            
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR OBSERVACIONES INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.mostrarobservacionespersona', function(e) {
            e.preventDefault();
                observable_id =$(this).closest('tr').attr('id');
                console.log(observable_id);
                observable_type ="Persona";
                url="../../observaciones/" + observable_id + "/" + observable_type,
                // console.log(url);
                mostrarCrudObservaciones(url);
                $("#modal-mostrar-observaciones").modal("show");
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% DAR BAJA OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/

        $('table').on('click', '.bajaobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            console.log(observacion_id);
            url="{{ url('darbaja/observacion') }}";
            // url="../darbaja/observacion";
            darBaja(observacion_id,url);
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% DAR ALTA OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.altaobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            // url="../daralta/observacion";
            url="{{ url('daralta/observacion') }}";
            darAlta(observacion_id,url);
        });

        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ELIMINAR OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.eliminarobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            // url="../"
            url="{{ url('eliminar/general') }}";
            eliminarObservacion(observacion_id,url);
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% EDITAR OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.editarobservacion', function (e) {
            e.preventDefault();
            observacion_id =$(this).closest('tr').attr('id');
            url="{{ url('observacion/editar') }}";
            editarObservacion(observacion_id,url);
            $("#modal-mostrar-observaciones").modal("hide");
            $("#modal-editar-observacion").modal("show");
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ACTUALIZAR OBSERVACION INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('#actualizar-observacion').on('click', function (e){ 
            e.preventDefault();
            observacion_id =$("#observable_id").val();
            observacion=CKEDITOR.instances.editoreditar.getData();
            console.log(observacion);
            url="{{ url('observacion/actualizar')}}";
            actualizarObservacion(observacion_id,observacion,url)
            // $("#modal-editar-observacion").modal("hide");
            // $("#modal-editar-observacion").modal("show");
        });

        $(".estados").on("click", function(e){
            e.preventDefault();
            console.log("click");
            let estado=$(this).attr('id');
            $("#estadodinamico").dataTable().fnDestroy();
            tabla=$('#estadodinamico').DataTable(
                    {
                        "serverSide": true,
                        "responsive":true,
                        "autoWidth":false,
                        "ajax":{
                            url: "{{ url('potenciales/parametrizada')}}",
                            data:{
                                estado: estado,
                            }
                        },
                        "createdRow": function( row, data, dataIndex ) {
                            $(row).attr('id',data['id']);
                            persona_id=data['id'];
                            $.ajax({
                                url:"{{url('persona/primeraultima/observacion')}}",
                                data:{persona_id:persona_id},
                                success : function(json) {
                                    if(json.observacionFirst.id != json.observacionLast.id)
                                    $('td', row).eq(4).html(json.observacionFirst.observacion +'<strong>'+ json.usuarioFirst.name +'</strong><br>'+json.observacionLast.observacion +'<strong>'+ json.usuarioLast.name +'</strong>');  
                                    else
                                    $('td', row).eq(4).html(json.observacionFirst.observacion +'<strong>'+ json.usuarioFirst.name +'</strong>');  
                                },
                            });
                            
                            if (moment(data['vuelvefecha']).format('YY-MM-DD')>moment().format('YY-MM-DD')){
                                $(row).addClass('text-success')
                            }else{
                                $(row).addClass('text-danger')
                            }
                        },
                        "columns": [
                            {data: 'id'},
                            {data: 'nombre'},
                            {data: 'apellidop'},
                            {data: 'interest'},
                            {data: 'apellidom'},
                            {data: 'vuelvefecha'},
                            {
                                "name":"btn",
                                "data": 'btn',
                                "orderable": false,
                            },
                        ],
                        "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]], 
                        "iDisplayLength" : 10,
                        "columnDefs": [
                            { responsivePriority: 1, targets: 0 },  
                            { responsivePriority: 2, targets: -1 }
                        ],
                        order: [[0, 'desc']],
                        "language":{
                            "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                        },  
                    }
            );
        });

        function mostrarPotencialesParametrizada(){
            
        }

        function mostrarAdministrativosPotenciales(potencial_id) {
                $("#administrativos").dataTable().fnDestroy();
                    $men = "";
                    $.ajax({
                        // url: '../potencial/get/' + potencial_id,
                        url: "../../potencial/get/" + potencial_id,
                        success: function (result) {
                            $un_potencial=result.persona;
                            $unos_interests=result.interests;
                            $una_onservacion=result.observacion;
                            $un_user=result.user;
                            $un_como=result.como.como;
                            $.each($unos_interests, function (key, value) {
                                $men +=(Number(key)+Number(1))+".-%20"+value.interest + "%0A";
                            });
                            console.log($un_potencial);
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                        }
                    });
                        
                    tablaadministrativos = $('#administrativos').DataTable(
                        {
                            "serverSide": true,
                            "responsive": true,
                            "autoWidth": false,
                            "targets": 0,
                            "ajax": {
                                "url":"{{url('administrativos/contactar')}}"
                            },
                            "createdRow": function (row, data, dataIndex) {
                                $(row).attr('id', data['id']); // agrega dinamiacamente el id del row
                                $mensaje = "https://api.whatsapp.com/send?phone=591" + data['telefono'] + "&text=*Nombre:*%0A" + $un_potencial.nombre.replaceAll(' ', '%20') +'%20'+ $un_potencial.apellidop.replaceAll(' ', '%20') +"%0A%0A";
                                $mensaje += "*Telefono:*%0A" + $un_potencial.telefono + "%0A%0A";
                                $mensaje += "*Observacion inicial:*%0A" + ($una_onservacion) + "%0A%0A";
                                $mensaje += "*Tipo cliente:*%0A" + 'Potencial' + "%0A%0A";
                                $mensaje += "*Quien atendió:*%0A" + $un_user + "%0A%0A";
                                $mensaje += "*Interes%20del%20cliente:*%0A" +$men;
                                $mensaje += "%0A*Descargar%20contacto:*%0A";
                                $mensaje += "http://www.ite.com.bo/crear/contacto/" + $un_potencial.id+"%0A";
                                $mensaje += "%0A*Link%20del%20cliente:*%0A";
                                $mensaje += "https://api.whatsapp.com/send?phone=591" + $un_potencial.telefono;
                                $mensaje += $mensaje.replace(/&nbsp[;]?/ig, '');
                                $('td', row).eq(4).html("<a target='_blank' href='" + $mensaje + "'><i class='fas fa-reply-all'></i></>");
                            },
                            "columns": [
                                { "width": "10%", data: 'id' },
                                { "width": "30%", data: 'nombre' },
                                { "width": "30%", data: 'apellidop' },
                                { data: 'telefono' },
                                {
                                    "width": "25%",
                                    "name": "btn",
                                    "data": 'btn',
                                    "orderable": false,
                                },
                            ],
                            "language": {
                                "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                            },
                            "order": [[3, "desc"]]
                        });
                    /*%%%%%%%%%%%%%%% ENUMARA LA PRIMER COLUMNA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
                    tablaadministrativos.on('order.dt search.dt', function () {
                        tablaadministrativos.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
                            cell.innerHTML = i + 1;
                        });
                    }).draw();
                }


         $('table').on('click', '.mostraradministrativos', function(e) {
            e.preventDefault();
                comentario_id =$(this).closest('tr').attr('id');
                console.log(comentario_id);
                mostrarAdministrativosPotenciales(comentario_id);
                $("#contacto-administrativos").modal("show");
        });
          /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%       JS GENERAL       %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
        %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        
        /*%%%%%%%%%%%%%%%%%%%%%  OCULTA DIVERROR DE MODAL CUANDO SE CIERRA MODAL GUARDAR %%%%%%*/
        $('#modal-agregar-observacion').on('hidden.bs.modal', function (e) {
            $("#diverror").addClass("d-none");
        });
        
        /*%%%%%%%%%%%%%%%%%%%%%  OCULTA DIVERROR DE MODAL CUANDO SE CIERRA MODAL EDITAR %%%%%%*/
        $('#modal-editar-observacion').on('hidden.bs.modal', function (e) {
            $(".diverror").addClass("d-none");
        });
        
        /*%%%%%%%%%%%%%%%%%%% JS GENERAL AGREGA UNA CLASE DE FORMA TEMPORAL %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
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
               
			//document.getElementById('ESPERANUEVO').click();
             $('table').on('click', '.fechar', function(e) {
                e.preventDefault();
                persona_id =$(this).closest('tr').attr('id');
                console.log("fechar:"+persona_id);
                $("#modal-fechar").modal("show");
                $("#persona_id").val(persona_id);
                
            }); 
             /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% GUARDAR LA FECHA O HACE AGENDAR %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#agendar').on('click', function (e) {
                e.preventDefault();
                $("#errores").empty();
                let vuelvefecha = $("#vuelvefecha").val();
                let persona_id = $("#persona_id").val();
                $.ajax({
                    url: "{{ url('persona/actualizar/vuelvefecha') }}",
                    data: {
                        vuelvefecha:vuelvefecha,
                        persona_id:persona_id,
                    },
                    success: function (json) {
                        if(json.error){
                            console.log(json.error);
                            $html="";
                            for (let j in json.error) {
                                $html+="<li>"+ json.error[0] +"</li>";
                            }
                            $("#erroresdiv").removeClass('d-none');
                            $("#error").append($html);
                        }else{
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                            })
                            Toast.fire({
                                type: 'success',
                                title: "Guardado corectamente: " + json.observacion,
                            })
                            $("#modal-fechar").modal("hide");
                            tabla.ajax.reload();
                        }
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                
            });
            /**%%%%%%%%%%%%%%%%%%%%%%%%%%%% CALIFICAR  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.calificar', function(e) {
                e.preventDefault();
                persona_id =$(this).closest('tr').attr('id');
                console.log("calificar:"+persona_id);
                $("#modal-calificar").modal("show");
                $("#persona_id").val(persona_id);
            }); 
             /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% GUARDAR LA FECHA O HACE AGENDAR %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('#calificar').on('click', function (e) {
                e.preventDefault();
                $("#errores").empty();
                let volvera = $("#volvera").val();
                let persona_id = $("#persona_id").val();
                $.ajax({
                    url: "{{ url('persona/actualizar/volvera')}}",
                    data: {
                        volvera:volvera,
                        persona_id:persona_id,
                    },
                    success: function (json) {
                        console.log(json);
                        if(json.error){
                            console.log(json.error);
                            $html="";
                            for (let j in json.error) {
                                $html+="<li>"+ json.error[0] +"</li>";
                            }
                            $("#erroresdiv").removeClass('d-none');
                            $("#error").append($html);
                        }else{
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                            })
                            Toast.fire({
                                type: 'success',
                                title: "Guardado corectamente: " + json.observacion,
                            })
                            $("#modal-calificar").modal("hide");
                            tabla.ajax.reload();
                        }
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                
            });
           
            $('table').on('click', '.enviarmensaje', function(e) {
                e.preventDefault();
                console.log("enviar mensajes");
                persona_id =$(this).closest('tr').attr('id');
                console.log(persona_id); 
                $("#modal-mostrar-contactos").modal("show");
                $("#tabla-contactos").empty();
                    $.ajax({
                    url :"{{ url('persona/enviar/mensaje') }}",
                    data:{
                        persona_id:persona_id,
                    },
                    success : function(json) {
                        tabla.ajax.reload();
                        $html="<tr id='"+ json.persona.id +"'><td>"+ json.persona.nombre +"</td>";
                        $html+="<td>Teléfono personal</td>";
                        $html+="<td>"+json.persona.telefono+"</td>";
                        $html+="<td>"+moment(json.persona.created_at).format('L') +"</td>";
                        $html+="<td>"+moment(json.persona.updated_at).format('L') +"</td>";
                        if (json.persona.telefono!=0)
                            $html+="<td class='enviopersonal'><a><i class='fab fa-whatsapp'></i></a></td></tr>";
                        else
                            $html+="<td><a class=''>No tiene número</a></td></tr>";
                        for (let j in json.apoderados) {
                            $html+="<tr id='"+ json.apoderados[j].id +"'><td>"+ json.apoderados[j].nombre +"</td>";
                            $html+="<td>"+json.apoderados[j].pivot.parentesco+"</td>";
                            $html+="<td>"+json.apoderados[j].telefono+"</td>";
                            $html+="<td>"+moment(json.apoderados[j].created_at).format('LLL') +"</td>";
                            $html+="<td>"+moment(json.apoderados[j].updated_at).format('LLL') +"</td>";
                            $html+="<td class='enviopersonal'><a><i class='fab fa-whatsapp'></i></a></td></tr>";
                        }
                        $("#tabla-contactos").append($html);
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });

             $('table').on('click', '.enviopersonal',function(e) {
                e.preventDefault();
                persona_id =$(this).closest('tr').attr('id');
                console.log("Click");

                console.log(persona_id);
                $.ajax({
                    url : "{{ url('persona/enviar/mensaje/personal') }}",
                    data : {
                        persona_id:persona_id,
                    },
                    success : function(json) {
                        window.open("https://api.whatsapp.com/send?phone=591"+ json.persona.telefono +"&text="+ json.mensaje,'_blank');
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
                $("#modal-gregar-observacion").modal("hide");
            });

            $('table').on('click', '.unsuscribe', function(e) {
                e.preventDefault(); 
                persona_id=$(this).parent().parent().find('td').first().html();
                //console.log(persona_id);
                $.ajax({
                    url : "{{ url('persona/potenciales/unsuscribe') }}",
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
                        //console.log(json); 
                        $("#modal-mostrar").modal("show");
                        $("#tabla-mostrar-observaciones").empty();
                        $("#tabla-mostrar-potencial").empty();
                        $("#tabla-mostrar-contactos").empty();
                        $intereses="<ul>";
                        for (let k in json.intereses) {
                            $intereses+="<li>";
                            $intereses+=json.intereses[k].interest;
                            $intereses+="</li>";
                        }
                        $intereses+="</ul>";
                        $("#intereses").append($intereses);
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
                        $html+="<tr><td>INTERESES</td><td>"+ $intereses +"</td></tr>";
                        
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
           
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATATABLE DE OBSERVACIONES DENTRO DE UNA FUNCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/


            /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MUESTRA FORMULARIO EDITAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $('table').on('click', '.editarobservacion', function(e) {
                e.preventDefault(); 
                let id_observacion=$(this).closest('tr').attr('id');
                $htmlobs="";
                $.ajax({
                    url : "{{ url('observacion/editar') }}",
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