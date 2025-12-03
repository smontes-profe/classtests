/**
 * @file Tarea.js
 * @description 
 */

/**
 * @class
 */


export class Tarea {
  /**
   * 
   * @constructor
   * @param {string} texto - texto descriptivo
   * @property {number} id - el id
   * @property {string} texto - la descripcion
   * @property {boolean} completada - indica si la tarea ya esta o no
   * @property {Date} fechaCreacion - Fecha 
   */


  constructor(texto) {
    this.id = Date.now();
    this.texto = texto;
    this.completada = false;
    this.fechaCreacion = new Date();
  }

  /**
   * @method
   */

  completar() {
    this.completada = true; // para decir que ya esta completada
  }

  /**
   * @method
   * @returns {string} devolvemos la cadena
   */

  
  toString() {
    const estado = this.completada ? "[x]" : "[ ]";
    return `${estado} ${this.texto}`;
  }
}
