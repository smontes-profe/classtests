// @ts-check
import { TaskManager } from "./TaskManager.js";
import { ElementoUIFactory } from "./ElementUIFactory.js";

// Obtengo la instancia única del TaskManager
const gestor = TaskManager.getInstance();

// Funciones observadoras (patrón Observer)
/**
 * Actualiza la lista de tareas en la consola
 */
function actualizarListaConsola() {
  console.clear();
  console.log("📋 Lista de tareas:");
  gestor.obtenerTareas().forEach(t => console.log(t.toString()));
}

/**
 * Muestra cuántas tareas existen
 */
function mostrarContador() {
  console.log(`Total de tareas: ${gestor.obtenerTareas().length}`);
}

// Suscribimos las funciones observadoras
gestor.suscribir(actualizarListaConsola);
gestor.suscribir(mostrarContador);

// Probamos funcionalidad básica
gestor.agregarTarea("Comprar pan");
gestor.agregarTarea("Estudiar para el examen");
gestor.marcarTareaComoCompletada(gestor.obtenerTareas()[0].id);
gestor.eliminarTarea(gestor.obtenerTareas()[1].id);

// --- Parte DOM ---
const listaDOM = document.getElementById("lista-tareas");

if (listaDOM) {
  const renderizarDOM = () => {
    listaDOM.innerHTML = "";
    gestor.obtenerTareas().forEach(tarea => {
      const elemento = ElementoUIFactory.crearElementoTarea(tarea, "simple");
      listaDOM.appendChild(elemento);
    });
  };

  gestor.suscribir(renderizarDOM);
  renderizarDOM();
}
