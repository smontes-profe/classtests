import TaskManager from './TaskManagerObserver.js';

// Obtener la instancia única del gestor
const gestor = TaskManager.getInstance();

/**
 * Función observadora 1:
 * Muestra por consola la lista de tareas actualizada.
 */
function actualizarListaConsola() {
  console.log('Lista actual de tareas:');
  gestor.obtenerTareas().forEach(t => console.log(t.toString()));
}

/**
 * Función observadora 2:
 * Muestra el número total de tareas.
 */
function mostrarContador() {
  console.log(`Total de tareas: ${gestor.obtenerTareas().length}`);
}

// Suscribir observadores al TaskManager
gestor.suscribir(actualizarListaConsola);
gestor.suscribir(mostrarContador);

// === DEMOSTRACIÓN ===
console.log('DEMO: Observadores en acción ');

// Agregar tareas (los observadores se activan automáticamente)
gestor.agregarTarea('Aprender JavaScript');
gestor.agregarTarea('Estudiar patrones de diseño');

// Completar una tarea
const idCompletar = gestor.obtenerTareas()[0].id;
gestor.marcarTareaComoCompletada(idCompletar);

// Eliminar una tarea
const idEliminar = gestor.obtenerTareas()[1].id;
gestor.eliminarTarea(idEliminar);
