"use strict";

import { Tarea } from "../Ejercicio001/tarea.js";

export class TaskManager {
  /** Patrón Singleton
   * @static {TaskManager} instance - Instancia única de la clase TaskManager
   */
  static #instance;
  #arrayTask;

  /**
   * Constructor de la clase TaskManager
   * @constructor
   * @returns {TaskManager} Instancia única de la clase TaskManager
   */
  constructor() {
    if (TaskManager.#instance) {
      return TaskManager.#instance;
    }

    this.#arrayTask = [];
    TaskManager.#instance = this;
  }

  /**
   * Método estático para obtener la instancia única de TaskManager
   * @static
   * @returns {TaskManager} Instancia única de la clase TaskManager
   */
  static getInstance() {
    if (!TaskManager.#instance) {
      TaskManager.#instance = new TaskManager();
    }

    return TaskManager.#instance;
  }

  /**
   * Método para agregar una tarea
   * @param {string} texto - El texto de la tarea a agregar
   */
  agregarTarea(texto) {
    const tareaCreate = new Tarea(texto);
    this.#arrayTask.push(tareaCreate);
  }

  /**
   * Método para eliminar una tarea
   * @param {string} id - El ID de la tarea a eliminar
   */
  eliminarTarea(id) {
    if (!id) {
      throw new Error(
        "No ha recibido argumentos en la función, debes de introducir el id de la tarea a eliminar."
      );
    }

    let exist = this.#arrayTask.some((tarea) => tarea.id === id);

    if (exist) {
      this.#arrayTask = this.#arrayTask.filter((tarea) => tarea.id !== id);
      console.log(`La tarea con ID: ${id} se ha eliminado correctamente.`);
    } else {
      console.log(`La tarea con ID: ${id} no se ha encontrado.`);
    }
  }

  /**
   * Método para obtener todas las tareas
   * @returns {Tarea[]} Array de tareas
   */
  obtenerTareas() {
    return this.#arrayTask;
  }

  /**
   * Método para marcar una tarea como completada
   * @param {string} id - El ID de la tarea a marcar como completada
   */
  marcarTareaComoCompletada(id) {
    if (!id) {
      throw new Error(
        "No ha recibido argumentos en la función, debes de introducir el id de la tarea a eliminar."
      );
    }

    const tarea = this.#arrayTask.find((tarea) => tarea.id === id);

    if (tarea) {
      tarea.completada();
      console.log(`Tarea completada: "${tarea.descripcion}"`);
    } else {
      console.log(`Tarea no encontrada con id: "${tarea.id}"`);
    }
  }
}
