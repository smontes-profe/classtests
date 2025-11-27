
/**
 * @file
 * @description define la clase Tarea
*/


export class Tarea {
  /**
   * @constructor
   * @param {string} texto
   * @property {number} id 
   * @property {string} texto
   * @property {boolean} completada 
   * @property {Date} fechaCreacion 
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
   * Devuelve representación en texto de la tarea
   * @method
   * @returns {string} Texto formateado de la tarea
   */

  toString() {
    return `[${this.completada ? 'x' : ' '}] ${this.texto}`;
  }

}


