$('table').on('click', '.editarobservacion', function (e) {
    e.preventDefault();
    let id_observacion = $(this).closest('tr').attr('id');
    $htmlobs = "";
    $.ajax({
        url: "../observacion/editar",
        data: {
            id: id_observacion,
        },
        success: function (json) {
            $("#editor2").html(json.observacion);
            $("#formulario-editar-observacion").empty();
            $("#editar-observacion").modal("show");
            $htmlobs += "<textarea cols='80' id='editor2' name='editor2' rows='10' data-sample-short>" + json.observacion + "</textarea>";
            $htmlobs += "<input class='form-control' type='text' name='observacion_id' value='" + json.id + "' id='observacion_id'>";
            $htmlobs += "<div class='container-fluid h-100 mt-3'>";
            $htmlobs += "<div class='row w-100 align-items-center'>";
            $htmlobs += "<div class='col text-center'>";
            $htmlobs += "<button type='submit' id='actualizarobservacion' class='btn btn-primary text-white btn-lg'>Guardar <i class='far fa-save'></i></button> ";
            $htmlobs += "</div>";
            $htmlobs += "</div>";
            $htmlobs += "</div>";
            $("#formulario-editar-observacion").append($htmlobs);
            CKEDITOR.replace('editor2', {
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
    $observacion = $('#editor2').val();
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
            tabla.ajax.reload();
            $('#editar-observacion').modal('hide');
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
});

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DA DE BAJA UNA OBSERVACION UTILIZA AJAX %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
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

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DA DE ALTA UNA OBSERVACION QUE ESTA CON BAJA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
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