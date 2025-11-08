/* 
  Actividad 2 - Miniproyecto Gestor de Tareas - Rafael Verdugo y Miguel Moreno
  Objetivo: añadir comentarios explicativos, documentación,
  y nuevas funcionalidades (completar/eliminar).
  Lenguaje utilizado: JavaScript, adecuado en entorno cliente
  por ser interpretado directamente en el navegador y permitir
  la manipulación del DOM sin necesidad de compilación.
  Además, proprociona gestión de eventos que permite responder a las acciones del 
  usuario (clics, doble clics, entrada de texto, etc.) de forma asíncrona y es ligero y no requiere recarga de página para actualizar el contenido,
  mejorando la experiencia de usuario.
*/

// Capturar elementos del DOM
//Los elementos del HTML que vamos a utilizar en el JS
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
  li.textContent = tarea;// Crea y añade listado de tareas

  // Marcar como completada al hacer clic
  li.addEventListener("click", () => {
    li.classList.toggle("completada");
  });

  // Eliminar tarea al hacer doble clic
  li.addEventListener("dblclick", () => {
    lista.removeChild(li);
  });

  lista.appendChild(li);//Cambia el valor por uno vacío
  input.value = "";
});