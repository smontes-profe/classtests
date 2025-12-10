"use strict";

export class ElementoUIFactory {

  /**
   * Crea un elemento de tarea en la interfaz de usuario.
   * @param {Object} tarea - Objeto que representa la tarea.
   * @param {string} tipo - Tipo de elemento a crear ("simple" o "detallado").
   * @returns {HTMLElement} - Elemento HTML creado para la tarea.
   * @throws {Error} - Si los argumentos de entrada son inválidos.
   */
  crearElementoTarea = (tarea, tipo) => {
    if (!tarea || !tipo) {
      throw new Error(
        "Los argumentos de entrada son inválidos. (Se espera tarea y tipo de tarea."
      );
    }

    // Crear elemento de tarea simple
    if (tipo === "simple") {
      const li = document.createElement("li");
      li.textContent = tarea.descripcion;
      return li;
    }

    // Crear elemento de tarea detallado
    if (tipo === "detallado") {
      const arrayDetallado = [];

      const contenedor = document.createElement("div");

      const texto = document.createElement("p");
      texto.textContent = `Información de tarea: ${tarea.descripcion} con fecha de creación: ${tarea.fechaCreacion}`;
      
      arrayDetallado.push(texto);

      const checkbox = document.createElement("input");
      checkbox.type = "checkbox";
      arrayDetallado.push(checkbox);

      arrayDetallado.forEach((elemento) => {
        contenedor.appendChild(elemento);
      });

      return contenedor;
    }
  };
}
