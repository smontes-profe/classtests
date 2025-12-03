"use strict";

import { TaskManager } from "./taskManager.js";
import { ElementoUIFactory } from "./elementoUIFactory.js";

/**
 * Instancia del gestor de tareas.
 * @type {TaskManager}
 */
const taskManager = new TaskManager();

/**
 * Instancia de la fábrica de elementos DOM.
 * @type {ElementoUIFactory}
 */
const factory = new ElementoUIFactory();

/**
 * Elementos contenedores en el DOM.
 * @type {HTMLElement}
 */
const listaSimple = document.getElementById("listaSimple");
const listaDetallada = document.getElementById("listaDetallada");

/**
 * Observador para actualizar la UI cuando cambien las tareas.
 */
function actualizarUI() {
    listaSimple.innerHTML = "";
    listaDetallada.innerHTML = "";

    taskManager.obtenerTareas().forEach(tarea => {
        const li = factory.crearElementoTarea(tarea, 'simple');
        listaSimple.appendChild(li);

        const div = factory.crearElementoTarea(tarea, 'detallado');
        listaDetallada.appendChild(div);
    });
}

// Suscribimos la función observadora
taskManager.suscribir(actualizarUI);

// Agregamos tareas de ejemplo
taskManager.agregarTarea("Estudiar patrones de diseño");
taskManager.agregarTarea("Hacer ejercicio físico");

// Marcamos la primera tarea como completada
const primeraTarea = taskManager.obtenerTareas()[0];
taskManager.marcarTareaCompletada(primeraTarea.id);
