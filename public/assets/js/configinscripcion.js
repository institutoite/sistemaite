/*%%%%%%%%%%%%%%%%%%%%%%%%%%%% DA DE BAJA UNA INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function darBajaInscripcion(inscripcion_id,url) {
    $.ajax({
        url: url,
        data: {
            inscripcion_id: inscripcion_id,
        },
        success: function (json) {
            $("#" + inscripcion_id).addTempClass('bg-success', 3000);
            tablainscripciones.ajax.reload();
            tablainscripcionesdesvigentes.ajax.reload();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
            Toast.fire({
                type: 'success',
                title: json.mensaje,
            })

        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DA DE ALTA UNA INSCRIPCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function darAltaInscripcion(inscripcion_id,url){
    $.ajax({
        url: url,
        data: {
            inscripcion_id: inscripcion_id,
        },
        success: function (json) {
            $("#" + inscripcion_id).addTempClass('bg-success', 3000);
            tablainscripcionesdesvigentes.ajax.reload();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
            Toast.fire({
                type: 'success',
                title: json.mensaje,
            })
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  CONDONAR INSCRIPCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function CondonarInscripcion(inscripcion_id,url){
    $.ajax({
        url: url,
        data: {
            inscripcion_id: inscripcion_id,
        },
        success: function (json) {
            $("#" + inscripcion_id).addTempClass('bg-success', 3000);
            tablaobservaciones.ajax.reload();
            tablainscripcionesdesvigentes.fnDestroy();
            tablainscripcionesdesvigentes.ajax.reload();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
            })
            Toast.fire({
                type: 'success',
                title: json.mensaje,
            })
        },
        error: function (xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}