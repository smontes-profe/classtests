"use strict";

import { TaskManager } from "./taskManager.js";

const managerTask1 = new TaskManager();


/**
 * Funciones observadoras
 */
const actualizarListaConsola = () => {
    const tareas = managerTask1.obtenerTareas();

    if (tareas.length === 0) {
        console.log("Actualmente no existen taeras.")
    
    } else {
        tareas.forEach(tarea => console.log(tarea.toString()));
    }
}

const mostrarContador = () => {
    const numeroTareas = managerTask1.obtenerTareas()?.length;
    console.log(`El número total de tareas es de: ${numeroTareas}`);
}


// Suscribir las funciones observadoras al TaskManager
managerTask1.suscribir(actualizarListaConsola);
managerTask1.suscribir(mostrarContador);

// Añadir tareas
managerTask1.agregarTarea("Sacar al perro a las 17:00h");
managerTask1.agregarTarea("Comprar el regalo a Manu");
managerTask1.agregarTarea("Hacer la tarea de Cliente para el miércoles.");

// Obtener los IDs de las tareas para poder eliminarlas o modificarlas
const tareaID1 = managerTask1.obtenerTareas().find(tarea => tarea.descripcion === "Hacer la tarea de Cliente para el miércoles.")?.id;
const tareaID2 = managerTask1.obtenerTareas().find(tarea => tarea.descripcion === "Comprar el regalo a Manu")?.id;

// Eliminar y modificar tareas
managerTask1.eliminarTarea(tareaID1);
managerTask1.marcarTareaComoCompletada(tareaID2);