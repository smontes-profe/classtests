/**
 * Agrega un mensaje a la lista de log en el DOM.
 * @param {string} mensaje - El mensaje a mostrar en el log.
 */
function log(mensaje) {
    const ul = document.getElementById('log');
    const li = document.createElement('li');
    li.textContent = mensaje;
    ul.appendChild(li);
}

const Raton = document.getElementById('zona-mouse');

/**
 * Evento mouseenter: Se dispara cuando el ratón entra en la zona.
 * Añade la clase highlight y registra el evento.
 */
Raton.addEventListener('mouseenter', () => {
    Raton.classList.add('highlight');
    log('Ratón Entró');
});

/**
 * Evento mouseleave: Se dispara cuando el ratón sale de la zona.
 * Quita la clase highlight y registra el evento.
 */
Raton.addEventListener('mouseleave', () => {
    Raton.classList.remove('highlight');
    log('Ratón Salió');
});

/**
 * Evento click: Se dispara al hacer clic en la zona.
 * Registra el evento.
 */
Raton.addEventListener('click', () => {
    log('Clic');
});

/**
 * Evento mousemove: Se dispara al mover el ratón dentro de la zona.
 * Registra la posición X e Y del ratón.
 */
Raton.addEventListener('mousemove', (event) => {
    log('Ratón moviéndose en X: ' + event.clientX + ', Y: ' + event.clientY);
});

const Teclado = document.getElementById('input-texto');

/**
 * Evento focus: Se dispara cuando el input recibe el foco.
 * Registra el evento.
 */
Teclado.addEventListener('focus', () => {
    log('Input enfocado');
});

/**
 * Evento blur: Se dispara cuando el input pierde el foco.
 * Registra el evento.
 */
Teclado.addEventListener('blur', () => {
    log('Input desenfocado');
});

/**
 * Evento keydown: Se dispara al presionar una tecla.
 * Registra la tecla presionada.
 */
Teclado.addEventListener('keydown', (event) => {
    log('Tecla pulsada: ' + event.key);
});

/**
 * Evento keyup: Se dispara al soltar una tecla.
 * Registra el código de la tecla soltada.
 */
Teclado.addEventListener('keyup', (event) => {
    log('Tecla soltada: ' + event.code);
});
