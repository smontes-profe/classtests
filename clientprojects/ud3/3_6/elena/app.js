
import { TaskManager } from './taskManager.js';
import { ElementoUIFactory } from './elementoUIFactory.js';

const gestor = taskManager.getInstance();
const lista = document.getElementById('lista-tareas');
const input = document.getElementById('nueva-tarea');
const botonAgregar = document.getElementById('btn-agregar');

/**
 * Renderiza todas las tareas en el DOM
 */
function actualizarLIsta() {
  lista.innerHTML = '';
  gestor.obtenerTareas().forEach(t => {
    const elemento = ElementoUIFactory.crearElementoTarea(t, 'detallado');
    lista.appendChild(elemento);
  });
}

/**
 * Muestra en consola la cantidad total de tareas
 */
function mostrarContador() {
  console.log(`Total de tareas: ${gestor.obtenerTareas().length}`);
}

// Suscribimos los observadores
gestor.suscribir(actualizarLIsta);
gestor.suscribir(mostrarContador);

// Evento
botonAgregar.addEventListener('click', () => {
  const texto = input.value.trim();
  if (texto) {
    gestor.agregarTarea(texto);
    input.value = '';
  }
});


