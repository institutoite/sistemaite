// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Código existente para el menú...
    
    // Función para animar elementos al hacer scroll
    function checkScroll() {
        const elements = document.querySelectorAll('.fade-in-scroll');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            // Si el elemento está visible en la ventana
            if (elementTop < windowHeight - 100) {
                element.classList.add('visible');
            }
        });
    }
    
    // Verificar elementos visibles al cargar la página
    checkScroll();
    
    // Verificar elementos visibles al hacer scroll
    window.addEventListener('scroll', checkScroll);
});