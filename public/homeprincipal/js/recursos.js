document.addEventListener('DOMContentLoaded', () => {

    const recursosSection = document.querySelector('.recursos-section');
    if (!recursosSection) return;

    // Observer para la animación de entrada
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Añadimos una clase al contenedor principal para que el CSS reaccione.
                recursosSection.classList.add('is-visible');

                // Aplicamos un retardo escalonado a cada ficha.
                const recursoCards = recursosSection.querySelectorAll('.recurso-card');
                recursoCards.forEach((card, index) => {
                    card.style.animationDelay = `${index * 100}ms`;
                });

                observer.unobserve(recursosSection);
            }
        });
    }, { 
        threshold: 0.1 // La animación se dispara cuando el 10% de la sección es visible.
    });

    observer.observe(recursosSection);
});
