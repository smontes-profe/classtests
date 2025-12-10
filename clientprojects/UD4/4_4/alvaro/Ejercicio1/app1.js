/**
 * @fileoverview Script para el Ejercicio 1: Laboratorio de Eventos.
 * Maneja eventos de ratón y teclado y registra la información en una lista.
 */

// 1. Selección del DOM
const logList = document.getElementById('log');
const zonaMouse = document.getElementById('zona-mouse');
const inputTexto = document.getElementById('input-texto');


/**
 * Añade un nuevo elemento <li> al <ul> de registro.
 * @param {string} mensaje - El texto que se registrará.
 */
function log(mensaje) {
    const nuevoLi = document.createElement('li');
    const timestamp = new Date().toLocaleTimeString(); 
    nuevoLi.textContent = `[${timestamp}] ${mensaje}`;
    logList.appendChild(nuevoLi);
    // Hace scroll automático hacia abajo
    logList.scrollTop = logList.scrollHeight; 
}

// --- Eventos de Ratón ---

/**
 * Manejador para el evento 'mouseenter' en la zona de ratón.
 * Añade la clase 'highlight' y registra la acción.
 * @param {Event} event - El objeto de evento.
 */
zonaMouse.addEventListener('mouseenter', (event) => {
    zonaMouse.classList.add('highlight');
    log('Ratón Entró');
});

/**
 * Manejador para el evento 'mouseleave' en la zona de ratón.
 * Quita la clase 'highlight' y registra la acción.
 * @param {Event} event - El objeto de evento.
 */
zonaMouse.addEventListener('mouseleave', (event) => {
    zonaMouse.classList.remove('highlight');
    log('Ratón Salió');
});

/**
 * Manejador para el evento 'click' en la zona de ratón.
 * Registra la acción.
 * @param {MouseEvent} event - El objeto de evento de ratón.
 */
zonaMouse.addEventListener('click', (event) => {
    log('Clic');
});

/**
 * Manejador para el evento 'mousemove' en la zona de ratón.
 * Registra las coordenadas X e Y del cursor relativas al elemento.
 * @param {MouseEvent} event - El objeto de evento de ratón.
 */
zonaMouse.addEventListener('mousemove', (event) => {
    const posX = event.offsetX;
    const posY = event.offsetY;
    
    // Optimización: Eliminar el mensaje anterior de 'mousemove' para evitar inundar el log
    if (logList.lastChild && logList.lastChild.textContent.includes('Ratón moviéndose')) {
         logList.removeChild(logList.lastChild);
    }
    log(`Ratón moviéndose en X: (${posX}), Y: (${posY})`);
});

// --- Eventos de Teclado ---

/**
 * Manejador para el evento 'focus' en el input de texto.
 * Registra que el input está enfocado.
 * @param {FocusEvent} event - El objeto de evento de foco.
 */
inputTexto.addEventListener('focus', (event) => {
    log('Input enfocado');
});

/**
 * Manejador para el evento 'blur' en el input de texto.
 * Registra que el input ha perdido el foco.
 * @param {FocusEvent} event - El objeto de evento de foco.
 */
inputTexto.addEventListener('blur', (event) => {
    log('Input desenfocado');
});

/**
 * Manejador para el evento 'keydown' en el input de texto.
 * Registra la tecla que se está pulsando (usando event.key).
 * @param {KeyboardEvent} event - El objeto de evento de teclado.
 */
inputTexto.addEventListener('keydown', (event) => {
    log(`Tecla pulsada: (${event.key})`);
});

/**
 * Manejador para el evento 'keyup' en el input de texto.
 * Registra la tecla que se ha soltado (usando event.code).
 * @param {KeyboardEvent} event - El objeto de evento de teclado.
 */
inputTexto.addEventListener('keyup', (event) => {
    log(`Tecla soltada: (${event.code})`);
});