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

// Evento para el botón
btnAgregar.addEventListener("click", () => {
  // 1. Obtener valor del input
  let tarea = input.value;

  // 2. Validar que no esté vacío (if/else)
  if (
    tarea.trim() === "" || tarea.trim() === null || tarea.trim() === undefined) {
    mensajes.textContent = "La tarea no puede estar vacía.";
    return;
  }
  mensajes.textContent = ""; // Limpiar mensajes previos
  console.log("Tarea agregada:", tarea);

  // 3. Convertir texto a mayúsculas/minúsculas (conversiones de tipo)
  tarea = tarea.toUpperCase();

  // 4. Crear un <li> y añadir la tarea al <ul>
  const li = document.createElement("li");
  li.textContent = tarea;
  lista.appendChild(li); // antes estaba 'ul'

  // 5. Recorrer todas las tareas con un bucle y mostrarlas en consola
  const todasLasTareas = lista.querySelectorAll("li"); // antes 'ul'
  todasLasTareas.forEach((tareaLi, index) => {
    console.log(`Tarea ${index + 1}: ${tareaLi.textContent}`);
  });

  // 6. Mostrar mensaje de confirmación en el div #mensajes
  mensajes.textContent = "Tarea agregada correctamente.";
});