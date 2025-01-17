document.getElementById("contactForm").addEventListener("submit", function (event) {
    event.preventDefault();

    const telefono = document.getElementById("telefono").value;
    const comentario = document.getElementById("comentario").value;
    const recaptchaResponse = grecaptcha.getResponse();

    if (!recaptchaResponse) {
        alert("Por favor, completa el reCAPTCHA.");
        return;
    }

    fetch("/api/send-message", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
        },
        body: JSON.stringify({
            telefono: telefono,
            comentario: comentario,
            recaptcha: recaptchaResponse,
        }),
    })
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: '¡Enviado!',
                    text: 'Formulario enviado con éxito.',
                });

                // Limpiar los campos del formulario
                document.getElementById('contactForm').reset();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: data.message || 'Eres un humano realmente?',
                });
            }
        })
        .catch((error) => {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo conectar con el servidor. Intenta de nuevo más tarde.',
            });
        });
});
