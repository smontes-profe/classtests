import Tarea from '../ej1/Tarea.js';

/**
 * @class TaskManager
 * @classdesc
 * Clase que implementa los patrones **Singleton** y **Observer**.
 * 
 * - **Singleton:** Garantiza que solo exista una instancia del gestor.
 * - **Observer:** Permite suscribir funciones (observadores) que serán
 *   notificadas automáticamente cuando cambie el estado de las tareas.
 */
export default class TaskManager {
  /**
   * Instancia única del gestor.
   * @type {TaskManager | null}
   * @private
   */
  static #instancia = null;

  /**
   * Crea una instancia del TaskManager (privado para mantener el Singleton).
   * @constructor
   * @private
   */
  constructor() {
    if (TaskManager.#instancia) {
      throw new Error('Usa TaskManager.getInstance() en lugar de new.');
    }

    /**
     * Lista de tareas gestionadas.
     * @type {Tarea[]}
     */
    this.tareas = [];

    /**
     * Lista de funciones observadoras que reaccionan ante los cambios.
     * @type {Function[]}
     */
    this.observadores = [];

    TaskManager.#instancia = this;
  }

  /**
   * Devuelve la instancia única del TaskManager.
   * Si no existe, la crea automáticamente.
   * @returns {TaskManager}
   */
  static getInstance() {
    if (!TaskManager.#instancia) {
      TaskManager.#instancia = new TaskManager();
    }
    return TaskManager.#instancia;
  }

  // =========================
  // === PATRÓN OBSERVER ====
  // =========================

  /**
   * Suscribe una función observadora para ser notificada cuando cambie el estado.
   * @param {Function} observador - Función a ejecutar en cada notificación.
   * @returns {void}
   */
  suscribir(observador) {
    if (typeof observador === 'function') {
      this.observadores.push(observador);
    }
  }

  /**
   * Notifica a todos los observadores suscritos que hubo un cambio.
   * @returns {void}
   */
  notificar() {
    this.observadores.forEach(fn => fn());
  }

  // =========================
  // === MÉTODOS DE TAREAS ===
  // =========================

  /**
   * Crea una nueva tarea y la agrega a la lista.
   * Luego notifica a los observadores.
   * @param {string} texto - Texto de la tarea.
   * @returns {Tarea} La tarea creada.
   */
  agregarTarea(texto) {
    const tarea = new Tarea(texto);
    this.tareas.push(tarea);
    this.notificar();
    return tarea;
  }

  /**
   * Elimina una tarea por su ID y notifica a los observadores.
   * @param {number} id - ID de la tarea a eliminar.
   * @returns {boolean} true si se eliminó, false si no se encontró.
   */
  eliminarTarea(id) {
    const longitudInicial = this.tareas.length;
    this.tareas = this.tareas.filter(t => t.id !== id);
    const eliminada = this.tareas.length < longitudInicial;
    if (eliminada) this.notificar();
    return eliminada;
  }

  /**
   * Marca como completada una tarea por su ID y notifica a los observadores.
   * @param {number} id - ID de la tarea a marcar.
   * @returns {boolean} true si se completó, false si no se encontró.
   */
  marcarTareaComoCompletada(id) {
    const tarea = this.tareas.find(t => t.id === id);
    if (tarea) {
      tarea.completar();
      this.notificar();
      return true;
    }
    return false;
  }

  /**
   * Devuelve todas las tareas actuales.
   * @returns {Tarea[]} Array de tareas.
   */
  obtenerTareas() {
    return this.tareas;
  }
}
