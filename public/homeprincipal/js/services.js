// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', () => {

    // --- Animación de Scroll con IntersectionObserver ---
    const scrollElements = document.querySelectorAll('.fade-in-scroll');

    if (window.IntersectionObserver) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                    // Opcional: dejar de observar después de la primera animación
                    observer.unobserve(entry.target); 
                }
            });
        }, { threshold: 0.1 });

        scrollElements.forEach(el => {
            observer.observe(el);
        });
    } else {
        // Fallback para navegadores antiguos
        const handleScrollAnimation = () => {
            scrollElements.forEach((el) => {
                const elementTop = el.getBoundingClientRect().top;
                if (elementTop <= (window.innerHeight || document.documentElement.clientHeight) * 0.9) {
                    el.classList.add('is-visible');
                }
            });
        }
        window.addEventListener('scroll', handleScrollAnimation);
        handleScrollAnimation();
    }

    // --- Efecto 3D Hover en las Tarjetas ---
    const serviceCards = document.querySelectorAll('.service-card');

    serviceCards.forEach(card => {
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y - centerY) / centerY) * -8; // Rango de rotación: -8 a 8 grados
            const rotateY = ((x - centerX) / centerX) * 8;   // Rango de rotación: -8 a 8 grados

            card.style.setProperty('--rotateX', `${rotateX}deg`);
            card.style.setProperty('--rotateY', `${rotateY}deg`);
        });

        card.addEventListener('mouseleave', () => {
            card.style.setProperty('--rotateX', '0deg');
            card.style.setProperty('--rotateY', '0deg');
        });
    });
});