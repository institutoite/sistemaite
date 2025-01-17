document.addEventListener("DOMContentLoaded", () => {
    const items = document.querySelectorAll(".itenauta-item");
  
    items.forEach(item => {
      item.addEventListener("click", () => {
        alert("¡Sigue participando como Itenauta y gana más ITECOINS!");
      });
    });
  });
  