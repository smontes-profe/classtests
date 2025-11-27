import { TaskManager } from "./TaskManager.js";

const gestor = TaskManager.getInstance();

// functions observadores



/**
 * lista actual
 */
function actualizarListaConsola() {
  console.clear();
  console.log("lista de tareas:     ");
  gestor.obtenerTareas().forEach((t) => console.log(t.toString()));
}

/**
 * num total
 */
function mostrarContador() {
  console.log(`total de tareas:        ${gestor.obtenerTareas().length}`);
}


gestor.suscribir(actualizarListaConsola);
gestor.suscribir(mostrarContador);

// prueba
gestor.agregarTarea("preparar presentacion");
gestor.agregarTarea("subir a git el proyecto");


gestor.marcarTareaComoCompletada(gestor.obtenerTareas()[0].id);
gestor.eliminarTarea(gestor.obtenerTareas()[0].id);
