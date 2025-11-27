// @ts-check
/**
 * Representa una tarea dentro de la aplicación
 * @class
 * @classdesc
 */
export class Tarea {
  /**
   * Crea una nueva instancia de Tarea.
   * @constructor
   * @param {string} texto - El texto descriptivo de la tarea
   * @property {number} id - Identificador de la tarea
   * @property {string} texto - Texto descriptivo de la tarea
   * @property {boolean} completada - Indica si la tarea está completada
   * @property {Date} fechaCreacion - Fecha de creación de la tarea
   */
  constructor(texto) {
    this.id = Date.now();
    this.texto = texto;
    this.completada = false;
    this.fechaCreacion = new Date();
  }

  /**
   * Marca la tarea como completada
   * @method
   */
  completar() {
    this.completada = true;
  }

  /**
   * Devuelve el texto en String
   * @method
   * @returns {string} Cadena de texto
   */
  toString() {
    return `[${this.completada ? "x" : " "}] ${this.texto}`;
  }
}