document.addEventListener('DOMContentLoaded', () => {

    const socialBanner = document.querySelector('.social-banner');
    if (!socialBanner) return; // Si no existe la sección, no hacer nada.

    // El IntersectionObserver es la forma más eficiente de detectar la visibilidad
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            // Cuando la sección entra en la vista del usuario...
            if (entry.isIntersecting) {
                // ...le añadimos una clase para que el CSS pueda reaccionar.
                socialBanner.classList.add('is-visible');

                // Aplicamos un retardo de animación a cada orbe para que caigan en cascada.
                const socialLinks = socialBanner.querySelectorAll('.social-link');
                socialLinks.forEach((link, index) => {
                    link.style.animationDelay = `${index * 120}ms`;
                });

                // Una vez activada la animación, ya no necesitamos observar. Es una optimización.
                observer.unobserve(socialBanner);
            }
        });
    }, { 
        threshold: 0.2 // La animación se dispara cuando el 20% de la sección es visible.
    });

    // Le decimos al observer que empiece a "vigilar" la sección de redes.
    observer.observe(socialBanner);
});