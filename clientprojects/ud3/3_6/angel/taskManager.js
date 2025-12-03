"use strict";

import { Tarea } from "./tarea.js";

/**
 * Representa un gestor de tareas.
 * @class
 */
export class TaskManager {

    /**
     * Crea un nuevo gestor de tareas.
     * @constructor
     * @property {Tarea[]} tasks - Lista de tareas gestionadas.
     * @property {Function[]} observadores - Funciones suscritas a cambios en las tareas.
     */
    constructor() {
        this.tasks = [];
        this.observadores = [];
    }

    /**
     * Creo una instancia única del TaskManager.
     * @returns {TaskManager} Instancia única del gestor de tareas.
     */
    static geetInstance() {
        return TaskManager.instance || new TaskManager();
    }

    /**
     * Agrega una nueva tarea al gestor.
     * @param {string} texto - Texto de la tarea.
     */
    agregarTarea(texto) {
        const nuevaTarea = new Tarea(texto);
        this.tasks.push(nuevaTarea);
        this.notificar();
    }

    /**
     * Elimina una tarea del gestor por su id.
     * @param {number} id - Identificador de la tarea a eliminar.
     */
    eliminarTarea(id) {
        this.tasks = this.tasks.filter(tarea => tarea.id !== id);
        this.notificar();
    }

    /**
     * Lista todas las tareas gestionadas.
     * @returns {Tarea[]} Lista de tareas.
     */
    obtenerTareas() {
        return this.tasks;
    }

    /**
     * Marca una tarea como completada por su id.
     * @param {number} id - Identificador de la tarea a marcar.
     */
    marcarTareaCompletada(id) {
        for (const tarea of this.tasks) {
            if (tarea.id === id) {
                tarea.completar();
                break;
            }        
        }
        this.notificar();
    }

    /**
     * Suscribe una función observadora para que se ejecute cuando cambien las tareas.
     * @param {Function} observador - Función a ejecutar al notificar cambios.
     */
    suscribir(observador) {
        this.observadores.push(observador);
    }

    /**
     * Notifica a todos los observadores suscritos.
     */
    notificar() {
        this.observadores.forEach(fn => fn());
    }
}
