import { TaskManager } from './TaskManager.js';
import { ElementoUIFactory } from './ElementoUIFactory.js';

// --- CONFIGURACIÓN INICIAL ---

// 1. Obtenemos la instancia ÚNICA del gestor de tareas (Singleton)
const gestor = TaskManager.getInstance();

// 2. Creamos una instancia de nuestra fábrica de elementos UI (Factory)
const factory = new ElementoUIFactory();

// --- OBSERVADORES (Observer) ---

/**
 * Observador que renderiza la lista de tareas en el DOM.
 * @param {import('./Tarea.js').Tarea[]} tareas El array actualizado de tareas.
 */
const renderizarTareasEnDOM = (tareas) => {
    const listaUI = document.getElementById('lista-tareas');
    listaUI.innerHTML = ''; // Limpiamos la lista antes de volver a pintarla

    tareas.forEach(tarea => {
        // Usamos la fábrica para crear el elemento HTML
        const elementoTarea = factory.crearElementoTarea(tarea, 'simple');
        listaUI.appendChild(elementoTarea);
    });
};

/**
 * Observador que muestra el número de tareas por consola.
 * @param {import('./Tarea.js').Tarea[]} tareas El array actualizado de tareas.
 */
const mostrarContadorPorConsola = (tareas) => {
    console.log(`LOG: Actualmente hay ${tareas.length} tareas.`);
};


// --- EJECUCIÓN DE LA APLICACIÓN ---

// 3. Suscribimos nuestros observadores al gestor de tareas
gestor.suscribir(renderizarTareasEnDOM);
gestor.suscribir(mostrarContadorPorConsola);

// 4. Añadimos algunas tareas de ejemplo.
// Cada vez que llamamos a 'agregarTarea', los observadores se disparan automáticamente.
console.log("Añadiendo tareas...");
gestor.agregarTarea('Comprar el pan');
gestor.agregarTarea('Estudiar Patrones de Diseño');
gestor.agregarTarea('Documentar el código con JSDoc');

// 5. Simulamos la compleción de una tarea después de 2 segundos
setTimeout(() => {
    console.log("\nCompletando una tarea...");
    const tareasActuales = gestor.tareas;
    if (tareasActuales.length > 0) {
        // Marcamos la primera tarea como completada
        gestor.marcarTareaComoCompletada(tareasActuales[0].id);
    }
}, 2000);