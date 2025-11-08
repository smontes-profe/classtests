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
    mensajes.textContent = "Por favor, escribe una tarea";
    mensajes.style.color = "red";
    return;
  } else {
    mensajes.textContent = "";
  }

  // 3. Convertir texto a mayúsculas/minúsculas (conversiones de tipo)
  tarea = String(tarea).trim().toUpperCase();

  // 4. Crear un <li> y añadir la tarea al <ul>
  const li = document.createElement("li");
  li.textContent = tarea;

  // Evento para marcar como completada al hacer clic
  li.addEventListener("click", () => {
    li.classList.toggle("completada");
  });

  lista.appendChild(li);

  // 5. Recorrer todas las tareas con un bucle y mostrarlas en consola
  console.log("=== Lista de tareas ===");
  const todasLasTareas = lista.querySelectorAll("li");

  for (let i = 0; i < todasLasTareas.length; i++) {
    console.log(`${i + 1}. ${todasLasTareas[i].textContent}`);
  }

  // 6. Mostrar mensajes en el div #mensajes
  mensajes.textContent = `Tarea "${tarea}" añadida correctamente`;
  mensajes.style.color = "green";

  // Limpiar input
  input.value = "";
});

