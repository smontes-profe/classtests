// Importamos el gestor (Subject)
// (Asegúrate de tener Tarea.js, ya que TaskManager lo importa)
import { TaskManager } from "./TaskManager.js";

// --- Definición de Observadores ---
// Estas funciones aceptan el estado (tareas) que les pasa el método notificar()

/**
 * Observador 1: Muestra la lista de tareas en consola.
 * @param {Tarea[]} tareas - El estado actual de las tareas.
 */
const actualizarListaConsola = (tareas) => {
  console.log("--- [OBSERVADOR: Lista de Tareas] ---");
  if (tareas.length === 0) {
    console.log("(No hay tareas en la lista)");
  } else {
    // Usamos el método toString() de cada Tarea, como pide el ejercicio.
    // (Asegúrate de que tu clase Tarea tenga un método toString())
    tareas.forEach((tarea) => console.log(tarea.toString()));
  }
  console.log("--------------------------------------");
};

/**
 * Observador 2: Muestra el contador total de tareas.
 * @param {Tarea[]} tareas - El estado actual de las tareas.
 */
const mostrarContador = (tareas) => {
  console.log(`--- [OBSERVADOR: Contador] ---`);
  console.log(`Total de tareas: ${tareas.length}`);
  console.log("------------------------------");
};

// --- Ejecución ---

// 1. Obtenemos la instancia única del Sujeto
const taskMgr = TaskManager.getInstance();

// 2. Suscribimos nuestros observadores
console.log("Suscribiendo observadores...");
taskMgr.suscribir(actualizarListaConsola);
taskMgr.suscribir(mostrarContador);

// 3. Probamos la reactividad
// Fíjate cómo no llamamos a 'actualizarListaConsola' ni a 'mostrarContador'
// directamente. Se ejecutan solos gracias al patrón Observer.

console.log("\n### Añadiendo Tarea 1 ###");
const tarea1 = taskMgr.agregarTarea("Estudiar patrón Observer");

console.log("\n### Añadiendo Tarea 2 ###");
const tarea2 = taskMgr.agregarTarea("Implementar Singleton");

console.log(`\n### Completando Tarea 1 (ID: ${tarea1.id}) ###`);
taskMgr.marcarTareaComoCompletada(tarea1.id);

console.log(`\n### Eliminando Tarea 2 (ID: ${tarea2.id}) ###`);
taskMgr.eliminarTarea(tarea2.id);

console.log(`\n### Eliminando Tarea 1 (ID: ${tarea1.id}) ###`);
taskMgr.eliminarTarea(tarea1.id);
