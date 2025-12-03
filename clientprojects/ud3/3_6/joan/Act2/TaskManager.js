/**
 * @file 
 * @description 
 */

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
   * @constructor
   */

  constructor() {
    if (TaskManager.#instancia) {
      throw new Error("No se puede crear otra instancia.");
    }

    /**
     * @property {Tarea[]} tareas - Array
     */
    this.tareas = [];

    TaskManager.#instancia = this;
  }


  /**
*devuelve la instancia o si no hay la crea
   * @static
   * @returns {TaskManager} la instancia 
   */
  static getInstance() {
    if (!TaskManager.#instancia) {
      TaskManager.#instancia = new TaskManager();
    }
    return TaskManager.#instancia;
  }


  /**
   * crea una nueva y añade al array
   * @param {string} texto - descripcion
   * @returns {Tarea} 
   */

  agregarTarea(texto) {
    const nuevaTarea = new Tarea(texto);
    this.tareas.push(nuevaTarea);
    return nuevaTarea;
  }

  /**
   * la elimina con su id
   * @param {number} id 
   * @returns {boolean} 
   */

  eliminarTarea(id) {
    const indice = this.tareas.findIndex((t) => t.id === id);
    if (indice !== -1) {
      this.tareas.splice(indice, 1);
      return true;
    }
    return false;
  }



  /**
   * 
   
   * @returns {Tarea[]} vemos todas las tareas
   */
  obtenerTareas() {
    return this.tareas;
  }

  /**
 
   * @param {number} id -cojemos el id y marcamos como completa
   * @returns {boolean} 
   */
  marcarTareaComoCompletada(id) {
    const tarea = this.tareas.find((t) => t.id === id);
    if (tarea) {
      tarea.completar();
      return true;
    }
    return false;
  }
}
