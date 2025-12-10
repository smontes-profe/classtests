/**
 * Añade un mensaje al log creando un <li> dentro del <ul id="log">
 * @param {string} mensaje - Texto que se mostrará en el registro.
 */
function log(mensaje) {
    const ul = document.getElementById("log");
    const li = document.createElement("li");
    li.textContent = mensaje;
    ul.appendChild(li);
}

// Elementos
const zonaMouse = document.getElementById("zona-mouse");
const inputTexto = document.getElementById("input-texto");

/**
 * Ratón entra
 */
zonaMouse.addEventListener("mouseenter", () => {
    zonaMouse.classList.add("highlight");
    log("Ratón Entró");
});

/**
 * Ratón sale
 */
zonaMouse.addEventListener("mouseleave", () => {
    zonaMouse.classList.remove("highlight");
    log("Ratón Salió");
});

/**
 * Clic
 */
zonaMouse.addEventListener("click", () => {
    log("Clic");
});

/**
 * Movimiento del ratón
 * @param {MouseEvent} event
 */
zonaMouse.addEventListener("mousemove", (event) => {
    log(`Ratón moviéndose en X:${event.offsetX}, Y:${event.offsetY}`);
});

/**
 * Input enfocado
 */
inputTexto.addEventListener("focus", () => {
    log("Input enfocado");
});

/**
 * Input desenfocado
 */
inputTexto.addEventListener("blur", () => {
    log("Input desenfocado");
});

/**
 * Tecla pulsada
 * @param {KeyboardEvent} event
 */
inputTexto.addEventListener("keydown", (event) => {
    log(`Tecla pulsada: ${event.key}`);
});

/**
 * Tecla soltada
 * @param {KeyboardEvent} event
 */
inputTexto.addEventListener("keyup", (event) => {
    log(`Tecla soltada: ${event.code}`);
});
