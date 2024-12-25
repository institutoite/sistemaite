document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".number");
  
    const animateCounters = (counter) => {
      counter.innerText = "0"; // Reiniciar el valor al entrar de nuevo
      const target = +counter.getAttribute("data-target");
      const increment = target / 100;
  
      const updateCount = () => {
        const count = +counter.innerText;
  
        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(updateCount, 20);
        } else {
          counter.innerText = target;
        }
      };
  
      updateCount();
    };
  
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            animateCounters(entry.target);
          }
        });
      },
      { threshold: 0.5 } // Activar cuando al menos el 50% de la sección esté visible
    );
  
    counters.forEach((counter) => observer.observe(counter));
  });
  