// --- app1.js ---

// Referencias
const zonaMouse = document.getElementById('zona-mouse');
const inputTexto = document.getElementById('input-texto');

// Añade un mensaje al log (lo pone arriba del todo)
function log(mensaje) {
    const logList = document.getElementById('log');
    const newItem = document.createElement('li');
    newItem.textContent = mensaje;
    logList.prepend(newItem);
}


// --- Ratón ---


zonaMouse.addEventListener('mouseenter', () => {
    zonaMouse.classList.add('highlight');
    log("Ratón Entró");
});

zonaMouse.addEventListener('mouseleave', () => {
    zonaMouse.classList.remove('highlight');
    log("Ratón Salió");
});

zonaMouse.addEventListener('click', () => {
    log("Clic");
});

// Muestra coordenadas relativas al elemento
zonaMouse.addEventListener('mousemove', (event) => {
    const rect = zonaMouse.getBoundingClientRect();
    // Calculamos la posición dentro del div
    const posX = Math.floor(event.clientX - rect.left);
    const posY = Math.floor(event.clientY - rect.top);
    log(`Ratón moviéndose en X: ${posX}, Y: ${posY}`);
});

// --- Teclado ---


inputTexto.addEventListener('focus', () => {
    log("Input enfocado");
});

inputTexto.addEventListener('blur', () => {
    log("Input desenfocado");
});

// Al pulsar tecla
inputTexto.addEventListener('keydown', (event) => {
    log(`Tecla pulsada: ${event.key}`);
});

// Al soltar tecla
inputTexto.addEventListener('keyup', (event) => {
    log(`Tecla soltada: ${event.code}`);
});