"use strict";

const logElement = document.getElementById("log");
const zonaMouse = document.getElementById("zona-mouse");
const zonaTeclado = document.getElementById("input-texto");

function log(mensajes) {
  const liElemento = document.createElement("li");
  liElemento.textContent = mensajes;
  logElement.appendChild(liElemento);
  logElement.scrollTop = logElement.scrollHeight;
}

zonaMouse.addEventListener("mouseover", (event) => {
  log(event.type);
});

zonaMouse.addEventListener("mpouseout", (event) => {
  log(event.type);
});

zonaMouse.addEventListener("click", (event) => {
  log(event.type);
});

zonaMouse.addEventListener("mousemove", (event) => {
  let positionX = event.clientX;
  let positionY = event.clientY;
  log(`X: ${positionX}, Y: ${positionY}`);
});


zonaTeclado.addEventListener('focus', (event) => {
    log(event.type);
});

zonaTeclado.addEventListener('blur', (event) => {
    log(event.type);
});

zonaTeclado.addEventListener('keydown', (event) => {
    log(`Tipo de evento: ${event.type}, key: ${event.key}, code: ${event.code}`);
});

zonaTeclado.addEventListener('keyup', (event) => {
    log(`Tipo de evento: ${event.type}, key: ${event.key}, code: ${event.code}`);
});
