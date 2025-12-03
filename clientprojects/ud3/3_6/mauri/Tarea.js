/** 
 *  Esta clase almacena la información de una tarea.
 *  @class Tarea
*/
export class Tarea {
    /**
     * Identificador único de la tarea
     *  @type {number}
     */
    id;
    /**
     * El texto descriptivo de la tarea.
     * @type {string}
     */
    texto;
    /**
     * Estado de la tarea. `true` si está completada, `false` si está pendiente.
     * @type {boolean}
     */
    completada;
    /**
     * La fecha y hora en que la instancia de la tarea fue creada.
     * @type {Date}
     */
    fechaCreacion;

    /**
     * Crea una instancia de Tarea.
     * @constructor
     * @param {string} texto - El texto descriptivo de la tarea.
     */ 
    constructor(texto) {

        this.id = Date.now() + Math.random(); // Asegura un ID más único
        this.texto = texto;
        this.completada = false;
        this.fechaCreacion = new Date();
    }

    /**
     * Marca la tarea como completada 
     * @method completar
     * @returns {void}  No devuelve valor.
     */
    completar() {
        this.completada = true;
    }

    /**
     *  @method toString
     * Devuelve una representación en cadena de la tarea
     * @returns {string} Una cadena con el estado y el texto de la tarea.
     */
    toString() {
        const estado = this.completada ? '[x]' : '[ ]';
        return `${estado} ${this.texto}`;
    }
}