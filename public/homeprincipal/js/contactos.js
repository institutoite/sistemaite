// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Código existente para el menú, animación de scroll, carrusel de cursos y filtrado de eventos...
    
    // Manejo del formulario de contacto
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Obtener los valores del formulario
            const name = document.getElementById('name').value;
            const phone = document.getElementById('phone').value;
            const message = document.getElementById('message').value;
            
            // Aquí normalmente enviarías los datos a un servidor
            // Por ahora, solo mostraremos un mensaje de éxito
            
            // Crear un elemento para mostrar el mensaje de éxito
            const successMessage = document.createElement('div');
            successMessage.className = 'success-message';
            successMessage.innerHTML = `
                <div class="success-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><path d="m9 11 3 3L22 4"/></svg>
                </div>
                <h3>¡Mensaje enviado con éxito!</h3>
                <p>Gracias por contactarnos, ${name}. Te responderemos lo antes posible.</p>
                <button class="btn btn-primary" id="resetForm">Enviar otro mensaje</button>
            `;
            
            // Ocultar el formulario y mostrar el mensaje de éxito
            contactForm.style.display = 'none';
            contactForm.parentNode.appendChild(successMessage);
            
            // Añadir evento para resetear el formulario
            document.getElementById('resetForm').addEventListener('click', function() {
                contactForm.reset();
                successMessage.remove();
                contactForm.style.display = 'grid';
            });
        });
    }
});