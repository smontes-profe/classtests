/* 
  
  Autor: Mariano Verdugo
  Lenguaje: JavaScript (entorno cliente)
  Actividad: Gestor de Tareas - Miniproyecto
  -----------------------------------------------------------
  Finalidad:
  Este programa permite al usuario añadir, marcar como completadas 
  y eliminar tareas de una lista interactiva en una página web.
  Practica el uso de variables, operadores, estructuras de control, 
  bucles y manipulación del DOM.

  Justificación del lenguaje:
  Se utiliza JavaScript porque es el lenguaje estándar para la 
  programación en entorno cliente (navegador). Permite manipular 
  dinámicamente los elementos HTML, reaccionar a eventos (clic, 
  doble clic, etc.) y actualizar la interfaz sin recargar la página.
  
*/

//Captura de elementos del DOM 
const input = document.getElementById("tareaInput"); // Campo de texto
const btnAgregar = document.getElementById("btnAgregar"); // Botón para añadir tarea
const lista = document.getElementById("listaTareas"); // Lista <ul> donde se mostrarán las tareas
const mensajes = document.getElementById("mensajes"); // Área de mensajes informativos

// Eventos Principales
btnAgregar.addEventListener("click", () => {
  
  // 1. Obtener valor del input
  let tarea = input.value.trim();

  // 2. Validar que no esté vacío
  if (tarea === "") {
    mensajes.textContent = "La tarea no puede estar vacía.";
    return;
  }

  // 3. Verificar que la tarea no esté repetida
  const repetido = lista.getElementsByTagName("li");
  for (let i = 0; i < repetido.length; i++) {
    if (repetido[i].textContent.toLowerCase() === tarea.toLowerCase()) {
      mensajes.textContent = "La tarea ya existe.";
      return;
    }
  }

  // 4. Normalizar texto (a minúsculas)
  tarea = tarea.toLowerCase();

  // 5. Crear elemento <li> para la nueva tarea
  const li = document.createElement("li");
  li.textContent = tarea;
  

  // ---- Funcionalidad “Eliminar” (doble clic → eliminar tarea) ----
  li.addEventListener("dblclick", () => {
    li.remove();
    mensajes.textContent = "Tarea eliminada.";
  });

  // Añadir el <li> a la lista
  lista.appendChild(li);

  // 6. Mostrar mensaje y limpiar campo
  mensajes.textContent = "Tarea agregada correctamente.";
  input.value = "";

  // 7. Mostrar todas las tareas en consola (bucle for)
  const tareas = lista.getElementsByTagName("li");
  for (let i = 0; i < tareas.length; i++) {
    console.log(`Tarea ${i + 1}: ${tareas[i].textContent}`);
  }
});
