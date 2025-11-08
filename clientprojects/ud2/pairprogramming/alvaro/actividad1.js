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
  if (tarea.trim() === "") {
    mensajes.textContent = "El campo no puede estar vacío";
    return;
  } else {
    mensajes.textContent = ""; // limpia mensajes si todo está bien
  }
  // 3. Convertir texto a mayúsculas/minúsculas (conversiones de tipo)
  tarea = tarea.toUpperCase();

  // 4. Crear un <li> y añadir la tarea al <ul>
  const li = document.createElement("li");
  li.textContent = tarea;
  lista.appendChild(li);

  // 5. Recorrer todas las tareas con un bucle y mostrarlas en consola
  const tareas = lista.querySelectorAll("li");
  tareas.forEach((tarea, index) => {
    console.log(`Tarea ${index + 1}: ${tarea.textContent}`);
  });

  // 6. Mostrar mensajes en el div #mensajes

  input.value = "";
});
