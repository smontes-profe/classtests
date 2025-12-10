"use strict";

const boton = document.getElementById("saludar");
const input = document.getElementById("nombre");
const mensajesDiv = document.getElementById("mensajes");

boton.addEventListener("click", function () {
  const nombre = input.value.trim();
  if (nombre === "") {
    alert("Por favor, ingresa un nombre.");
    return;
  }

  const mensaje = "Hola, " + nombre + "! Bienvenido/a.";

  const nuevoMensaje = document.createElement("div");
  nuevoMensaje.textContent = mensaje;
  mensajesDiv.appendChild(nuevoMensaje);

  alert(mensaje);

  const ventana = window.open("", "bienvenido/a", "width=300,height=200");
  ventana.document.write(`<h3>${mensaje}</h3>`);

  setTimeout(() => {
    nuevoMensaje.style.opacity = 0;
    setTimeout(() => {
      mensajesDiv.removeChild(nuevoMensaje);
    }, 500);
  }, 5000);

    input.value = "";
});
