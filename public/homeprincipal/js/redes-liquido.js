document.addEventListener('DOMContentLoaded', () => {

    const socialBanner = document.querySelector('.social-banner');
    if (!socialBanner) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Añade la clase 'is-visible' al contenedor principal.
                // El CSS se encargará del resto, incluida la animación escalonada.
                socialBanner.classList.add('is-visible');

                // Aplicamos el retardo a cada hijo para que la animación @keyframes se dispare en cascada
                const socialLinks = socialBanner.querySelectorAll('.social-link');
                socialLinks.forEach((link, index) => {
                    link.style.animationDelay = `${index * 100}ms`;
                });

                observer.unobserve(socialBanner); // Optimización: deja de observar.
            }
        });
    }, {
        threshold: 0.2 // Se activa cuando el 20% de la sección es visible
    });

    observer.observe(socialBanner);
});
