function mensajeGrande(unMensajaAjax,unColor,unTiempo){
    Swal.fire({
        position: 'top-end',
        icon: unColor,
        title: unMensajaAjax,
        showConfirmButton: false,
        timer: unTiempo,
        icon: unColor,
    });
}
function mensajePequenio(unMensajaAjax,unColor, unTiempo){
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: unTiempo,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: unColor,
        title: unMensajaAjax
    })
}