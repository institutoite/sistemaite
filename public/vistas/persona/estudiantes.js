 //%%%%%%%%%%%%%%%%%%%%%%% INICIALIZA EL CKEDITOR %%%%%%%%%%%%%%%%%%%%%%%%%%%
        CKEDITOR.replace('editorguardar', {
            height: 120,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
        //%%%%%%%%%%%%%%%%%%%%%%% INICIALIZA EL CKEDITOR %%%%%%%%%%%%%%%%%%%%%%%%%%%
        CKEDITOR.replace('editoreditar', {
            height: 120,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CREAR OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.observacion', function (e) {
            e.preventDefault();
            let objeto_id = $(this).closest('tr').attr('id');
            console.log(objeto_id);
            $("#observable_id").val(objeto_id);
            $("#observable_type").val($(this).attr('id'));
            CKEDITOR.instances.editorguardar.setData("");
            console.log("Click en Observacion crear");
            $("#modal-agregar-observacion").modal("show");
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% CLICK BOTON GUARDAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('#guardar-observacion').on('click', function (e) {
            e.preventDefault();
            console.log("click en guardar obsrvacion");
            let observable_id = $("#observable_id").val();
            console.log(observable_id);
            let observable_type = $("#observable_type").val();
            console.log(observable_type);
            for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }
            observacion=$("#editorguardar").val();
            url = "guardar/observacion"
            guardarObservacion(observacion,observable_id,observable_type,url);
            
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% MOSTRAR OBSERVACIONES %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
        $('table').on('click', '.mostrarobservacionespersona', function(e) {
            e.preventDefault();
                observable_id =$(this).closest('tr').attr('id');
                observable_type ="Persona";
                url="observaciones/" + observable_id + "/" + observable_type,
                mostrarCrudObservaciones(url);
                $("#modal-mostrar-observaciones").modal("show");
        });


        $('table').on('click', '.bajaobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            console.log(observacion_id);
            url="darbaja/observacion";
            darBaja(observacion_id,url);
        });
        
        $('table').on('click', '.altaobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            url="daralta/observacion";
            darAlta(observacion_id,url);
        });

        $('table').on('click', '.eliminarobservacion', function (e) {
            e.preventDefault();
            let observacion_id = $(this).closest('tr').attr('id');
            url="eliminar/general"
            eliminarObservacion(observacion_id,url);
        });
        $('table').on('click', '.editarobservacion', function (e) {
            e.preventDefault();
            observacion_id =$(this).closest('tr').attr('id');
            url="observacion/editar";
            editarObservacion(observacion_id,url);
            $("#modal-mostrar-observaciones").modal("hide");
            $("#modal-editar-observacion").modal("show");
        });
        $('#actualizar-observacion').on('click', function (e){ 
            e.preventDefault();
            observacion_id =$("#observable_id").val();
            observacion=CKEDITOR.instances.editoreditar.getData();
            url="observacion/actualizar";
            actualizarObservacion(observacion_id,observacion,url);
        });
        $('table').on('click', '.enviarmensaje', function(e) {
            e.preventDefault();
                persona_id =$(this).closest('tr').attr('id');
                url="../persona/enviar/mensaje/componente",
                mensaje_id=5;
                mostrarContactos(url,persona_id,mensaje_id);
                $("#modal-listar-contactos-component").modal("show");
        });

        $('table').on('click', '.enviarcredenciales', function(e) {
            e.preventDefault();
            let persona_id = $(this).closest('tr').attr('id');
            if (!persona_id) {
                return;
            }
            $.ajax({
                url: "/persona/credenciales/whatsapp/" + persona_id,
                type: "GET",
                success: function(response) {
                    if (response && response.whatsapp_url) {
                        window.open(response.whatsapp_url, "_blank");
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "No se pudo generar el mensaje",
                        });
                    }
                },
                error: function(xhr) {
                    const mensaje = (xhr.responseJSON && xhr.responseJSON.message) ? xhr.responseJSON.message : "Error al generar credenciales";
                    Swal.fire({
                        icon: "error",
                        title: mensaje,
                    });
                }
            });
        });




        $('#modal-agregar-observacion').on('hidden.bs.modal', function (e) {
            $("#diverror").addClass("d-none");
        });
        
        $('#modal-editar-observacion').on('hidden.bs.modal', function (e) {
            $(".diverror").addClass("d-none");
        });
        

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
        
        $('.starrr').starrr({
            max: 5,
            change: function(e, value){
                if (value) {
                    $("#calificacion").val(value);
                } else {
                    $('.your-choice-was').hide();
                }
                
            }
        });
        /*%%%%%%%%%%%%%%%%%%%%%%%%%% DATATABLE PERSONAS ESTUDIANTES %%%%%%%%%%%%%%%%%%%%*/
        
       $(document).ready(function() {
            var tabla=$('#personas').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,

                    "ajax":{
                        'url':"listar/estudiantes",
                    },
                    "createdRow": function( row, data, dataIndex ) {
                        console.log(dataIndex);
                    $(row).attr('id',data['id']); // agrega dinamiacamente el id del row
                },
                    "columns": [
                        {data: 'id'},
                        {data: 'nombre'},
                        {data: 'apellidop'},
                        {data: 'apellidom'},
                        {
                            "name": "foto",
                            "data": "foto",
                            "render": function (data, type, full, meta) {
                            var img = "<div style='position:relative; display:inline-block;'>";
                            var filename = data ? data : 'sinfoto.jpg';
                            // Siempre anteponer 'estudiantes/' si no está
                            if(filename.indexOf('estudiantes/') !== 0) {
                                filename = 'estudiantes/' + filename;
                            }
                            img += "<img class='materialboxed zoomify' src='/foto/" + filename + "' height=\"50\"/>";
                            img += "</div>";
                            return img;
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
                    "columnDefs": [
                        { responsivePriority: 1, targets: 0 },
                        { responsivePriority: 2, targets: -1 },
                    ],
                    order: [[0, 'desc']],
                    "language":{
                        "url":"https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
                    },  
                }
            );
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
        });

        function inicializarMarcadoModal($modal){
            function agregarMinutos(hora, minutos){
                var partes = (hora || '').split(':');
                if (partes.length < 2) {
                    return hora;
                }
                var h = parseInt(partes[0], 10);
                var m = parseInt(partes[1], 10);
                if (isNaN(h) || isNaN(m)) {
                    return hora;
                }
                var total = h * 60 + m + minutos;
                total = (total % 1440 + 1440) % 1440;
                var hh = Math.floor(total / 60);
                var mm = total % 60;
                return (hh < 10 ? '0' : '') + hh + ':' + (mm < 10 ? '0' : '') + mm;
            }

            $modal.find('.marcado-form').each(function(){
                var $form = $(this);
                var $materia = $form.find('[name="materia_id"]');
                var $tema = $form.find('[name="tema_id"]');
                var $horaInicio = $form.find('input[name="horainicio"]');
                var $horaFin = $form.find('input[name="horafin"]');
                var $pane = $form.closest('.tab-pane');
                var $usarHorario = $pane.length
                    ? $pane.find('.usar-horario-programado')
                    : $form.closest('.modal-body').find('.usar-horario-programado').first();

                function cargarTemas(){
                    if (!$materia.length || !$tema.length) {
                        return;
                    }
                    var materiaId = $materia.val();
                    if (!materiaId) {
                        $tema.html('<option value="">Seleccione un tema</option>');
                        return;
                    }
                    $.get('/api/temas/' + materiaId, function(data) {
                        var htmlSelect = '<option value="">Seleccione un tema</option>';
                        for (var i = 0; i < data.length; i++) {
                            htmlSelect += '<option value="' + data[i].id + '">' + data[i].tema + '</option>';
                        }
                        $tema.html(htmlSelect);
                    });
                }

                if ($materia.length) {
                    $materia.off('change.marcado').on('change.marcado', cargarTemas);
                    cargarTemas();
                }

                $usarHorario.off('change.marcado').on('change.marcado', function(){
                    var usar = $(this).is(':checked');
                    var horaInicioProg = $(this).data('hora-inicio');
                    var horaFinProg = $(this).data('hora-fin');
                    var duracionMin = parseInt($(this).data('duracion-min'), 10) || 0;
                    if (usar) {
                        if ($horaInicio.length) {
                            $horaInicio.val(horaInicioProg);
                        }
                        if ($horaFin.length) {
                            $horaFin.val(horaFinProg);
                        }
                    } else {
                        var ahora = new Date();
                        var hh = (ahora.getHours() < 10 ? '0' : '') + ahora.getHours();
                        var mm = (ahora.getMinutes() < 10 ? '0' : '') + ahora.getMinutes();
                        var horaActual = hh + ':' + mm;
                        if ($horaInicio.length) {
                            $horaInicio.val(horaActual);
                        }
                        if ($horaFin.length) {
                            $horaFin.val(agregarMinutos(horaActual, duracionMin));
                        }
                    }
                });
            });
        }

        $('table').on('click', '.marcar-asistencia', function(e){
            e.preventDefault();
            var url = $(this).data('url');
            if (!url) {
                return;
            }
            var $modal = $('#modal-marcado-normal');
            $modal.find('.modal-content').html('<div class="modal-body">Cargando...</div>');
            $.get(url, function(html){
                $modal.find('.modal-content').html(html);
                $modal.modal('show');
                inicializarMarcadoModal($modal);
            }).fail(function(){
                $modal.find('.modal-content').html('<div class="modal-body">No se pudo cargar el marcado.</div>');
                $modal.modal('show');
            });
        });

        $(document).on('click', '.marcar-salida', function(e){
            e.preventDefault();
            var claseId = $(this).data('clase-id');
            var finalizarUrl = $(this).data('finalizar-url') || 'clase/finalizar/';
            if (!claseId) {
                return;
            }
            $.ajax({
                url: finalizarUrl,
                data: { id: claseId },
                success: function(json){
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    Toast.fire({
                        type: 'success',
                        title: json.message
                    });
                    $('#modal-marcado-normal').modal('hide');
                },
                error: function(){
                    Swal.fire({
                        type: 'error',
                        title: 'Ocurrio un Error',
                        text: 'No se pudo marcar la salida.'
                    });
                }
            });
        });