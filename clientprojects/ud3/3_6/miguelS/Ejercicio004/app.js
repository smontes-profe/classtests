"use strict";

import { TaskManager } from "../Ejercicio003/taskManager.js";
import { ElementoUIFactory } from "./elementoUIFactory.js";

const managerTask1 = new TaskManager();
const fabrica = new ElementoUIFactory();

const listaSimple = document.getElementById('listSimple');
const listaDetallada = document.getElementById('listDetallada');

// Añadir tareas
managerTask1.agregarTarea("Sacar al perro a las 17:00h");
managerTask1.agregarTarea("Comprar el regalo a Manu");
managerTask1.agregarTarea("Hacer la tarea de Cliente para el miércoles.");

const tareas = managerTask1.obtenerTareas();

/**
 * Crear y agregar elementos de tarea a las listas correspondientes.
 * @param {Array} tareas - Lista de tareas a procesar.
 */
for (let tarea of tareas) {
    const elementoSimple = fabrica.crearElementoTarea(tarea, 'simple');
    listaSimple.appendChild(elementoSimple);

    const elementoDetallado = fabrica.crearElementoTarea(tarea, 'detallado');
    listaDetallada.appendChild(elementoDetallado);
}