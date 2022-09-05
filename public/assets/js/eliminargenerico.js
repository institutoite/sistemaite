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
                url: 'eliminar/' + objeto_type,
                type: 'DELETE',
                data: {
                    id: registro_id,
                    _token: $("meta[name='csrf-token']").attr("content"),
                },
                success: function (result) {
                    console.log(result);
                    mensajePequenio(result.mensaje, 'success', 2000);
                    tabla.ajax.reload();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    mensajeError();
                }
            });
        } else {
            mensajePequenio('El registro NO se eliminó', 'error', 2000);
        }
    })
}