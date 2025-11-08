/* 
  Actividad 1 - Miniproyecto Gestor de Tareas
  Objetivo: practicar variables, operadores, ámbitos, conversiones,
  decisiones, bucles y depuración.
*/

// Capturar elementos del DOM
//Los elementos del HTML que vamos a utilizar en el JS
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
    mensajes.textContent = "La tarea no puede estar vacía.";
    return;
  }else{
    mensajes.textContent = "";
  }
  // 3. Convertir texto a mayúsculas (conversiones de tipo)
  tarea = tarea.toUpperCase(); // A mayúsculas

  // 4. Crear un HTML donde haya un <li> y añadir la tarea al <ul>
  const li = document.createElement("li");
  li.textContent = tarea;
  lista.appendChild(li);
  input.value = "";

  // 5. Recorrer todas las tareas con un bucle y mostrarlas en consola
  const tareas = lista.getElementsByTagName("li");
  for (let i = 0; i < tareas.length; i++) {
    console.log(tareas[i].textContent);
  }

  // 6. Mostrar mensajes en el div #mensajes
  mensajes.textContent = "Tarea agregada.";
});
