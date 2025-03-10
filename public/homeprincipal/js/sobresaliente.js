// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Código existente para el menú y animación de scroll...
    
    // Carrusel de cursos destacados
    const coursesSlider = document.getElementById('coursesSlider');
    const prevCourse = document.getElementById('prevCourse');
    const nextCourse = document.getElementById('nextCourse');
    const coursesDots = document.getElementById('coursesDots');
    
    if (coursesSlider && prevCourse && nextCourse && coursesDots) {
        const courseCards = coursesSlider.querySelectorAll('.course-card');
        let currentIndex = 0;
        let cardsPerView = getCardsPerView();
        let totalSlides = Math.ceil(courseCards.length / cardsPerView);
        
        // Crear los dots de navegación
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement('div');
            dot.classList.add('slider-dot');
            if (i === 0) dot.classList.add('active');
            dot.addEventListener('click', () => {
                goToSlide(i);
            });
            coursesDots.appendChild(dot);
        }
        
        // Función para obtener cuántas tarjetas se muestran por vista según el ancho de la pantalla
        function getCardsPerView() {
            if (window.innerWidth < 768) {
                return 1;
            } else if (window.innerWidth < 1200) {
                return 2;
            } else {
                return 3;
            }
        }
        
        // Función para ir a una diapositiva específica
        function goToSlide(index) {
            if (index < 0) {
                index = 0;
            } else if (index >= totalSlides) {
                index = totalSlides - 1;
            }
            
            currentIndex = index;
            const slideWidth = courseCards[0].offsetWidth + 30; // Ancho + gap
            coursesSlider.scrollLeft = index * slideWidth * cardsPerView;
            
            // Actualizar dots activos
            const dots = coursesDots.querySelectorAll('.slider-dot');
            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }
        
        // Event listeners para los botones de navegación
        prevCourse.addEventListener('click', () => {
            goToSlide(currentIndex - 1);
        });
        
        nextCourse.addEventListener('click', () => {
            goToSlide(currentIndex + 1);
        });
        
        // Actualizar cardsPerView y totalSlides cuando cambia el tamaño de la ventana
        window.addEventListener('resize', () => {
            cardsPerView = getCardsPerView();
            totalSlides = Math.ceil(courseCards.length / cardsPerView);
            
            // Recrear los dots
            coursesDots.innerHTML = '';
            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('div');
                dot.classList.add('slider-dot');
                if (i === currentIndex) dot.classList.add('active');
                dot.addEventListener('click', () => {
                    goToSlide(i);
                });
                coursesDots.appendChild(dot);
            }
            
            // Ajustar la posición actual
            goToSlide(Math.min(currentIndex, totalSlides - 1));
        });
    }
});