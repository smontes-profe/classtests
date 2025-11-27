import { Tarea } from "./Tarea.js";

/**
 * @class TaskManager
 * @description Gestiona la lista de tareas aplicando el patrón Singleton.
 * Asegura que solo exista una instancia de este gestor en la aplicación.
 * @property {Tarea[]} #tareas - Array privado que almacena las instancias de Tarea.
 */
export class TaskManager {
  /**
   * @private
   * @static
   * @type {TaskManager}
   * @description Almacena la única instancia de la clase.
   */
  static #instance;

  #tareas;
  #observadores;

  /**
   * @constructor
   * @private
   * @description Constructor privado para forzar el patrón Singleton.
   * @throws {Error} Si se intenta instanciar directamente más de una vez.
   */
  constructor() {
    if (TaskManager.#instance) {
      throw new Error(
        "Error: Instancia ya creada. Usa TaskManager.getInstance()."
      );
    }
    this.#tareas = [];
    this.#observadores = [];
    TaskManager.#instance = this;
  }

  /**
   * @static
   * @description Obtiene la instancia única del TaskManager.
   * @returns {TaskManager} La instancia Singleton.
   */
  static getInstance() {
    if (!TaskManager.#instance) {
      new TaskManager(); // El constructor asignará #instance
    }
    return TaskManager.#instance;
  }

  /**
   * @description Suscribe un observador para recibir notificaciones de cambios.
   * @param {Function} observador - Función que se ejecutará cuando cambie el estado.
   */
  suscribir(observador) {
    if (typeof observador === "function") {
      this.#observadores.push(observador);
      console.log("LOG: Observador suscrito");
    }
  }

  /**
   * @description Desuscribe un observador.
   * @param {Function} observador - Función a desuscribir.
   */
  desuscribir(observador) {
    const index = this.#observadores.indexOf(observador);
    if (index > -1) {
      this.#observadores.splice(index, 1);
      console.log("LOG: Observador desuscrito");
    }
  }

  /**
   * @private
   * @description Notifica a todos los observadores del cambio de estado.
   */
  #notificar() {
    const estado = [...this.#tareas]; // Copia del array para evitar mutaciones externas
    this.#observadores.forEach((obs) => {
      try {
        obs(estado);
      } catch (error) {
        console.error("Error al notificar observador:", error);
      }
    });
  }

  /**
   * @description Añade una nueva tarea a la lista.
   * @param {string} text El contenido textual de la tarea a crear.
   * @returns {Tarea} La instancia de la Tarea recién creada y añadida.
   */
  agregarTarea(text) {
    // CORRECCIÓN: Se usa el parámetro 'text'.
    const nuevaTarea = new Tarea(text);
    this.#tareas.push(nuevaTarea);
    console.log(`LOG: Tarea añadida (ID: ${nuevaTarea.id})`);
    this.#notificar(); // Notificar a los observadores
    return nuevaTarea;
  }

  /**
   * @description Obtiene el array completo de tareas.
   * @returns {Tarea[]} Un array con todas las tareas almacenadas.
   */
  obtenerTareas() {
    // CORRECCIÓN: El parámetro 'id' (no utilizado) ha sido eliminado.
    return this.#tareas;
  }

  /**
   * @description Elimina una tarea de la lista usando su ID.
   * @param {string|number} id El ID de la tarea a eliminar.
   * @returns {boolean} True si la tarea fue eliminada, false si no se encontró.
   */
  eliminarTarea(id) {
    // CORRECCIÓN: Corregido typo (elminarTareas) y lógica de filter.
    const lengthInit = this.#tareas.length;

    // .filter() es inmutable (crea un nuevo array),
    // por lo que debemos reasignar el resultado a la propiedad de la clase.
    this.#tareas = this.#tareas.filter((elemento) => elemento.id !== id);

    const eliminado = this.#tareas.length < lengthInit;
    if (eliminado) {
      console.log(`LOG: Tarea eliminada (ID: ${id})`);
      this.#notificar(); // Notificar a los observadores
    }
    return eliminado;
  }

  /**
   * @description Busca una tarea por su ID y la marca como completada.
   * @param {string|number} id El ID de la tarea a completar.
   * @returns {boolean} True si la tarea fue encontrada y marcada, false en caso contrario.
   */
  marcarTareaComoCompletada(id) {
    const tarea = this.#tareas.find((t) => t.id === id);

    if (tarea) {
      tarea.completar(); // Mutamos el objeto Tarea encontrado
      console.log(`LOG: Tarea completada (ID: ${id})`);
      this.#notificar(); // Notificar a los observadores
      return true;
    }
    return false;
  }

  /**
   * @description Alterna el estado de completado de una tarea.
   * @param {string|number} id El ID de la tarea a alternar.
   * @returns {boolean} True si la tarea fue encontrada y alternada, false en caso contrario.
   */
  toggleEstadoTarea(id) {
    const tarea = this.#tareas.find((t) => t.id === id);

    if (tarea) {
      if (tarea.completada) {
        tarea.descompletar();
        console.log(`LOG: Tarea descompletada (ID: ${id})`);
      } else {
        tarea.completar();
        console.log(`LOG: Tarea completada (ID: ${id})`);
      }
      this.#notificar(); // Notificar a los observadores
      return true;
    }
    return false;
  }
}