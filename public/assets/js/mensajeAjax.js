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
function MensajeError(){
    Swal.fire({
        title: "No se puede eliminar este Registro",
        text: "Por que está relacionado con otros registros!",
        icon: 'warning',
        cancelButtonText: "No hacer nada..",
        showCancelButton: true,
        showConfirmButton: false,
        cancelButtonColor: '#26BAA5',
    })
}