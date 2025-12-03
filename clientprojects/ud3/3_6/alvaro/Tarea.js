/**
 * Representa una tarea individual en la lista de quehaceres.
 * @class
 */
class Tarea {
  /**
   * Crea una instancia de Tarea.
   * @param {string} texto - El contenido de la tarea.
   */
  constructor(texto) {
    /**
     * Identificador único para la tarea.
     * Se genera usando un timestamp numérico.
     * @property {number} id
     */
    this.id = Date.now() + Math.floor(Math.random() * 100); // Se añade un extra para evitar colisiones rápidas

    /**
     * El texto descriptivo de la tarea.
     * @property {string} texto
     */
    this.texto = texto;

    /**
     * Estado de la tarea (completada o pendiente).
     * @property {boolean} completada
     * @default false
     */
    this.completada = false;

    /**
     * La fecha y hora en que se creó la tarea.
     * @property {Date} fechaCreacion
     */
    this.fechaCreacion = new Date();
  }

  /**
   * Marca la tarea como completada, cambiando su estado.
   * @method
   */
  completar() {
    this.completada = true;
  }

  /**
   * Devuelve una representación en string de la tarea,
   * indicando su estado.
   * @method
   * @returns {string} Una cadena como "[ ] Tarea" o "[x] Tarea".
   */
  toString() {
    const prefijo = this.completada ? '[x]' : '[ ]';
    return `${prefijo} ${this.texto}`;
  }
}

// Exportamos la clase para que otros módulos puedan usarla.
export default Tarea;