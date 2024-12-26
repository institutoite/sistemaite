document.querySelector('#formulario-comentario').addEventListener('submit', async (e) => {
    e.preventDefault();

    const nombre = document.querySelector('input[name="nombre"]').value;
    const telefono = document.querySelector('input[name="telefono"]').value;
    const comentario = document.querySelector('textarea[name="comentario"]').value;

    try {
        // Inicializa reCAPTCHA y genera el token
        grecaptcha.ready(() => {
            grecaptcha.execute('6LeTgu4hAAAAAJap9DHePvq0wM93VXz2HJmLPZIy', { action: 'submit' }).then(async (token) => {
                // Envía el token reCAPTCHA junto con los datos del formulario
                const response = await fetch('/comentarios', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        nombre: nombre,
                        telefono: telefono,
                        comentario: comentario,
                        como_id: 6,
                        recaptcha_token: token, // Incluye el token reCAPTCHA
                    }),
                });

                if (response.ok) {
                    const data = await response.json();
                    alert('Comentario enviado exitosamente: ' + data.message);
                    document.querySelector('#formulario-comentario').reset();
                } else {
                    const error = await response.json();
                    alert('Error al enviar el comentario: ' + (error.message || 'Error desconocido.'));
                }
            });
        });
    } catch (err) {
        alert('Error al enviar el comentario: ' + err.message);
    }
});
