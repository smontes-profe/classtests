/**
 * Añade mensaje al log
 * @param {string} mensaje - Mensaje a mostrar
 */
function log(mensaje) {
    const logElement = document.getElementById('log');
    const li = document.createElement('li');
    li.textContent = mensaje;
    logElement.appendChild(li);
}

// EVENTOS DE RATÓN

const zonaMouse = document.getElementById('zona-mouse');

/**
 * Cuando el ratón entra en la zona
 */
function mouseenter() {
    zonaMouse.classList.add('highlight');
    log('Ratón Entró');
}

/**
 * Cuando el ratón sale de la zona
 */
function mouseleave() {
    zonaMouse.classList.remove('highlight');
    log('Ratón Salió');
}

/**
 * Al hacer clic
 */
function click() {
    log('Clic');
}

/**
 * Al mover el ratón
 * @param {MouseEvent} event - Coordenadas del ratón
 */
function mousemove(event) {
    log(`Ratón moviéndose en X: ${event.clientX}, Y: ${event.clientY}`);
}

// Añadir listeners de ratón
zonaMouse.addEventListener('mouseenter', mouseenter);
zonaMouse.addEventListener('mouseleave', mouseleave);
zonaMouse.addEventListener('click', click);
zonaMouse.addEventListener('mousemove', mousemove);

// EVENTOS DE TECLADO

const inputTexto = document.getElementById('input-texto');

/**
 * Cuando el input recibe foco
 */
function focus() {
    log('Input enfocado');
}

/**
 * Cuando el input pierde foco
 */
function blur() {
    log('Input desenfocado');
}

/**
 * Al pulsar una tecla
 * @param {KeyboardEvent} event - Info de la tecla
 */
function keydown(event) {
    log(`Tecla pulsada: ${event.key}`);
}

/**
 * Al soltar una tecla
 * @param {KeyboardEvent} event - Código de la tecla
 */
function keyup(event) {
    log(`Tecla soltada: ${event.code}`);
}

// Añadir listeners de eventos de teclado
inputTexto.addEventListener('focus', focus);
inputTexto.addEventListener('blur', blur);
inputTexto.addEventListener('keydown', keydown);
inputTexto.addEventListener('keyup', keyup);
