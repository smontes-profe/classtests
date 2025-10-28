/**
 * Representa una tarea individual en la lista.
 * Contiene información sobre el texto de la tarea, su estado y su identificador.
 */
export class Tarea {
    /**
     * El identificador numérico único de la tarea.
     * @property {number} id
     */
    id;

    /**
     * El contenido de texto de la tarea.
     * @property {string} texto
     */
    texto;

    /**
     * Indica si la tarea ha sido completada o no.
     * @property {boolean} completada
     */
    completada;

    /**
     * La fecha en que la tarea fue creada.
     * @property {Date} fechaCreacion
     */
    fechaCreacion;

    /**
     * Crea una nueva instancia de Tarea.
     * @param {string} texto El texto que describe la tarea.
     */
    constructor(texto) {
        this.id = Date.now(); // Simple ID único basado en el timestamp
        this.texto = texto;
        this.completada = false;
        this.fechaCreacion = new Date();
    }

    /**
     * Marca la tarea como completada.
     * @returns {void}
     */
    completar() {
        this.completada = true;
    }

    /**
     * Devuelve una representación en formato de texto de la tarea.
     * @returns {string} La tarea formateada como string.
     */
    toString() {
        const icono = this.completada ? '[x]' : '[ ]';
        return `${icono} ${this.texto}`;
    }
}