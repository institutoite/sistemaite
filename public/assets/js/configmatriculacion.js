/*%%%%%%%%%%%%%%%%%%%%%%%%%%%% DA DE BAJA UNA INSCRIPCION %%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function darBajaMatriculacion(matriculacion_id,url) {
    $.ajax({
        url: url,
        data: {
            matriculacion_id: matriculacion_id,
        },
        success: function (json) {
            //$("#" + matriculacion_id).addTempClass('bg-success', 3000);
            tablamatriculaciones.ajax.reload();
            tablamatriculacionesdesvigentes.ajax.reload();
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
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

/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  DA DE ALTA UNA INSCRIPCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function darAltaMatriculacion(matriculacion_id,url){
    $.ajax({
        url: url,
        data: {
            matriculacion_id: matriculacion_id,
        },
        success: function (json) {
            $("#" + matriculacion_id).addTempClass('bg-success', 3000);
            //tablaobservaciones.ajax.reload();
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
/**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%  CONDONAR INSCRIPCION  %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%*/
function CondonarMatriculacion(matriculacion_id, url) {
    $.ajax({
        url: url,
        data: {
            matriculacion_id: matriculacion_id,
        },
        success: function (json) {
            $("#" + matriculacion_id).addTempClass('bg-success', 3000);
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