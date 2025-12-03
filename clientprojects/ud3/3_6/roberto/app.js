import Tarea from './Tarea.js';
import TaskManager from './TaskManager.js';
import ElementoUIFactory from './ElementoUIFactory.js';

// --- Ejercicio 1: Prueba de Tarea (comentado para no ensuciar consola) ---

console.log("--- Ejercicio 1: Clase Tarea ---");
const t1 = new Tarea("Comprar el pan");
console.log(t1.toString()); // [ ] Comprar el pan
t1.completar();
console.log(t1.toString()); // [x] Comprar el pan
console.log(t1);


// --- Ejercicio 2: Prueba de Singleton ---
console.log("--- Ejercicio 2: Patrón Singleton ---");
const tm1 = TaskManager.getInstance();
const tm2 = TaskManager.getInstance();
console.log("¿Son la misma instancia?", tm1 === tm2); // true


// --- Inicialización de la App ---
const taskManager = TaskManager.getInstance();
const factory = new ElementoUIFactory();


// --- Ejercicio 3: Observadores de Consola ---
console.log("--- Ejercicio 3: Patrón Observer ---");

/**
 * Observador 1: Muestra la lista de tareas en la consola.
 */
const actualizarListaConsola = () => {
    console.log("--- (Observer Consola) Tareas Actualizadas ---");
    const tareas = taskManager.obtenerTareas();
    if (tareas.length === 0) {
        console.log("No hay tareas.");
        return;
    }
    tareas.forEach(t => console.log(t.toString()));
};

/**
 * Observador 2: Muestra el contador de tareas en la consola.
 */
const mostrarContador = () => {
    console.log(`--- (Observer Consola) Total Tareas: ${taskManager.obtenerTareas().length} ---`);
};

// Suscribimos los observadores de consola
taskManager.suscribir(actualizarListaConsola);
taskManager.suscribir(mostrarContador);


// --- Ejercicio 3 (Ampliación) y 4 (Factory): Observador del DOM ---

// Referencias a los contenedores del DOM
const listaSimpleDOM = document.getElementById('lista-simple-dom');
const listaDetalladaDOM = document.getElementById('lista-detallada-dom');

/**
 * Observador 3: Actualiza el DOM usando el Factory (Ej. 3 Ampliación + Ej. 4)
 */
const actualizarDOM = () => {
    console.log("--- (Observer DOM) Actualizando UI ---");
    
    // Limpiamos los contenedores
    listaSimpleDOM.innerHTML = '';
    listaDetalladaDOM.innerHTML = '';

    const tareas = taskManager.obtenerTareas();

    tareas.forEach(tarea => {
        // Usamos la fábrica para crear los elementos
        const elSimple = factory.crearElementoTarea(tarea, 'simple');
        const elDetallado = factory.crearElementoTarea(tarea, 'detallado');
        
        // Los añadimos al DOM
        listaSimpleDOM.appendChild(elSimple);
        listaDetalladaDOM.appendChild(elDetallado);
    });
};

// Suscribimos el observador del DOM
taskManager.suscribir(actualizarDOM);


// --- Interacción del Usuario (Conectando el HTML) ---
document.getElementById('btn-agregar').addEventListener('click', () => {
    const input = document.getElementById('nueva-tarea-texto');
    const texto = input.value;
    
    if (texto) {
        console.log(`\n>>> ACCIÓN: Añadiendo tarea: "${texto}"`);
        taskManager.agregarTarea(texto);
        input.value = ''; // Limpiar input
    }
});


// --- DEMO: Acciones iniciales para ver cómo reaccionan los observers ---
console.log("\n>>> ACCIÓN: Añadiendo tareas iniciales...");
taskManager.agregarTarea("Estudiar Patrones de Diseño");
taskManager.agregarTarea("Entregar Actividad JS");

// Simulamos completar una tarea
setTimeout(() => {
    const tareas = taskManager.obtenerTareas();
    if (tareas.length > 0) {
        console.log(`\n>>> ACCIÓN: Completando tarea: "${tareas[0].texto}"`);
        taskManager.marcarTareaComoCompletada(tareas[0].id);
    }
}, 2000);