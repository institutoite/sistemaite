let tablaobservaciones;
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DATATABLE DE OBSERVACIONES DENTRO DE UNA FUNCION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function mostrarCrudObservaciones(url) {
    $("#observaciones").dataTable().fnDestroy();
        tablaobservaciones = $('#observaciones').DataTable(
        {
            "serverSide": true,
            "responsive": true,
            "autoWidth": false,
            "targets": 0,
            "ajax": {
                "url": url,
            },
            "createdRow": function (row, data, dataIndex) {
                $(row).attr('id', data['id']); // agrega dinamiacamente el id del row
                $('td', row).eq(4).html(moment(data['updated_at']).format('DD-MM-YYYY h:mm'));
                if (data['activo'] == 1) {
                    $(row).addClass('text-success');
                } else {
                    $(row).addClass('text-danger');
                }
            },
            "columns": [
                { "width": "7%", data: 'id' },
                { "width": "30%", data: 'observacion' },
                { data: 'name' },
                { "width": "7%", data: 'activo' },
                { data: 'updated_at' },
                {
                    "width": "25%",
                    "name": "btn",
                    "data": 'btn',
                    "orderable": false,
                },
            ],

            "columnDefs": [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: -1 }
            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json"
            },
            "order": [[3, "desc"],[4,"desc"]],
        });
    /*%%%%%%%%%%%%%%% ENUMARA LA PRIMER COLUMNA %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
    tablaobservaciones.on('order.dt search.dt', function () {
        tablaobservaciones.column(0, { search: 'applied', order: 'applied' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
}

/*%%%%%%%%%%%%%%%%%%%%%%%%%%%% DA DE BAJA UNA OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function darBaja(observacion_id,url) {
    $.ajax({
        url: url,
        data: {
            observacion_id: observacion_id,
        },
        success: function (json) {
            $("#" + observacion_id).addTempClass('bg-success', 3000);
            tablaobservaciones.ajax.reload();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
            Toast.fire({
                icon: 'success',
                title: "Actualizado corectamente",
            })

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DA DE ALTA UNA OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function darAlta(observacion_id,url){
    $.ajax({
        url: url,
        data: {
            observacion_id: observacion_id,
        },
        success: function (json) {
            $("#" + observacion_id).addTempClass('bg-success', 3000);
            tablaobservaciones.ajax.reload();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
            Toast.fire({
                icon: 'success',
                title: "Actualizado corectamente",
            })
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  EDITAR UNA OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function editarObservacion(observacion_id,url){
    $.ajax({
        url: url,
        data: {
            id: observacion_id,
        },
        success: function (json) {
            console.log("Se ejecuto este metodo desde observacion.js");
            CKEDITOR.instances.editoreditar.setData(json.observacion);
            $(".observable_id").val(json.id);
        },
    });
}
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  ACTUALIZAR UNA OBSERVACION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function actualizarObservacion(observacion_id,observacion,url){
    $.ajax({
        url:url,
        data: {
            observacion_id: observacion_id,
            observacion: observacion,
        },
        success: function (json) {
            if (json.errores) {
                $(".error").html(json.errores.observacion);
                $(".diverror").removeClass('d-none');
            } else {
                
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                })
                Toast.fire({
                    icon: 'success',
                    title: "Guardado corectamente: " + json.mensaje,
                })
                $("#modal-editar-observacion").modal("hide"); 
            }
        },
    });
}

/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% GUARDAR OBSERVACION OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
    function guardarObservacion(observacion,observable_id,observable_type,url){
        $.ajax({
            url:url,
            data: {
                observacion:observacion,
                observable_id: observable_id,
                observable_type: observable_type,
            },
            success: function (json) {
                
                if (json.errores) {
                    $(".error").html(json.errores.observacion);
                    $(".diverror").removeClass('d-none');
                } else {
                    $("#" + observable_id).addTempClass('bg-success', 3000);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                    })
                    Toast.fire({
                        icon: 'success',
                        title: "Guardado corectamente: " + json.mensaje,
                    })
                    $("#modal-agregar-observacion").modal("hide");
                }
            },
            error: function (xhr, status) {
                alert('Disculpe, existió un problema');
            },
        });
    } 

/*%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% ELIMINAR OBSERVACION %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% */
function eliminarObservacion(observacion_id,url){
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
                url: url,
                type: 'DELETE',
                data: {
                    observacion_id: observacion_id,
                    "_token": $("meta[name='csrf-token']").attr("content")
                },
                success: function (result) {
                    tablaobservaciones.ajax.reload();
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
}




