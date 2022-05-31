
    CKEDITOR.replace('editor1', {
        height: 120,
        width: "100%",
        removeButtons: 'PasteFromWord'
    });

    $('table').on('click', '.observacion', function (e) {
        e.preventDefault();
        let objeto_id = $(this).closest('tr').attr('id');
        console.log(objeto_id);
        $("#observable_id").val(objeto_id);
        $("#observacionx").val("");
        //$("#observacion").attr("rows","15");
        $("#modal-gregar-observacion").modal("show");
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

                let observacion_id = $('#observacion_id').val();
                $("#" + observacion_id).addTempClass('bg-success', 3000);

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

    $('#guardar-observacion').on('click', function (e) {
        e.preventDefault();
        let observable_id = $("#observable_id").val();
        let observable_type = $("#observable_type").val();
        $.ajax({
            url: "guardar/observacion",
            data: {
                //obs: $("#observacionx").val(),
                observacion: $("#editor1").val(),

                observable_id: $("#observable_id").val(),
                observable_type: "Persona"
            },
            success: function (json) {
                console.log(json);

                let observable_id = $('#observable_id').val();
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


    /*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% BOTON GUARDAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
    $('#guardar-observacion').on('click', function (e) {
        e.preventDefault();
        let observable_id = $("#observable_id").val();
        let observable_type = $("#observable_type").val();
        for (instance in CKEDITOR.instances) { CKEDITOR.instances[instance].updateElement() }

        $.ajax({
            url: "guardar/observacion",
            data: {
                //obs: $("#observacionx").val(),
                observacion: $("#editor1").val(),

                observable_id: $("#observable_id").val(),
                observable_type: "Persona"
            },
            success: function (json) {
                console.log(json);

                let observable_id = $('#observable_id').val();
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

    //** %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% editar observacion %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */

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
                $("#editar-observacion").modal("show");
                $("#formulario-editar-observacion").empty();


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
                let observacion_id = $('#observacion_id').val();
                console.log(observacion_id);

                $('#editar-observacion').modal('hide');
                $("#" + observacion_id).addTempClass('bg-success', 3000);
                location.reload();
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
                        location.reload();
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
