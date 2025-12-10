//Creo la funcion log, que va a hacer que aparezca una nueva linea de registro HTML. Esto hace que guarde en variables elementos del html para poder añadirles eventos despues 
function log(mensaje) {
    const lista = document.getElementById("log");
    const li = document.createElement("li");
    li.textContent = mensaje;
    lista.appendChild(li);
}

const zonaMouse = document.getElementById("zona-mouse");
const inputTexto = document.getElementById("input-texto");

//Para los eventos del raton

//Hago el evento para cuando el raton entra
zonaMouse.addEventListener("mouseenter", () => {
    zonaMouse.classList.add("highlight");
    log("Ratón Entró");
});

//Hago el evento para cuando el raton sale
zonaMouse.addEventListener("mouseleave", () => {
    zonaMouse.classList.remove("highlight");
    log("Ratón Salió");
});

//Hago el evento del click
zonaMouse.addEventListener("click", () => {
    log("Clic");
});

//Hago el evento del movimiento del raton
zonaMouse.addEventListener("mousemove", (event) => {
    log(`Ratón moviéndose en X: ${event.clientX}, Y: ${event.clientY}`);
});

//Para los eventos del teclado

//Hago el evento del focus
inputTexto.addEventListener("focus", () => {
    log("Input enfocado");
});

//Hago el evento del blur
inputTexto.addEventListener("blur", () => {
    log("Input desenfocado");
});

//Hago el evento de la tecla pulsada
inputTexto.addEventListener("keydown", (event) => {
    log(`Tecla pulsada: ${event.key}`);
});

//Hago el evento de la tecla soltada
inputTexto.addEventListener("keyup", (event) => {
    log(`Tecla soltada: ${event.code}`);
});