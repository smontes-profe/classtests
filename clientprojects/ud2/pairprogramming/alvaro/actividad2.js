/* 
  Actividad 2 - Miniproyecto Gestor de Tareas
  Objetivo: añadir comentarios explicativos, documentación,
  y nuevas funcionalidades (completar/eliminar).
  Lenguaje utilizado: JavaScript, adecuado en entorno cliente
  por ser interpretado directamente en el navegador y permitir
  la manipulación del DOM sin necesidad de compilación.
*/

/*  
  Actividad 2 - Miniproyecto Gestor de Tareas
  Autor: Álvaro y Roberto
  Lenguaje: JavaScript
  Finalidad: Gestor de tareas para practicar manipulación del DOM,
  validación de inputs y eventos en entorno cliente.
  Justificación: JavaScript permite manipular la página web en tiempo real
  sin necesidad de recargarla, ideal para esta actividad.
*/

// Capturar elementos del DOM
const input = document.getElementById("tareaInput");
const btnAgregar = document.getElementById("btnAgregar");
const lista = document.getElementById("listaTareas");
const mensajes = document.getElementById("mensajes");

// Función para agregar una tarea
btnAgregar.addEventListener("click", () => {
  let tarea = input.value;

  // Validar input
  if (tarea.trim() === "") {
    mensajes.textContent = "La tarea no puede estar vacía.";
    return;
  }
  mensajes.textContent = "";

  // Convertir a mayúsculas para mantener consistencia
  tarea = tarea.toUpperCase();

  // Crear elemento <li>
  const li = document.createElement("li");
  li.textContent = tarea;

  // ✅ Funcionalidad “Completar” al hacer clic
  li.addEventListener("click", () => {
    li.classList.toggle("completada"); // alterna el tachado
  });

  // 🗑️ Funcionalidad “Eliminar” al hacer doble clic
  li.addEventListener("dblclick", () => {
    lista.removeChild(li);
  });

  // Añadir la tarea a la lista
  lista.appendChild(li);

  // Limpiar input
  input.value = "";
});