/**
 * Clase que gestiona todas las tareas de la aplicación.
 * Implementa el patrón Singleton para garantizar una única instancia en toda la aplicación.
 * También implementa el patrón Observer para notificar cambios a los suscriptores.
 * @class
 */
class TaskManager {
  /**
   * Instancia única del TaskManager (patrón Singleton).
   * @static
   * @private
   * @type {TaskManager|null}
   */
  static instancia = null;

  /**
   * Constructor privado para implementar el patrón Singleton.
   * @constructor
   * @private
   */
  constructor() {
    if (TaskManager.instancia) {
      return TaskManager.instancia;
    }

    /**
     * Array que almacena todas las tareas.
     * @property {Tarea[]}
     */
    this.tareas = [];

    /**
     * Array que almacena las funciones observadoras suscritas.
     * @property {Function[]}
     */
    this.observadores = [];

    TaskManager.instancia = this;
  }

  /**
   * Obtiene la única instancia de TaskManager (patrón Singleton).
   * @static
   * @returns {TaskManager} La instancia única del gestor de tareas.
   */
  static getInstance() {
    if (!TaskManager.instancia) {
      TaskManager.instancia = new TaskManager();
    }
    return TaskManager.instancia;
  }

  /**
   * Añade una nueva tarea al gestor.
   * @param {string} texto - El texto de la nueva tarea.
   * @returns {Tarea} La tarea creada.
   */
  agregarTarea(texto) {
    const nuevaTarea = new Tarea(texto);
    this.tareas.push(nuevaTarea);
    this.notificar();
    return nuevaTarea;
  }

  /**
   * Elimina una tarea del gestor por su ID.
   * @param {number} id - El identificador de la tarea a eliminar.
   * @returns {boolean} True si se eliminó correctamente, false si no se encontró.
   */
  eliminarTarea(id) {
    const indiceOriginal = this.tareas.length;
    this.tareas = this.tareas.filter(tarea => tarea.id !== id);
    const seElimino = this.tareas.length < indiceOriginal;
    
    if (seElimino) {
      this.notificar();
    }
    
    return seElimino;
  }

  /**
   * Obtiene todas las tareas almacenadas.
   * @returns {Tarea[]} Array con todas las tareas.
   */
  obtenerTareas() {
    return this.tareas;
  }

  /**
   * Marca una tarea como completada buscándola por su ID.
   * @param {number} id - El identificador de la tarea a completar.
   * @returns {boolean} True si se completó correctamente, false si no se encontró.
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
   * Suscribe una función observadora que será notificada cuando cambien las tareas.
   * Implementa el patrón Observer.
   * @param {Function} observador - Función que será ejecutada cuando haya cambios.
   * @returns {void}
   */
  suscribir(observador) {
    if (typeof observador === 'function') {
      this.observadores.push(observador);
    }
  }

  /**
   * Notifica a todos los observadores suscritos ejecutando sus funciones.
   * Se llama automáticamente cuando el estado de las tareas cambia.
   * @returns {void}
   */
  notificar() {
    this.observadores.forEach(observador => observador());
  }
}