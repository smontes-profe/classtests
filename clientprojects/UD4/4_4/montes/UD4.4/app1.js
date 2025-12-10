'use strict';
// Tareas (app1.js):

// Función Log: Crea una función log(mensaje) que añada un <li> al <ul> con id log.
// Eventos de Ratón: Añade listeners a #zona-mouse para:
// mouseenter: Añade la clase highlight y registra "Ratón Entró".
// mouseleave: Quita la clase highlight y registra "Ratón Salió".
// click: Registra "Clic".
// mousemove: Registra la posición (Desafío). "Ratón moviéndose en X: (posX), Y: (posY)".

function log(mensaje) {
    let li = document.createElement('li');
    li.textContent = mensaje;
    document.getElementById('log').appendChild(li);
}

let zonaMouse = document.getElementById('zona-mouse');
zonaMouse.addEventListener('mouseenter', () => {
    zonaMouse.classList.add('highlight');
    log('Ratón Entró');
});

zonaMouse.addEventListener('mouseleave', () => {
    zonaMouse.classList.remove('highlight');
    log('Ratón Salió');
});

zonaMouse.addEventListener('click', () => {
    log('Clic');
});

zonaMouse.addEventListener('mousemove', (e) => {
    log('Ratón moviéndose en X: ' + e.clientX + ', Y: ' + e.clientY);
});

// Eventos de Teclado: Añade listeners a #input-texto para:
// focus: Registra "Input enfocado".
// blur: Registra "Input desenfocado".
// keydown: Registra "Tecla pulsada: (la tecla pulsada)".
// keyup: Registra "Tecla soltada: (el código de la tecla)".

let inputTexto = document.getElementById('input-texto');

inputTexto.addEventListener('focus', () => {
    log('Input enfocado');
});

inputTexto.addEventListener('blur', () => {
    log('Input desenfocado');
});

inputTexto.addEventListener('keydown', (e) => {
    log('Tecla pulsada: ' + e.key);
});

inputTexto.addEventListener('keyup', (e) => {
    log('Tecla soltada: ' + e.code);
});

