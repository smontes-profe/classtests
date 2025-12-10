"use strict"

//1. Functions log.
function log(mensaje) {
    const log = document.getElementById('log');
    const li = document.createElement('li');
    li.textContent = mensaje;
    log.appendChild(li);
}

//2. Eventos Raton 
const zonamouse = document.getElementById('zona-mouse');

zonamouse.addEventListener('mouseenter', () => {
    zonamouse.classList.add('highlight');
    log('Ha entrado en la zona');
});

zonamouse.addEventListener('mouseleave', () => {
    zonamouse.classList.remove('highlight');
    log('Ha salido de la zona');
});

zonamouse.addEventListener('click', ()  => {   
    log('Has hecho click en la zona');
});

//3. mousemove

zonamouse.addEventListener('mousemove', (desafio) => {
    const x= desafio.clientX;
    const y= desafio.clientY;
    log(`Ratón moviéndose en X:(${x}) Y:(${y})`);
})

//Eventos de Teclado

const inputtexto = document.getElementById('input-texto');

inputtexto.addEventListener('focus', () => {
    log('Input enfocado');
});

inputtexto.addEventListener('blur', () => {
    log('Input desenfocado');
});

inputtexto.addEventListener('keydown', (evento) => {
    log(`Tecla pulsada: (${evento.key})`);
});

inputtexto.addEventListener('keyup', (evento) => {
    log(`Tecla soltada: (${evento.code})`);
});
