/* 
  Actividad 2 - Miniproyecto Gestor de Tareas
  Objetivo: añadir comentarios explicativos, documentación,
  y nuevas funcionalidades (completar/eliminar).
  Lenguaje utilizado: JavaScript, adecuado en entorno cliente
  por ser interpretado directamente en el navegador y permitir
  la manipulación del DOM sin necesidad de compilación.
*/

// Capturar elementos del DOM
const input = document.getElementById("tareaInput");
const btnAgregar = document.getElementById("btnAgregar");
const lista = document.getElementById("listaTareas");
const mensajes = document.getElementById("mensajes");

// Función para añadir una tarea
btnAgregar.addEventListener("click", () => {
  let tarea = input.value.trim(); // Eliminamos espacios innecesarios

  // Validación: el campo no puede estar vacío
  if (tarea === "") {
    mensajes.textContent = "La tarea no puede estar vacía.";
    return;
  }
  mensajes.textContent = ""; // Limpiamos mensajes previos

  // Conversión a mayúsculas para consistencia
  tarea = tarea.toUpperCase();
  console.log("Tarea agregada:", tarea);

  // Crear elemento <li>
  const li = document.createElement("li");
  li.textContent = tarea;

  // Marcar como completada al hacer clic
  li.addEventListener("click", () => {
    li.classList.toggle("completada");
  });

  // Eliminar tarea al hacer doble clic
  li.addEventListener("dblclick", () => {
    lista.removeChild(li);
    console.log("Tarea eliminada:", tarea);
  });

  // Añadir tarea a la lista
  lista.appendChild(li);

  // Mostrar todas las tareas en consola
  lista.querySelectorAll("li").forEach((item, index) => {
    console.log(`Tarea ${index + 1}: ${item.textContent}`);
  });

  // Mensaje de confirmación
  mensajes.textContent = "Tarea agregada correctamente.";

  // Limpiar input para la siguiente tarea
  input.value = "";
});