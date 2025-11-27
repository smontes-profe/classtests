import TaskManager from './TaskManager.js';
import ElementoUIFactory from './ElementoUIFactory.js';
import Tarea from './Tarea.js'; // Importado solo para la demo del Ejercicio 1

/**
 * Función principal de la aplicación.
 * Se ejecuta cuando el DOM está completamente cargado.
 */
function main() {
  console.log("--- Ejercicio 1: Clase Tarea (Demo) ---");
  const tareaDemo = new Tarea("Tarea de demostración (Ejercicio 1)");
  tareaDemo.completar();
  console.log(tareaDemo.toString()); // [x] Tarea de demostración (Ejercicio 1)

  console.log("\n--- Ejercicio 2: Patrón Singleton ---");
  const tm1 = TaskManager.getInstance();
  const tm2 = TaskManager.getInstance();
  console.log("¿Son la misma instancia (Singleton)?", tm1 === tm2); // true

  // --- Instancias principales ---
  const taskManager = TaskManager.getInstance();
  const factory = new ElementoUIFactory();

  // --- Obtener elementos del DOM ---
  const inputTarea = document.getElementById('nueva-tarea-input');
  const btnAgregar = document.getElementById('agregar-tarea-btn');
  const listaSimpleCont = document.getElementById('lista-simple');
  const listaDetalladaCont = document.getElementById('lista-detallada');

  // --- Ejercicio 3: Observadores de Consola ---
  
  /**
   * Observador que muestra la lista de tareas en la consola.
   */
  const actualizarListaConsola = () => {
    console.log("--- OBSERVADOR: Lista Consola ---");
    const tareas = taskManager.obtenerTareas();
    if (tareas.length === 0) {
      console.log("No hay tareas.");
      return;
    }
    tareas.forEach(t => console.log(t.toString()));
  };

  /**
   * Observador que muestra el contador de tareas en la consola.
   */
  const mostrarContador = () => {
    console.log("--- OBSERVADOR: Contador ---");
    const total = taskManager.obtenerTareas().length;
    console.log(`Total de tareas: ${total}`);
  };

  // --- Ejercicio 3 (Ampliación) y Ejercicio 4: Observador del DOM ---

  /**
   * Observador que actualiza el DOM completo usando la Fábrica.
   * Esta función se encarga de "renderizar" el estado de la app.
   */
  const actualizarDOM = () => {
    console.log("--- OBSERVADOR: Actualizando DOM ---");
    // Limpiar listas anteriores
    listaSimpleCont.innerHTML = '';
    listaDetalladaCont.innerHTML = '';

    const tareas = taskManager.obtenerTareas();

    if (tareas.length === 0) {
        listaSimpleCont.innerHTML = '<li>No hay tareas pendientes.</li>';
        listaDetalladaCont.innerHTML = '<p>No hay tareas pendientes.</p>';
        return;
    }

    tareas.forEach(tarea => {
      // 1. Crear elemento "simple" con la Fábrica
      try {
        const elSimple = factory.crearElementoTarea(tarea, 'simple');
        // Añadir lógica de interacción
        elSimple.addEventListener('click', () => {
          taskManager.marcarTareaComoCompletada(tarea.id);
        });
        listaSimpleCont.appendChild(elSimple);
      } catch (e) {
        console.error(e);
      }
      
      // 2. Crear elemento "detallado" con la Fábrica
      try {
        const elDetallado = factory.crearElementoTarea(tarea, 'detallado');
        
        // Añadir lógica de interacción al checkbox
        const checkbox = elDetallado.querySelector('input[type="checkbox"]');
        if (checkbox) {
          checkbox.addEventListener('change', () => {
            taskManager.marcarTareaComoCompletada(tarea.id);
          });
        }

        // Añadir botón de eliminar (Bonus)
        const btnEliminar = document.createElement('button');
        btnEliminar.textContent = 'Eliminar';
        btnEliminar.className = 'btn-eliminar';
        btnEliminar.addEventListener('click', (e) => {
            e.stopPropagation(); // Evitar que otros listeners se disparen
            if (confirm(`¿Seguro que quieres eliminar "${tarea.texto}"?`)) {
                 taskManager.eliminarTarea(tarea.id);
            }
        });

        elDetallado.appendChild(btnEliminar);
        listaDetalladaCont.appendChild(elDetallado);

      } catch (e) {
        console.error(e);
      }
    });
  };

  // --- Suscripción de todos los Observadores ---
  console.log("\n--- Suscribiendo Observadores ---");
  taskManager.suscribir(actualizarListaConsola);
  taskManager.suscribir(mostrarContador);
  taskManager.suscribir(actualizarDOM); // El DOM reacciona a los cambios

  // --- Lógica de Interacción (Controlador) ---
  
  /**
   * Maneja el evento de clic en el botón de agregar.
   */
  const alAgregarTarea = () => {
    const texto = inputTarea.value;
    taskManager.agregarTarea(texto); // Esto notificará a todos los observadores
    inputTarea.value = ''; // Limpiar input
    inputTarea.focus();
  };
  
  btnAgregar.addEventListener('click', alAgregarTarea);
  inputTarea.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
      alAgregarTarea();
    }
  });


  // --- Estado Inicial de la Aplicación ---
  console.log("\n--- Añadiendo tareas iniciales ---");
  taskManager.agregarTarea("Comprar el pan (clic para completar)");
  taskManager.agregarTarea("Estudiar patrones de diseño");
  taskManager.agregarTarea("Hacer ejercicio");
}

// Asegurarse de que el script se ejecuta solo cuando el DOM esté listo.
document.addEventListener('DOMContentLoaded', main);