"use strict";

/* 
  Actividad 2 - Miniproyecto Gestor de Tareas
  Objetivo: añadir comentarios explicativos, documentación,
  y nuevas funcionalidades (completar/eliminar).
  Lenguaje utilizado: JavaScript, adecuado en entorno cliente
  por ser interpretado directamente en el navegador y permitir
  la manipulación del DOM sin necesidad de compilación.
*/

/*
  Autoría: @Montes y @Sanchez
  Lenguaje: JavaScript
  Finalidad: aplicación web  cliente para registrar, completar y eliminar tareas.
  Por qué JavaScript en entorno cliente:
    - Se ejecuta directamente en el navegador sin compilación, programación funcional.
    - Permite manipular el DOM en tiempo real (añadir/editar/eliminar elementos).
    - Ofrece manejo de eventos (click, dblclick, keyboard) accesible y estándar.
*/

// Capturar elementos del DOM
// Referencias a los elemntos del HTML necesarios para la app
const input = document.getElementById("tareaInput");
const btnAgregar = document.getElementById("btnAgregar");
const lista = document.getElementById("listaTareas");
const mensajes = document.getElementById("mensajes");

// Evento para el botón
btnAgregar.addEventListener("click", () => {
  let tarea = input.value;

  if (tarea.trim() === "") {
    mensajes.textContent = "La tarea no puede estar vacía.";
    return;
  }

  // Crear elemento <li>
  const li = document.createElement("li");
  li.textContent = tarea;

  // ✅ Marcar como completada al hacer clic
  li.addEventListener("click", () => {
    li.classList.toggle("completada");
  });

  // 🗑️ Eliminar tarea al hacer doble clic
  // Eliminamos el <li> del <ul> padre.
  li.addEventListener("dblclick", () => {
    if (lista && li.parentElement === lista) {
      lista.removeChild(li);
      mostrarMensaje("Tarea eliminada.");
    }
  });

  // Insertar el <li> dentro del <ul> correspondiente
  // Feedback y limpieza del input para mejor flujo de uso
  lista.appendChild(li);
  input.value = "";
  input.focus();
  mostrarMensaje("Tarea añadida.");
});
