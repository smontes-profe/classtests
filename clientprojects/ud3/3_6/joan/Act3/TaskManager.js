/**
 * @file 
 * @description 
 * */

import { Tarea } from "./Tarea.js";

/**
 * @class
 * @singleton
 */



export class TaskManager {
  /**
   * @private
   * @type {TaskManager | null}
   * @description 
   */
  static #instancia = null;

  /**
   * nueva instancia
   * @constructor
   * @throws {Error}
   */

  constructor() {
    if (TaskManager.#instancia) {
      throw new Error("no se puede crear");
    }




    /**
     * @property {Tarea[]} tareas - lista de tareas 
     */
    this.tareas = [];

    /**
     * @property {Function[]} observadores - lista de funciones 
     */
    this.observadores = [];

    TaskManager.#instancia = this;
  }

  /**
   *devuelve o crea la instancia
   * @static
   * @returns {TaskManager} 
   */

  static getInstance() {
    if (!TaskManager.#instancia) {
      TaskManager.#instancia = new TaskManager();
    }
    return TaskManager.#instancia;
  }



  /**
   
   * @param {Function} observador 
   */
  suscribir(observador) {
    this.observadores.push(observador);
  }

  /**
   * @private
   */
  notificar() {
    this.observadores.forEach((fn) => fn());
  }



  /**
   * nueva tarea y añade + notifica
   * @param {string} texto 
   * @returns {Tarea} 
   */
  agregarTarea(texto) {
    const nuevaTarea = new Tarea(texto);
    this.tareas.push(nuevaTarea);
    this.notificar();
    return nuevaTarea;
  }

  /**
   * elimina por id + notifica
   * @param {number} id 
   * @returns {boolean} 
   */

  eliminarTarea(id) {
    const indice = this.tareas.findIndex((t) => t.id === id);
    if (indice !== -1) {
      this.tareas.splice(indice, 1);
      this.notificar();
      return true;
    }
    return false;
  }




  /**

   * @returns {Tarea[]} 
   */
  obtenerTareas() {
    return this.tareas;
  }

  /**

   * @param {number} id 
   * @returns {boolean} 
   */
  marcarTareaComoCompletada(id) {
    const tarea = this.tareas.find((t) => t.id === id);
    if (tarea) {
      tarea.completar();
      this.notificar();
      return true;
    }
    return false;
  }
}
