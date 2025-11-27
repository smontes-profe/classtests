"use strict"
/**
 * Representa una tarea individual dentro de una lista de tareas.
 * @class
 * @classdesc Clase que modela una tarea con identificador, texto, estado y fecha de creación.
 */
export default class Tarea {
    /**
     * Crea una nueva instancia de la clase Tarea.
     * @constructor
     * @param {string} texto - El texto descriptivo de la tarea.
     */
    constructor(texto) {
      /**
       * Identificador único de la tarea.
       * @type {number}
       */
      this.id = Date.now() + Math.floor(Math.random() * 1000);
  
      /**
       * Texto descriptivo de la tarea.
       * @type {string}
       */
      this.texto = texto;
  
      /**
       * Indica si la tarea está completada.
       * @type {boolean}
       * @default false
       */
      this.completada = false;
  
      /**
       * Fecha de creación de la tarea.
       * @type {Date}
       */
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
     * Devuelve una representación en texto de la tarea.
     * Muestra una marca "[x]" si está completada o "[ ]" si no lo está.
     * @returns {string} Representación textual de la tarea.
     */
    toString() {
      const marca = this.completada ? "x" : " ";
      return `[${marca}] ${this.texto}`;
    }
  }
  