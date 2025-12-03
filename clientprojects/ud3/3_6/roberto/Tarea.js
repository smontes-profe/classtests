/**
 * Representa una tarea individual en la lista de quehaceres.
 * @class
 */
export default class Tarea {
    /**
     * Crea una instancia de Tarea.
     * @param {string} texto El contenido de la tarea.
     */
    constructor(texto) {
        /**
         * Identificador único de la tarea.
         * @property {number}
         */
        this.id = Date.now(); // Suficiente para este ejemplo

        /**
         * Descripción textual de la tarea.
         * @property {string}
         */
        this.texto = texto;

        /**
         * Estado de la tarea (completada o no).
         * @property {boolean}
         */
        this.completada = false;

        /**
         * Fecha de creación de la tarea.
         * @property {Date}
         */
        this.fechaCreacion = new Date();
    }

    /**
     * Marca la tarea como completada.
     */
    completar() {
        this.completada = true;
    }

    /**
     * Devuelve una representación en string de la tarea.
     * @returns {string} La tarea formateada.
     */
    toString() {
        const estado = this.completada ? '[x]' : '[ ]';
        return `${estado} ${this.texto}`;
    }
}