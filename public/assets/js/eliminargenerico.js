function eliminarRegistro(registro_id,objeto_type,tabla) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    Swal.fire({
        title: 'Estas seguro(a) de eliminar este registro?',
        text: "Si eliminas el registro no lo podras recuperar jamás!",
        type: 'question',
        showCancelButton: true,
        showConfirmButton: true,
        confirmButtonColor: '#25ff80',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar..!',
        position: 'center',
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'eliminar/' + objeto_type+"/"+registro_id,
                type: 'DELETE',
                data: {
                    _token: $("meta[name='csrf-token']").attr("content"),
                },
                success: function (result) {
                    console.log(result);
                    $("#" + registro_id).remove();
                    tabla.ajax.reload();
                    mensajeGrande(result.mensaje, 'success', 2000);
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    mensajeErr();
                }
            });
        } else {
            mensajePequenio('El registro NO se eliminó', 'error', 2000);
        }
    })
}
function eliminarRegistroURL(url,tabla) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log(url);
    Swal.fire({
        title: 'Estas seguro(a) de eliminar este registro?',
        text: "Si eliminas el registro no lo podras recuperar jamás!",
        type: 'question',
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
                    _token: $("meta[name='csrf-token']").attr("content"),
                },
                success: function (result) {
                    console.log(result);
                    $("#" + registro_id).remove();
                    tabla.ajax.reload();
                    mensajeGrande(result.mensaje, 'success', 2000);
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    mensajeErr();
                }
            });
        } else {
            mensajePequenio('El registro NO se eliminó', 'error', 2000);
        }
    })
}