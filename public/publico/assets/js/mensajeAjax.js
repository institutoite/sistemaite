function mensajeGrande(unMensajaAjax,unIcono,unTiempo){
    console.log(unIcono);
    Swal.fire({
        position: 'top-end',
        icon:'success',
        title: unMensajaAjax,
        showConfirmButton: false,
        timer: unTiempo,
    });
}
function mensajePequenio(unMensajaAjax,unIcono, unTiempo){
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
        icon: unIcono,
        title: unMensajaAjax
    })
}
function mensajeErr(){
    Swal.fire({
        title: "No se puede eliminar este Registro",
        text: "Por que está relacionado con otros registros!",
        icon: 'warning',
        cancelButtonText: "No hacer nada..",
        showCancelButton: true,
        showConfirmButton: false,
        cancelButtonColor: '#26BAA5',
    });
}

function algoSalioMal(){
    let timerInterval
        Swal.fire({
            title: 'Oh que paso!',
            html: 'Revisa las <b></b> Fechas.',
            timer: 3000,
            timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft()
            }, 100)
        },
        willClose: () => {
            clearInterval(timerInterval)
        }
        }).then((result) => {
        
        if (result.dismiss === Swal.DismissReason.timer) {
        }
        })
}