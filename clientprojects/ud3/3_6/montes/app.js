// app.js - Script principal de la aplicación

// Importamos los módulos (Sujeto y Fábrica)
import { TaskManager } from "./TaskManager.js";
import { ElementoUIFactory } from "./ElementoUIFactory.js";
// Nota: Tarea.js es importado por TaskManager, no es necesario aquí.

console.log("---- Inicio de la Aplicación ----");

// --- 1. Referencias al DOM ---
// (Elementos definidos en index.html)
const listaSimpleContenedor = document.getElementById("lista-simple");
const listaDetalladaContenedor = document.getElementById("lista-detallada");
const inputNuevaTarea = document.getElementById("nueva-tarea-input");
const btnAnadir = document.getElementById("anadir-tarea-btn");

// --- 2. Ejercicio 2: Singleton ---
// Obtenemos la única instancia del gestor de tareas.
console.log("--- Ejercicio 2: Singleton ---");
const taskMgr = TaskManager.getInstance();
const taskMgr2 = TaskManager.getInstance();
console.log(`¿Instancias son iguales?: ${taskMgr === taskMgr2}`);
console.log("---------------------------------");

// --- 3. Ejercicio 3: Observer ---
console.log("--- Ejercicio 3: Observer ---");

/**
 * Observador 1: Actualiza el DOM usando la Fábrica.
 * @param {Tarea[]} tareas - El estado actual de las tareas (enviado por notificar).
 */
const actualizarUI = (tareas) => {
  console.log("[OBSERVADOR UI] Actualizando DOM...");

  // Vaciamos los contenedores
  listaSimpleContenedor.innerHTML = "";
  listaDetalladaContenedor.innerHTML = "";

  if (tareas.length === 0) {
    listaSimpleContenedor.innerHTML = "<li>No hay tareas.</li>";
    listaDetalladaContenedor.innerHTML = "<div>No hay tareas.</div>";
    return;
  }

  // --- 4. Ejercicio 4: Factory ---
  // Usamos la Fábrica para crear los elementos, sin saber cómo se construyen.
  tareas.forEach((tarea) => {
    // Pedimos un elemento 'simple'
    const elSimple = ElementoUIFactory.crearElementoTarea(tarea, "simple");
    listaSimpleContenedor.appendChild(elSimple);

    // Pedimos un elemento 'detallado'
    const elDetallado = ElementoUIFactory.crearElementoTarea(
      tarea,
      "detallado"
    );
    listaDetalladaContenedor.appendChild(elDetallado);
  });
};

/**
 * Observador 2: Muestra el contador por consola.
 * @param {Tarea[]} tareas - El estado actual de las tareas.
 */
const actualizarContadorConsola = (tareas) => {
  console.log(`[OBSERVADOR CONSOLA] Total de tareas: ${tareas.length}`);
};

// --- 5. Lógica del "Controlador" (Manejadores de Eventos) ---

/**
 * Maneja la adición de nuevas tareas.
 */
const handleAgregarTarea = () => {
  const texto = inputNuevaTarea.value.trim();
  if (texto) {
    console.log("\n### Acción: Agregar Tarea ###");
    // Al llamar a agregarTarea, el TaskManager (Sujeto)
    // notificará automáticamente a los observadores (actualizarUI).
    taskMgr.agregarTarea(texto);
    inputNuevaTarea.value = "";
    inputNuevaTarea.focus();
  }
};

/**
 * Maneja los clics en la lista detallada (para 'completar' y 'eliminar')
 * usando Delegación de Eventos.
 * @param {Event} e El objeto de evento.
 */
const handleEventosLista = (e) => {
  // Buscamos el elemento padre que tiene el ID de la tarea
  const elTarea = e.target.closest("[data-tarea-id]");
  if (!elTarea) return; // Clic fuera de un elemento de tarea

  const id = Number(elTarea.dataset.tareaId); // Convertir a número para comparación correcta

  // Evento para el Checkbox (completar/descompletar)
  if (e.target.type === "checkbox") {
    console.log("\n### Acción: Toggle Tarea ###");
    // Usamos el método 'toggle' que añadimos en el Ejercicio 4
    taskMgr.toggleEstadoTarea(id); // Esto dispara la notificación
  }

  // Evento para el botón de eliminar
  // (Asumimos que la Factory añade la clase 'eliminar-btn' al botón)
  if (e.target.classList.contains("eliminar-btn")) {
    console.log("\n### Acción: Eliminar Tarea ###");
    taskMgr.eliminarTarea(id); // Esto dispara la notificación
  }
};

// --- 6. Inicialización ---
console.log("--- Inicializando Aplicación ---");

// Suscribimos nuestros observadores al Sujeto (TaskManager)
taskMgr.suscribir(actualizarUI);
taskMgr.suscribir(actualizarContadorConsola);

// Asignamos los manejadores de eventos a los elementos del DOM
btnAnadir.addEventListener("click", handleAgregarTarea);
inputNuevaTarea.addEventListener("keyup", (e) => {
  if (e.key === "Enter") handleAgregarTarea();
});

// Usamos delegación de eventos en el contenedor
listaDetalladaContenedor.addEventListener("change", handleEventosLista);
listaDetalladaContenedor.addEventListener("click", handleEventosLista);

// Renderizado inicial (carga las tareas que puedan existir)
// En este punto, 'tareas' estará vacío.
actualizarUI(taskMgr.obtenerTareas());

// --- 7. Simulación de Carga (Datos de Prueba) ---
console.log("\n--- Cargando datos de prueba ---");
taskMgr.agregarTarea("Estudiar patrón Singleton (Ejercicio 2)");
taskMgr.agregarTarea("Implementar patrón Observer (Ejercicio 3)");
taskMgr.agregarTarea("Crear Factory de UI (Ejercicio 4)");
