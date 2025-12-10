/**
 * Añade un mensaje al registrar eventos en pantalla 
 * @param {string} mensaje - El texto del mensaje a mostrar en el log
 */
function log(mensaje) {
    const logList = document.getElementById('log');
    const nuevoElemento = document.createElement('li');
    nuevoElemento.textContent = mensaje;
    logList.appendChild(nuevoElemento);
    // Auto-scroll al último mensaje
    logList.scrollTop = logList.scrollHeight;
}

/**
 * Maneja el evento de entrada del ratón en la zona
 * @param {MouseEvent} event - El objeto del evento de ratón
 */
function manejarMouseEnter(event) {
    event.target.classList.add('highlight');
    log('Ratón Entró');
}

/**
 * Maneja el evento de salida del ratón de la zona
 * @param {MouseEvent} event - El objeto del evento de ratón
 */
function manejarMouseLeave(event) {
    event.target.classList.remove('highlight');
    log('Ratón Salió');
}

/**
 * Maneja el evento de clic en la zona del ratón
 * @param {MouseEvent} event - El objeto del evento de ratón
 */
function manejarClick(event) {
    log('Clic');
}

/**
 * Maneja el evento de movimiento del ratón y registra su posición
 * @param {MouseEvent} event - El objeto del evento de ratón
 */
function manejarMouseMove(event) {
    log(`Ratón: X: ${event.clientX}, Y: ${event.clientY}`);
}

/**
 * Maneja el evento de enfoque en el input de texto
 * @param {FocusEvent} event - El objeto del evento de enfoque
 */
function manejarFocus(event) {
    log('Teclado enfocado');
}

/**
 * Maneja el evento de pérdida de enfoque en el input de texto
 * @param {FocusEvent} event - El objeto del evento de enfoque
 */
function manejarBlur(event) {
    log('Teclado desenfocado');
}

/**
 * Maneja el evento de tecla pulsada y registra qué tecla fue
 * @param {KeyboardEvent} event - El objeto del evento de teclado
 */
function manejarKeyDown(event) {
    log(`Tecla pulsada: ${event.key}`);
}

/**
 * Maneja el evento de tecla soltada y registra su código
 * @param {KeyboardEvent} event - El objeto del evento de teclado
 */
function manejarKeyUp(event) {
    log(`Tecla soltada: ${event.code}`);
}

/**
 * Inicializa todos los event listeners necesarios para el laboratorio de eventos
 */
function inicializar() {
    // Obtener elementos del DOM
    const zonaMouse = document.getElementById('zona-mouse');
    const inputTexto = document.getElementById('input-texto');

    // Eventos de Ratón
    zonaMouse.addEventListener('mouseenter', manejarMouseEnter);
    zonaMouse.addEventListener('mouseleave', manejarMouseLeave);
    zonaMouse.addEventListener('click', manejarClick);
    zonaMouse.addEventListener('mousemove', manejarMouseMove);

    // Eventos de Teclado
    inputTexto.addEventListener('focus', manejarFocus);
    inputTexto.addEventListener('blur', manejarBlur);
    inputTexto.addEventListener('keydown', manejarKeyDown);
    inputTexto.addEventListener('keyup', manejarKeyUp);

    log('Sistema de eventos iniciado. ¡Comienza a interactuar!');
}

// Iniciar cuando el DOM esté completamente cargado
inicializar();
