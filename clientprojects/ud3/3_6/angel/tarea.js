"use strict";

/**
 * Representa una tarea.
 * @class
 */
export class Tarea {

    /**
     * Crea una nueva tarea.
     * @constructor
     * @property {number} id - Identificador único de la tarea.
     * @property {string} texto - Texto descriptivo de la tarea.
     * @property {boolean} completada - Estado de la tarea.
     * @property {Date} fechaCreacion - Fecha de creación de la tarea.
     * @param {string} texto - Descripción de la tarea.
     */
    constructor(texto) {
        this.id = Date.now();
        this.texto = texto;
        this.completada = false;
        this.fechaCreacion = new Date();
    }

    /**
     * Marca la tarea como completada.
     */
    completar() {
        this.completada = true;
    }

    /**
     * Devuelve la representación en texto de la tarea.
     * @returns {string} Representación de la tarea.
     */
    toString() {
        return (this.completada ? "[X] " : "[ ] ") + this.texto;
    }
}
