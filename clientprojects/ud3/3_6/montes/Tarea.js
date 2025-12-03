/**
 * Representa una Tarea
 *
 * @class Tarea
 * @typedef {Tarea}
 */
export class Tarea {
  /**
   * Constructor de una tarea.
   *
   * @constructor
   * @param {string} texto - El contenido textual de la tarea.
   * @property {number} id - El identificador único de la tarea.
   * @property {string} texto - El contenido textual de la tarea.
   * @property {boolean} completada - Indica si la tarea está completada (true) o no (false).
   * @property {Date} fechaCreacion - La fecha y hora en que se creó la tarea.
   */
  constructor(texto) {
    this.id = Date.now();
    this.texto = texto;
    this.completada = false;
    this.fechaCreacion = new Date();
  }

  /**
   * Marca la tarea como completada.
   * No devuelve nada.
   */
  completar() {
    this.completada = true;
  }

  /**
   * Desmarca la tarea como completada.
   * No devuelve nada.
   */
  descompletar() {
    this.completada = false;
  }

  /**
   * Devuelve un String de la tarea indicando si está completada o no.
   *
   * @returns {string}
   */
  toString() {
    let check = this.completada ? "[X]" : "[ ]";
    return `${check} ${this.texto}`;
  }
}
