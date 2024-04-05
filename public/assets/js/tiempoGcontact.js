$(document).ready(function() {
    var intervalId;
    $('#modalGcontact').modal('show');
    function actualizarTokenExpiration() {
        $.ajax({
            url: "{{ route('token-expiration') }}",
            type: "GET",
            success: function(response) {
                console.log(response);
                $('#tokenExpiration').text('Tiempo Restante: ' + response);
                $('#tokenExpirationform').text('Tiempo Restante: ' + response);
                $('#signIn').show();
                const tiempoString =response; // Tiempo en formato "mm:ss"
                const [minutos, segundos] = tiempoString.split(':');
                const horaActual = moment();
                const totalSegundos = parseInt(minutos) * 60 + parseInt(segundos);
                const horaObjetivo = horaActual.clone().add(totalSegundos, 'seconds');
                const diferenciaTiempo = moment.duration(horaObjetivo.diff(horaActual));
                const horasRestantes = Math.floor(diferenciaTiempo.asHours());
                const minutosRestantes = diferenciaTiempo.minutes();
                const segundosRestantes = diferenciaTiempo.seconds();
                const endTime = moment().add(minutosRestantes, 'minutes').add(segundosRestantes, 'seconds');
                showCountdown(endTime);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    function showCountdown(endTime) {
        const countdownElement = document.getElementById('tokenExpirationform');
        const timerInterval = setInterval(updateCountdown, 1000);
        function updateCountdown() {
            const currentTime = moment();
            const remainingTime = moment.duration(endTime.diff(currentTime));
            if (remainingTime.asSeconds() <= 0) {
                clearInterval(timerInterval);
                countdownElement.innerHTML = "¡Tiempo terminado!";
            } else {
                const hours = Math.floor(remainingTime.asHours());
                const minutes = remainingTime.minutes();
                const seconds = remainingTime.seconds();
                countdownElement.innerHTML = `Tiempo restante: ${hours} horas, ${minutes} minutos, ${seconds} segundos`;
            }
        }

        // Ejecuta la función inicialmente para mostrar el tiempo restante al cargar la página
        updateCountdown();
    }
    actualizarTokenExpiration();
});