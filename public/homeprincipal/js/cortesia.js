document.addEventListener('DOMContentLoaded', () => {

    const cortesiaSection = document.querySelector('.cortesia-section');
    const selectServicio = document.getElementById('servicio-cortesia-select');
    const btnReservar = document.getElementById('btn-reservar-cortesia');
    
    // Si no existen los elementos, no hacer nada.
    if (!cortesiaSection || !selectServicio || !btnReservar) {
        return;
    }

    const numeroWhatsApp = '59171324941';

    function actualizarEnlace() {
        // 1. Obtener el valor seleccionado del <select>
        const servicioElegido = selectServicio.value;
        
        // 2. Crear el texto del mensaje, codificándolo para una URL
        const textoMensaje = encodeURIComponent(
                    `¡Hola! 👋  
                    
                    Vengo de la página web https://ite.com.bo y me interesa reservar mi *CLASE DE CORTESÍA* para el servicio de:  
                    *${servicioElegido}*  

                    Por favor, necesito información sobre:  
                    - Horarios disponibles  
                    - Requisitos para la clase  
                    - Duración de la sesión  

                    ¡Quedo atento(a) a su respuesta! 📩`
                    );
        
        // 3. Construir el enlace completo de WhatsApp
        const enlaceWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${textoMensaje}`;
        
        // 4. Actualizar el atributo 'href' del botón
        btnReservar.href = enlaceWhatsApp;
    }

    // --- Event Listeners ---

    // 1. Actualizar el enlace en cuanto la página carga por primera vez.
    actualizarEnlace();

    // 2. Actualizar el enlace cada vez que el usuario cambie la opción del <select>.
    selectServicio.addEventListener('change', actualizarEnlace);


    // --- Animación de Entrada ---
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                cortesiaSection.classList.add('is-visible');
                observer.unobserve(cortesiaSection);
            }
        });
    }, { 
        threshold: 0.2
    });

    observer.observe(cortesiaSection);

});
