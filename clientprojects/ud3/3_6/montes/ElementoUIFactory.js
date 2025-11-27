/**
 * @class ElementoUIFactory
 * @description Aplica el patrón Factory para encapsular la lógica
 * de creación de elementos DOM que representan una Tarea.
 *
 * El cliente (app.js) delega la creación en esta clase,
 * sin saber los detalles de implementación del DOM.
 */
export class ElementoUIFactory {
  /**
   * @static
   * @description Crea y devuelve un elemento DOM para una tarea,
   * según el tipo especificado.
   *
   * @param {Tarea} tarea La instancia de la Tarea a representar.
   * @param {'simple' | 'detallado'} tipo El formato de UI deseado.
   * @returns {HTMLElement} El elemento DOM construido.
   * @throws {Error} Si el tipo no es reconocido.
   */
  static crearElementoTarea(tarea, tipo) {
    switch (tipo) {
      case "simple":
        return this.#crearSimple(tarea);
      case "detallado":
        return this.#crearDetallado(tarea);
      default:
        throw new Error(`Tipo de elemento UI desconocido: ${tipo}`);
    }
  }

  /**
   * @private
   * @static
   * @description Crea la representación 'simple' (<li>).
   * @param {Tarea} tarea
   * @returns {HTMLLIElement}
   */
  static #crearSimple(tarea) {
    const li = document.createElement("li");
    li.textContent = tarea.texto;

    // Usamos data-attributes para vincular el DOM al ID de los datos
    li.dataset.tareaId = tarea.id;

    // Aplicamos estilos si está completada
    if (tarea.completada) {
      li.style.textDecoration = "line-through";
      li.style.opacity = "0.7";
    }
    return li;
  }

  /**
   * @private
   * @static
   * @description Crea la representación 'detallada' (<div>).
   * @param {Tarea} tarea
   * @returns {HTMLDivElement}
   */
  static #crearDetallado(tarea) {
    const div = document.createElement("div");
    div.className = "tarea-detallada"; // Clase para CSS
    div.dataset.tareaId = tarea.id;

    // 1. Checkbox
    const checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.checked = tarea.completada;
    // El evento 'change' se manejará en app.js (event delegation)

    // 2. Texto
    const spanTexto = document.createElement("span");
    spanTexto.textContent = tarea.texto;

    // 3. Fecha
    const spanFecha = document.createElement("span");
    spanFecha.className = "fecha-creacion";
    // Asumimos que tarea.fechaCreacion es un objeto Date
    spanFecha.textContent = tarea.fechaCreacion.toLocaleString("es-ES", {
      day: "2-digit",
      month: "2-digit",
      hour: "2-digit",
      minute: "2-digit",
    });

    if (tarea.completada) {
      spanTexto.style.textDecoration = "line-through";
    }

    // 4. Botón de eliminar
    const btnEliminar = document.createElement("button");
    btnEliminar.className = "eliminar-btn";
    btnEliminar.textContent = "Eliminar";
    btnEliminar.type = "button";

    div.append(checkbox, spanTexto, spanFecha, btnEliminar);
    return div;
  }
}
