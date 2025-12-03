/**
 * Clase que representa una tarea individual en el sistema de gestión de tareas.
 * @class
 */
class Tarea {
  /**
   * Crea una nueva instancia de Tarea.
   * @constructor
   * @param {string} texto - El texto descriptivo de la tarea.
   */
  constructor(texto) {
    /**
     * Identificador único de la tarea.
     * @property {number}
     */
    this.id = Date.now() + Math.random(); // Añadido random para evitar IDs duplicados

    /**
     * Texto descriptivo de la tarea.
     * @property {string}
     */
    this.texto = texto;

    /**
     * Estado de completitud de la tarea.
     * @property {boolean}
     */
    this.completada = false;

    /**
     * Fecha y hora de creación de la tarea.
     * @property {Date}
     */
    this.fechaCreacion = new Date();
  }

  /**
   * Marca la tarea como completada.
   * @returns {void}
   */
  completar() {
    this.completada = true;
  }

  /**
   * Devuelve una representación en texto de la tarea.
   * @returns {string} La tarea en formato "[x] texto" si está completada o "[ ] texto" si no lo está.
   */
  toString() {
    const estado = this.completada ? '[x]' : '[ ]';
    return `${estado} ${this.texto}`;
  }
}