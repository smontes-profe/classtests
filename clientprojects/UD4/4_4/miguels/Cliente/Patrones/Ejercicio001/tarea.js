"use strict";

/**
 * Representa una tarea con descripción, estado y fecha de creación.
 * @class
 * @export
 */
export class Tarea {
  /**
   * Constructor de una nueva tarea.
   * @param {string} descripcion - La descripción de la tarea.
   */
  constructor(descripcion) {
    // El constructor SOLO pone las propiedades
    this.id = crypto.randomUUID();
    this.descripcion = descripcion;
    this.fechaCreacion = new Date();
    this.completada = false;
  }

  
  /**
   * Marca la tarea como completada.
   * @returns {void}
   */
  completar() {
    this.completada = true;
  }

  /**
   * Devuelve una representación en cadena de la tarea.
   * @returns {string} Representación en cadena de la tarea.
   */
  toString() {
    return `${this.completada ? "[X]" : "[]"} ${this.descripcion}`;
  }
}