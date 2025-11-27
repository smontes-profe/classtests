import Tarea from './Tarea.js';

/**
 * Gestiona el estado global de la lista de tareas.
 * Implementa el patrón Singleton para asegurar una única instancia.
 * Implementa el patrón Observer (Sujeto) para notificar cambios.
 *
 * @class
 * @property {Tarea[]} tareas - El array de tareas gestionadas.
 * @property {Function[]} observadores - El array de funciones (observadores) a notificar.
 */
class TaskManager {
  /**
   * @type {TaskManager | null}
   * @private
   * @static
   */
  static instance = null;

  /**
   * El constructor es privado (simulado) para el Singleton.
   * Si ya existe una instancia, la devuelve.
   * Si no, crea la instancia, la almacena y la devuelve.
   */
  constructor() {
    if (TaskManager.instance) {
      console.warn("Intentando crear una segunda instancia de TaskManager. Usando la existente.");
      return TaskManager.instance;
    }

    /**
     * El almacén de tareas.
     * @property {Tarea[]} tareas
     * @private
     */
    this.tareas = [];

    /**
     * Almacén de funciones observadoras.
     * @property {Function[]} observadores
     * @private
     */
    this.observadores = [];

    TaskManager.instance = this;
  }

  /**
   * Método estático para obtener la instancia única del TaskManager.
   * @static
   * @returns {TaskManager} La instancia única.
   */
  static getInstance() {
    if (!TaskManager.instance) {
      TaskManager.instance = new TaskManager();
    }
    return TaskManager.instance;
  }

  // --- Métodos del Sujeto (Patrón Observer) ---

  /**
   * Suscribe una función (observador) para que sea notificada de los cambios.
   * @param {Function} observador - La función a ejecutar cuando el estado cambie.
   */
  suscribir(observador) {
    this.observadores.push(observador);
  }

  /**
   * Desuscribe a un observador.
   * @param {Function} observador - La función a eliminar de las suscripciones.
   */
  desuscribir(observador) {
    this.observadores = this.observadores.filter(obs => obs !== observador);
  }

  /**
   * Notifica a todos los observadores suscritos ejecutando sus funciones.
   * Se llama internamente cuando el estado de las tareas cambia.
   * @private
   */
  notificar() {
    console.log("Notificando a " + this.observadores.length + " observadores...");
    // Usamos [...this.observadores] para crear una copia por si un observador
    // intenta desuscribirse a sí mismo durante la notificación.
    [...this.observadores].forEach(observador => {
      try {
        observador();
      } catch (error) {
        console.error("Error en un observador:", error);
      }
    });
  }

  // --- Métodos de Gestión de Tareas ---

  /**
   * Añade una nueva tarea a la lista.
   * Crea una instancia de Tarea y la almacena.
   * Notifica a los observadores del cambio.
   * @param {string} texto - El texto para la nueva tarea.
   */
  agregarTarea(texto) {
    if (!texto || texto.trim() === '') {
      console.warn("No se puede agregar una tarea vacía.");
      return;
    }
    const nuevaTarea = new Tarea(texto);
    this.tareas.push(nuevaTarea);
    this.notificar(); // Notificar después del cambio
  }

  /**
   * Elimina una tarea de la lista por su ID.
   * Notifica a los observadores del cambio.
   * @param {number} id - El ID de la tarea a eliminar.
   */
  eliminarTarea(id) {
    const totalInicial = this.tareas.length;
    this.tareas = this.tareas.filter(tarea => tarea.id !== id);
    // Solo notificar si realmente se eliminó algo
    if (this.tareas.length < totalInicial) {
      this.notificar();
    }
  }

  /**
   * Marca una tarea como completada por su ID.
   * Notifica a los observadores del cambio.
   * @param {number} id - El ID de la tarea a completar.
   */
  marcarTareaComoCompletada(id) {
    const tarea = this.tareas.find(t => t.id === id);
    if (tarea && !tarea.completada) {
      tarea.completar();
      this.notificar(); // Notificar después del cambio
    }
  }

  /**
   * Devuelve la lista completa de tareas.
   * @returns {Tarea[]} Un array con todas las instancias de Tarea.
   */
  obtenerTareas() {
    // Devolvemos una copia superficial para evitar mutaciones externas
    return [...this.tareas];
  }
}

export default TaskManager;