"use strict";
import Tarea from '../ej1/Tarea.js';

/**
 * @class TaskManager
 * @classdesc
 * Clase que implementa el patrón **Singleton** para gestionar un conjunto único
 * de tareas en toda la aplicación. Garantiza que solo exista una instancia del
 * gestor central.
 *
 * @example
 * const gestor1 = TaskManager.getInstance();
 * const gestor2 = TaskManager.getInstance();
 * console.log(gestor1 === gestor2); // true
 */
export default class TaskManager {
  /**
   * Instancia única de TaskManager.
   * @type {TaskManager | null}
   * @private
   */
  static #instancia = null;

  /**
   * Crea una instancia de TaskManager.
   * @constructor
   * @private
   */
  constructor() {
    if (TaskManager.#instancia) {
      throw new Error('Solo puede existir una instancia de TaskManager. Usa TaskManager.getInstance()');
    }

    /**
     * Array que almacena las tareas creadas.
     * @type {Tarea[]}
     */
    this.tareas = [];

    TaskManager.#instancia = this;
  }

  /**
   * Devuelve la instancia única de TaskManager.
   * Si no existe, la crea automáticamente.
   *
   * @returns {TaskManager} La instancia única del gestor de tareas.
   */
  static getInstance() {
    if (!TaskManager.#instancia) {
      TaskManager.#instancia = new TaskManager();
    }
    return TaskManager.#instancia;
  }

  /**
   * Crea una nueva tarea y la agrega al listado.
   *
   * @param {string} texto - Texto descriptivo de la tarea.
   * @returns {Tarea} La tarea creada.
   */
  agregarTarea(texto) {
    const tarea = new Tarea(texto);
    this.tareas.push(tarea);
    return tarea;
  }

  /**
   * Elimina una tarea por su identificador.
   *
   * @param {number} id - ID de la tarea a eliminar.
   * @returns {boolean} `true` si la tarea fue eliminada, `false` si no se encontró.
   */
  eliminarTarea(id) {
    const longitudInicial = this.tareas.length;
    this.tareas = this.tareas.filter(t => t.id !== id);
    return this.tareas.length < longitudInicial;
  }

  /**
   * Devuelve todas las tareas registradas.
   *
   * @returns {Tarea[]} Array de tareas.
   */
  obtenerTareas() {
    return this.tareas;
  }

  /**
   * Marca como completada una tarea, buscando por su ID.
   *
   * @param {number} id - ID de la tarea a marcar como completada.
   * @returns {boolean} `true` si se encontró y completó la tarea, `false` si no existe.
   */
  marcarTareaComoCompletada(id) {
    const tarea = this.tareas.find(t => t.id === id);
    if (tarea) {
      tarea.completar();
      return true;
    }
    return false;
  }
}
