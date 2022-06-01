 CKEDITOR.replace('editor1', {
            height: 120,
            width: "100%",
            removeButtons: 'PasteFromWord'
        });
            
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
        /*%%%%%%%%%%%%%%%%%%%%%%  funcion que agrega clase por tiempo x y luego lo destruye %%%%%%%%%%%*/
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
        
         
        $(document).ready(function(){
    
            var observable_id="{{ $persona->id }}";
            var observable_type="Persona";


            let tabla=$('#observaciones').DataTable(
                {
                    "serverSide": true,
                    "responsive":true,
                    "autoWidth":false,
                    "ajax":{
                        "url":"../observaciones/"+observable_id+"/"+observable_type,
                    }, 
                    "createdRow": function( row, data, dataIndex ) {
                        $(row).attr('id',data['id']); // agrega dinamiacamente el id del row
                        $('td', row).eq(4).html(moment(data['updated_at']).format('D-M-Y h:mm'));
                        if(data['activo']==1){
                            $(row).addClass('text-success');
                        }else{
                            $(row).addClass('text-danger');
                        }
                },
                    "columns": [
                        {data: 'id'},
                        {data: 'observacion'},
                        {data: 'activo'},
                        {data: 'name'},
                        {data: 'updated_at'},
                        {
                            "name":"btn",
                            "data": 'btn',
                            "orderable": false,
                        },
                    ],

                    "language":{
                        "url":"http://cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
                    }, 
                    "order": [[ 2, "desc" ]] 
                }
            );

        $('.observacion').on('click', function (e) {
            e.preventDefault();
            $("#editor1").val("");
            let objeto_id = "{{ $persona->id }}";
            $("#observable_id").val(objeto_id);
            $("#observable_type").val($(this).attr("id"));
            CKEDITOR.instances.editor1.setData('');
            $("#modal-gregar-observacion").modal("show");
            // $("#formulario-guardar-observacion").empty();
        });

        $('#guardar-observacion').on('click', function (e) {
            e.preventDefault();
            let observable_id = $("#observable_id").val();
            let observable_type = $("#observable_type").val();
            for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }
            console.log(observable_type);
            console.log(observable_id);

            $.ajax({
                url: "../guardar/observacion",
                data: {
                    //obs: $("#observacionx").val(),
                    observacion: $("#editor1").val(),
                    observable_id: observable_id,
                    observable_type: observable_type,
                },
                success: function (json) {
                    tabla.ajax.reload();
                    $("#" + observable_id).addTempClass('bg-success', 3000);
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
                },
                error: function (xhr, status) {
                    alert('Disculpe, existió un problema');
                },
            });
            $("#modal-gregar-observacion").modal("hide");
        });
            /* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  editar observacion %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
            $('table').on('click', '.editarobservacion', function (e) {
                e.preventDefault();
                let id_observacion = $(this).closest('tr').attr('id');
                console.log($("#editor1").val());
                $htmlobs = "";
                $.ajax({
                    url: "../observacion/editar",
                    data: {
                        id: id_observacion,
                    },
                    success: function (json) {
                        console.log(json);
                        $("#editor1").html(json.observacion);
                        console.log($("#editor1").html());
                        //$("#modal-mostrar").modal("hide");
                        $("#formulario-editar-observacion").empty();
                        $("#editar-observacion").modal("show");
                        $htmlobs += "<textarea cols='80' id='editor1' name='editor1' rows='10' data-sample-short>" + json.observacion + "</textarea>";
                        $htmlobs += "<input hidden class='form-control' type='text' name='observacion_id' value='" + json.id + "' id='observacion_id'>";
                        $htmlobs += "<div class='container-fluid h-100 mt-3'>";
                        $htmlobs += "<div class='row w-100 align-items-center'>";
                        $htmlobs += "<div class='col text-center'>";
                        $htmlobs += "<button type='submit' id='actualizarobservacion' class='btn btn-primary text-white btn-lg'>Guardar <i class='far fa-save'></i></button> ";
                        $htmlobs += "</div>";
                        $htmlobs += "</div>";
                        $htmlobs += "</div>";
                        $("#formulario-editar-observacion").append($htmlobs);
                        CKEDITOR.replace('editor1', {
                            height: 120,
                            width: "100%",
                            removeButtons: 'PasteFromWord'
                        });
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });
            
                /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ACTUALIZAR ENVIO DE FORMULARIO OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
            $(document).on("submit", "#formulario-editar-observacion", function (e) {
                e.preventDefault();//detenemos el envio
                $observacion = $('#editor1').val();
                console.log($observacion);
                $observacion_id = $('#observacion_id').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: "../observacion/actualizar/",
                    data: {
                        observacion: $observacion,
                        observacion_id: $observacion_id,
                    },
                    success: function (json) {
                        //console.log(json);
                        tabla.ajax.reload();
                        $('#editar-observacion').modal('hide');
                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });

            $('table').on('click', '.bajaobservacion', function (e) {
                e.preventDefault();
                let observacion_id = $(this).closest('tr').attr('id');
                $.ajax({
                    url: "../darbaja/observacion",
                    data: {
                        //obs: $("#observacionx").val(),
                        observacion_id: observacion_id,
                    },
                    success: function (json) {
                        $("#" + observacion_id).addTempClass('bg-success', 3000);
                        tabla.ajax.reload();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        Toast.fire({
                            type: 'success',
                            title: "Actualizado corectamente",
                        })

                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });
            $('table').on('click', '.altaobservacion', function (e) {
                e.preventDefault();
                let observacion_id = $(this).closest('tr').attr('id');
                $.ajax({
                    url: "../daralta/observacion",
                    data: {
                        //obs: $("#observacionx").val(),
                        observacion_id: observacion_id,
                    },
                    success: function (json) {
                        $("#" + observacion_id).addTempClass('bg-success', 3000);
                        tabla.ajax.reload();
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                        })
                        Toast.fire({
                            type: 'success',
                            title: "Actualizado corectamente",
                        })

                    },
                    error: function (xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
            });

             /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ELIMINAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
    $('table').on('click', '.eliminarobservacion', function (e) {
        e.preventDefault();
        let observacion_id = $(this).closest('tr').attr('id');
        console.log(observacion_id);
        Swal.fire({
            title: 'Estas seguro(a) de eliminar este registro?',
            text: "Si eliminas el registro no lo podras recuperar jamás!",
            icon: 'question',
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonColor: '#25ff80',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar..!',
            position: 'center',
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '../eliminar/general',
                    type: 'DELETE',
                    data: {
                        observacion_id: observacion_id,
                        "_token": $("meta[name='csrf-token']").attr("content")
                    },
                   
                    success: function (result) {
                        tabla.ajax.reload();
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
            } else {
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

            $('.editar_calificacion').on('click',function(e) {
                e.preventDefault(); 
                let persona_id ="{{ $persona->id }}";
                console.log(persona_id);
                    $.ajax({
                    url : "../calificacion/editar",
                    data : { persona_id :persona_id },
                    success : function(json) {
                            console.log(json.calificacion.calificacion);
                            $("#editar-calificacion").modal("show");
                            $('#calificacion').val(json.calificacion.calificacion);
                            $('#calificacion_id').val(json.calificacion.id);

                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },  
                });
            });

    
        });