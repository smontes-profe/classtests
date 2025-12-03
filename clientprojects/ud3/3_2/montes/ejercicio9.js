// 10. Objeto window, DOM y eventos:
// ------PUNTOS: 2

// Juego de saludo interactivo con ventana emergente

// Crear una página con:
// <h2>Saludo Interactivo</h2>
// <input id="nombre" placeholder="Ingresa tu nombre">
// <button id="saludar">Saludar</button>
// <div id="mensajes"></div>

// Comportamiento esperado:
// Cuando el usuario escriba su nombre y haga clic en Saludar:
// Se mostrará un mensaje dentro del <div id="mensajes"> que diga: "¡Hola [nombre]! Bienvenido/a."
// Aparecerá una alerta usando window.alert con el mismo mensaje.
// Se abrirá una ventana hija (window.open) con un mensaje de bienvenida que incluya el nombre del usuario.
// Cada mensaje nuevo debe agregarse al DOM, sin borrar los anteriores.
// Además, después de 5 segundos desde que aparece el mensaje, este debe desaparecer automáticamente usando setTimeout.

// Opcionales (para más práctica):
// Validar que el campo de nombre no esté vacío antes de saludar.
// Añadir un botón dentro de la ventana hija que envíe un mensaje de vuelta a la ventana principal usando postMessage.

const nombre = document.getElementById("nombre");
const saludar = document.getElementById("saludar");
const mensajes = document.getElementById("mensajes");

saludar.addEventListener("click", () => {
    if (nombre.value.trim() === "") {
        alert("Por favor, ingrese su nombre");
    } else {
        mensajes.innerHTML = `¡Hola ${nombre.value}! Bienvenido/a.`;
        alert(`¡Hola ${nombre.value}! Bienvenido/a.`);
        window.open(`¡Hola ${nombre.value}! Bienvenido/a.`, "_blank");
    }
});

setTimeout(() => {
    mensajes.innerHTML = "";
}, 5000);
