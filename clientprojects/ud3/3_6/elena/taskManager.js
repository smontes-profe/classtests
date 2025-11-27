
import { Tarea } from './tarea.js';

/**
 * @file 
 * @description Gestiona todas las tareas utilizando los patrones Singleton y Observer
*/


/**
 * Clase que actúa como gestor central de tareas
 * Implementa los patrones
 * @class
*/
export class TaskManager {
  /** @type {TaskManager | null} */
  static instancia = null;

  /**
   * Constructor privado del Singleton
   * @constructor
   */
  constructor() {
    if (TaskManager.instancia) return TaskManager.instancia;

    this.tareas = [];
    this.observadores = [];
    TaskManager.instancia = this;
  }


  /**
   * @static
   * @returns {TaskManager} Instancia única del gestor
   */
  static getInstance() {
    if (!TaskManager.instancia) TaskManager.instancia = new TaskManager();
    return TaskManager.instancia;
  }


  /**
   * Función observadora
   * @param {Function} observador - Cambiar el estado
   */
  suscribir(observador) {
    this.observadores.push(observador);
  }


  /**
   * Notifica a todos los observadores registrados
   */
  notificar() {
    this.observadores.forEach(obs => obs());
  }


  /**
   * Nueva tarea
   * @param {string} texto 
   */
  agregarTarea(texto) {
    const nueva = new Tarea(texto);
    this.tareas.push(nueva);
    this.notificar();
  }


  /**
   * Elimina una tarea por su ID
   * @param {number} id
   */
  eliminarTarea(id) {
    this.tareas = this.tareas.filter(t => t.id !== id);
    this.notificar();
  }


  /**
   * Marca una tarea como completada
   * @param {number} id 
   */
  marcarTareaComoCompletada(id) {
    const tarea = this.tareas.find(t => t.id === id);
    if (tarea) tarea.completar();
    this.notificar();
  }

  /**
   * Tareas actuales
   * @returns {Tarea[]} 
   */
  obtenerTareas() {
    return this.tareas;
  }
  
}


