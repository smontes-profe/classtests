import { TaskManager } from './TaskManager.js';
import { ElementoUIFactory } from './ElementoUIFactory.js';

// Obtener la instancia única de TaskManager
const gestor = TaskManager.getInstancia();

// Creo la fabrica
const fabricaUI = new ElementoUIFactory();

// Crear las funciones observadoras
/**
 * Observador 1 --> Muestra la lista de tareas en la consola
 */
function actualizarListaConsola(tareas) {
    console.clear();
    console.log("[Observador Consola] Lista de tareas:");
    gestor.obtenerTareas().forEach(tarea => {
        console.log(tarea.toString());
    });
}

/**
 * Observador 2 --> Muestra el contador total de tareas
 */
function mostrarContador() {
    console.log(`[Observador Contador] Total de tareas: ${gestor.obtenerTareas().length}`);
}

/**
 * Observador 3 --> Actualiza la lista de tareas en el DOM
 */
function actualizarListaHTML(tareas) {
    const listaUI = document.getElementById('listaTareas');

    // Limpiar la lista actual
    listaUI.innerHTML = '';

    gestor.obtenerTareas().forEach(tarea => {
        const elementoLI = fabricaUI.crearElementoTarea(tarea, 'detallada');

        const btnCompletar = document.createElement('button');
        btnCompletar.textContent = tarea.completada ? 'Hecha' : 'Completar';
        btnCompletar.style.marginLeft = '12px';
        btnCompletar.onclick = () => {
            gestor.marcarTareaComoCompletada(tarea.id);
        };

        // Botones
        const botonEliminar = document.createElement('button');
        botonEliminar.textContent = 'Eliminar';
        botonEliminar.style.marginLeft = '6px';
        botonEliminar.onclick = () => {
            gestor.eliminarTarea(tarea.id);
        };

        elementoLI.appendChild(botonEliminar);
        elementoLI.appendChild(btnCompletar);
        listaUI.appendChild(elementoLI);
    });
}

function añadirTarea() {
    const textoTarea = prompt("Ingrese la nueva tarea:");
    if (textoTarea) {
        gestor.agregarTarea(textoTarea);
    }  
}

document.addEventListener('DOMContentLoaded', () => {
    const list = document.getElementById('listaTareas');

    const contentBtn = document.createElement('div');
    contentBtn.style.marginBottom = '12px';

    const btnAñadir = document.createElement('button');
    btnAñadir.textContent = 'Añadir Tarea';
    btnAñadir.onclick = añadirTarea;   
    
    contentBtn.appendChild(btnAñadir);

    list.parentNode.insertBefore(contentBtn, list);

    gestor.suscribir(actualizarListaHTML);

    actualizarListaHTML();
});

gestor.suscribir(actualizarListaConsola);
gestor.suscribir(mostrarContador);

setTimeout(() => {
    const fisrtTaskId = gestor.obtenerTareas()[0]?.id;
    if (fisrtTaskId) {
        gestor.marcarTareaComoCompletada(fisrtTaskId);
    }
}, 3000);

setTimeout(() => {
    const secondTaskId = gestor.obtenerTareas()[1]?.id;
    if (secondTaskId) {
        gestor.eliminarTarea(secondTaskId);
    }
}, 6000);
