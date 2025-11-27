// @ts-check

/**
 * Clase fábrica para crear elementos UI relacionados con tareas
 * @class
 * @classdesc ElementoUIFactory proporciona métodos estáticos para crear elementos HTML que representan tareas en diferentes formatos
 */
export class ElementoUIFactory {
  /**
   * Crea un elemento HTML
   * @param {import('./Tarea.js').Tarea} tarea - La tarea a representar
   * @param {"simple" | "detallado"} tipo - Tipo de elemento a crear
   * @returns {HTMLElement} Elemento del DOM que representa la tarea
   */
  static crearElementoTarea(tarea, tipo) {
    if (tipo === "simple") {
      const li = document.createElement("li");
      li.textContent = tarea.toString();
      return li;
    }

    if (tipo === "detallado") {
      const div = document.createElement("div");
      div.classList.add("tarea-detallada");

      const texto = document.createElement("p");
      texto.textContent = tarea.texto;

      const fecha = document.createElement("small");
      fecha.textContent = `Creada el: ${tarea.fechaCreacion.toLocaleString()}`;

      const checkbox = document.createElement("input");
      checkbox.type = "checkbox";
      checkbox.checked = tarea.completada;

      div.append(texto, fecha, checkbox);
      return div;
    }

    throw new Error(`Tipo de elemento no válido: ${tipo}`);
  }
}
