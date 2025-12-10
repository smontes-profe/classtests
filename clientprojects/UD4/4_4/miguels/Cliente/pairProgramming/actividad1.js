"use strict";

/* 
  Actividad 1 - Miniproyecto Gestor de Tareas
  Objetivo: practicar variables, operadores, ámbitos, conversiones,
  decisiones, bucles y depuración.
*/

// Capturar elementos del DOM
const input = document.getElementById("tareaInput");
const btnAgregar = document.getElementById("btnAgregar");
const lista = document.getElementById("listaTareas");
const mensajes = document.getElementById("mensajes");
let listaLi = [];

// Evento para el botón
btnAgregar.addEventListener("click", () => {
  // 1. Obtener valor del input
  let tarea = input.value;

  // 2. Validar que no esté vacío (if/else)
  if (tarea.trim() === "") {
    mensajes.textContent = "Error, elemento sin contenido.";
    return;
  }
  // 3. Convertir texto a mayúsculas/minúsculas (conversiones de tipo)

  tarea = tarea.toUpperCase();

  // 4. Crear un <li> y añadir la tarea al <ul>
  const nuevoLi = document.createElement("li");
  nuevoLi.textContent = tarea;
  lista.appendChild(nuevoLi);

  // 5. Recorrer todas las tareas con un bucle y mostrarlas en consola

  listaLi.push(tarea);

  for (const elemento of listaLi) {
    console.log(elemento);
  }

  // 6. Mostrar mensajes en el div #mensajes
  mensajes.textContent = "Tarea añadida.";
});
