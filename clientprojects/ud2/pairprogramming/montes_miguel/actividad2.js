/* 
  Actividad 2 - Miniproyecto Gestor de Tareas
  Objetivo: añadir comentarios explicativos, documentación,
  y nuevas funcionalidades (completar/eliminar).
  Lenguaje utilizado: JavaScript, adecuado en entorno cliente
  por ser interpretado directamente en el navegador y permitir
  la manipulación del DOM sin necesidad de compilación.
*/
/**
 * DOCUMENTACIÓN DEL GESTOR DE TAREAS
 * 
 * Este script gestiona una lista de tareas con las siguientes funcionalidades:
 * - Agregar nuevas tareas
 * - Marcar tareas como completadas (clic simple)
 * - Eliminar tareas (doble clic)
 * - Validación de entradas vacías
 * 
 * Eventos utilizados:
 * - click: Para agregar tareas y marcar como completadas
 * - dblclick: Para eliminar tareas
 */

// ========================================
// CAPTURA DE ELEMENTOS DEL DOM
// ========================================

// Elemento input donde el usuario escribe la tarea
const input = document.getElementById("tareaInput");

// Botón que activa la función de agregar tarea
const btnAgregar = document.getElementById("btnAgregar");

// Lista <ul> donde se mostrarán todas las tareas
const lista = document.getElementById("listaTareas");

// Div para mostrar mensajes de validación al usuario
const mensajes = document.getElementById("mensajes");

// ========================================
// EVENTO PRINCIPAL: AGREGAR TAREA
// ========================================

/**
 * Función que se ejecuta al hacer clic en el botón "Añadir"
 * Procesa la tarea ingresada y la agrega a la lista si es válida
 */
btnAgregar.addEventListener("click", () => {
  
  // 1. OBTENER VALOR DEL INPUT
  // Capturamos el texto que el usuario ha escrito
  let tarea = input.value;

  // 2. VALIDACIÓN DE ENTRADA
  // Verificamos que la tarea no esté vacía (después de quitar espacios)
  if (tarea.trim() === "") {
    // Si está vacía, mostramos un mensaje de error
    mensajes.textContent = "La tarea no puede estar vacía.";
    mensajes.style.color = "red";
    return; // Detenemos la ejecución de la función
  } else {
    // Si es válida, limpiamos cualquier mensaje previo
    mensajes.textContent = "";
  }

  // 3. CREAR ELEMENTO DE LISTA
  // Creamos un nuevo elemento <li> para la tarea
  const li = document.createElement("li");
  li.textContent = tarea; // Asignamos el texto de la tarea al <li>

  // 4. FUNCIONALIDAD: MARCAR COMO COMPLETADA
  /**
   * Al hacer clic simple sobre la tarea, se alterna la clase "completada"
   * Esta clase aplica estilos CSS (tachado y color gris)
   */
  li.addEventListener("click", () => {
    // toggle() añade la clase si no existe, o la quita si ya existe
    li.classList.toggle("completada");
  });

  // 5. FUNCIONALIDAD: ELIMINAR TAREA
  /**
   * Al hacer doble clic sobre la tarea, se elimina de la lista
   * Esto es útil para mantener la lista limpia de tareas no deseadas
   */
  li.addEventListener("dblclick", () => {
    // removeChild() elimina el elemento <li> del DOM
    lista.removeChild(li);
    
    // Mensaje opcional de confirmación
    mensajes.textContent = "Tarea eliminada correctamente";
    mensajes.style.color = "orange";
    
    // Limpiamos el mensaje después de 2 segundos
    setTimeout(() => {
      mensajes.textContent = "";
    }, 2000);
  });

  // 6. AGREGAR TAREA A LA LISTA
  // Insertamos el nuevo <li> dentro del <ul>
  lista.appendChild(li);
  
  // 7. LIMPIAR INPUT
  // Vaciamos el campo de texto para permitir escribir una nueva tarea
  input.value = "";
  
  // 8. MENSAJE DE ÉXITO
  mensajes.textContent = `Tarea "${tarea}" añadida correctamente`;
  mensajes.style.color = "green";
  
  // 9. ENFOQUE EN EL INPUT
  // Devolvemos el foco al input para mejorar la experiencia de usuario
  input.focus();
  
  // 10. LOG EN CONSOLA (para depuración)
  console.log(`Nueva tarea agregada: ${tarea}`);
});

// ========================================
// MEJORA ADICIONAL: AGREGAR CON ENTER
// ========================================

/**
 * Permite agregar tareas presionando la tecla Enter
 * Esto mejora la usabilidad al no requerir hacer clic en el botón
 */
input.addEventListener("keypress", (evento) => {
  // Verificamos si la tecla presionada es Enter
  if (evento.key === "Enter") {
    // Simulamos un clic en el botón de agregar
    btnAgregar.click();
  }
});

// ========================================
// INICIALIZACIÓN
// ========================================

// Log inicial para verificar que el script se cargó correctamente
console.log("✅ Gestor de Tareas v2.0 iniciado correctamente");

// Ponemos el foco en el input al cargar la página
input.focus();