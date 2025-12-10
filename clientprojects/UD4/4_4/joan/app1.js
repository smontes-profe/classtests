/**
 * Añade un mensaje al registro de eventos
 * @param {string} mensaje - El mensaje a registrar en el log
 */
function log(mensaje) {
    const logElement = document.getElementById('log');
    const li = document.createElement('li');
    li.textContent = mensaje;
    logElement.appendChild(li);
    logElement.scrollTop = logElement.scrollHeight;
}

// Selección de elementos
const zonaRaton = document.getElementById('zona-mouse');
const inputTexto = document.getElementById('input-texto');

/**
 * Maneja el evento mouseenter añadiendo clase highlight
 */
function handleMouseEnter() {
    zonaRaton.classList.add('highlight');
    log('Ratón Entró');
}

/**
 * Maneja el evento mouseleave quitando clase highlight
 */
function handleMouseLeave() {
    zonaRaton.classList.remove('highlight');
    log('Ratón Salió');
}

/**
 * Maneja el evento click en la zona de ratón
 */
function handleClick() {
    log('Clic');
}

/**
 * Maneja el evento mousemove mostrando las coordenadas del cursor
 * @param {MouseEvent} event - El evento de movimiento del ratón
 */
function handleMouseMove(event) {
    log(`Ratón moviéndose en X: ${event.clientX}, Y: ${event.clientY}`);
}

/**
 * Maneja el evento focus del input
 */
function handleFocus() {
    log('Input enfocado');
}

/**
 * Maneja el evento blur del input
 */
function handleBlur() {
    log('Input desenfocado');
}

/**
 * Maneja el evento keydown mostrando la tecla pulsada
 * @param {KeyboardEvent} event - El evento de teclado
 */
function handleKeyDown(event) {
    log(`Tecla pulsada: ${event.key}`);
}

/**
 * Maneja el evento keyup mostrando el código de la tecla
 * @param {KeyboardEvent} event - El evento de teclado
 */
function handleKeyUp(event) {
    log(`Tecla soltada: ${event.code}`);
}

// Eventos de ratón
zonaRaton.addEventListener('mouseenter', handleMouseEnter);
zonaRaton.addEventListener('mouseleave', handleMouseLeave);
zonaRaton.addEventListener('click', handleClick);
zonaRaton.addEventListener('mousemove', handleMouseMove);

// Eventos de teclado
inputTexto.addEventListener('focus', handleFocus);
inputTexto.addEventListener('blur', handleBlur);
inputTexto.addEventListener('keydown', handleKeyDown);
inputTexto.addEventListener('keyup', handleKeyUp);
