document.addEventListener("DOMContentLoaded", () => {
    const swiper = new Swiper('.swiper', {
      // Parámetros opcionales
      direction: 'horizontal',
      loop: true,
  
      // Paginación
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
  
      // Flechas de navegación
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
  
      // Barra de desplazamiento (opcional)
      scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true,
      },
  
      // Reproducción automática
      autoplay: {
        delay: 1500, // Cambia de slide cada 3 segundos
        disableOnInteraction: false, // Sigue deslizándose aunque el usuario interactúe
      },
  
      // Responsive: cantidad de slides visibles
      breakpoints: {
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
      },
    });
  });
  