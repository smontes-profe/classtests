// @ts-check
import { Tarea } from "./Tarea.js";

/**
 * Clase que gestiona las tareas segun el patrón Singleton y Observer
 * @class
 * @classdesc TaskManager implementa el patrón Singleton para asegurar una única instancia y el patrón Observer para notificar cambios en las tareas
 */
export class TaskManager {
  /**
   * @type {TaskManager}
   */
  static instancia;

  /**
   * Constructor privado
   * @private
   */
  constructor() {
    /** @type {Tarea[]} */
    this.tareas = [];
    /** @type {Function[]} */
    this.observadores = [];
  }

  /**
   * Devuelve la instancia única de TaskManager (patrón Singleton)
   * @returns {TaskManager} La única instancia del gestor
   */
  static getInstance() {
    if (!TaskManager.instancia) {
      TaskManager.instancia = new TaskManager();
    }
    return TaskManager.instancia;
  }

  /**
   * Agrega una nueva tarea al gestor
   * @param {string} texto - Texto de la nueva tarea
   */
  agregarTarea(texto) {
    const tarea = new Tarea(texto);
    this.tareas.push(tarea);
    this.notificar();
  }

  /**
   * Elimina una tarea por ID
   * @param {number} id 
   */
  eliminarTarea(id) {
    this.tareas = this.tareas.filter(t => t.id !== id);
    this.notificar();
  }

  /**
   * Devuelve todas las tareas registradas
   * @returns {Tarea[]} Array con todas las tareas actuales
   */
  obtenerTareas() {
    return this.tareas;
  }

  /**
   * Marca una tarea como completada
   * @param {number} id - ID de la tarea
   */
  marcarTareaComoCompletada(id) {
    const tarea = this.tareas.find(t => t.id === id);
    if (tarea) {
      tarea.completar();
      this.notificar();
    }
  }

  // ------------------ PATRÓN OBSERVER ------------------

  /**
   * Suscribe una nueva función observadora
   * @param {Function} observador - Función que será llamada cuando cambie el estado
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
}
