// Obtener referencias a los elementos

const zona = document.getElementById("zona-sensible");
const input = document.getElementById("input-teclado");
const log = document.getElementById("log-eventos");

// Función para agregar mensajes al log
function agregarLog(mensaje) {
    const li = document.createElement("li");
    li.textContent = mensaje;
    log.appendChild(li);

    // Hacer scroll automático hacia abajo
    log.scrollTop = log.scrollHeight;
}

// Eventos de ratón sobre la zona sensible
zona.addEventListener("mouseover", (event) => {
    zona.classList.add("highlight");
    agregarLog(`mouseover → target: #${event.target.id}`);
});

zona.addEventListener("mouseout", (event) => {
    zona.classList.remove("highlight");
    agregarLog(`mouseout → target: #${event.target.id}`);
});

zona.addEventListener("click", (event) => {
    agregarLog(`click → target: #${event.target.id}`);
});

// Eventos de teclado en el input
input.addEventListener("keydown", (event) => {
    agregarLog(`keydown → tecla: "${event.code}"`);
});

input.addEventListener("keyup", (event) => {
    agregarLog(`keyup → tecla: "${event.code}"`);
});
