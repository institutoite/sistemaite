document.addEventListener("DOMContentLoaded", function() {
    
    /* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% barra superior */
    const infoBar = document.getElementById("info-bar");
    const today = new Date();
    const month = today.getMonth() + 1; // Mes actual (enero es 0)
    const day = today.getDate(); // Día actual
    
    let message = "";

    // Definir mensajes según la fecha
    if (month === 8 && day === 6) {
        message = "¡Feliz Día de la Independencia!";
    } else if (month === 5 && day === 27) {
        message = "¡Feliz Día de la Madre!";
    } else if (month === 12 && day === 25) {
        message = "¡Feliz Navidad!";
    } else if (month === 1 && day === 1) {
        message = "¡Feliz Año Nuevo!";
    } else {
        message = "Bienvenido a nuestra página web";
    }

    // Mostrar la barra si hay un mensaje
    if (message) {
        infoBar.textContent = message;
        infoBar.style.display = "block";
    }
    /* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% barra superior */
    
});
