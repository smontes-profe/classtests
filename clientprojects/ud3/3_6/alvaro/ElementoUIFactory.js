/**
 * Implementa el patrón Factory (Fábrica) para crear elementos del DOM
 * que representan una Tarea, desacoplando la lógica de la app
 * de la estructura específica del HTML.
 *
 * @class
 */
class ElementoUIFactory {
  /**
   * Crea un elemento del DOM para una tarea, según el tipo solicitado.
   * @param {Tarea} tarea - La instancia de la Tarea a representar.
   * @param {'simple' | 'detallado'} tipo - El formato deseado.
   * @returns {HTMLElement} El elemento del DOM (ej. <li> o <div>) construido.
   * @throws {Error} Si el tipo solicitado no es 'simple' ni 'detallado'.
   */
  crearElementoTarea(tarea, tipo) {
    switch (tipo) {
      case 'simple':
        return this.crearSimple(tarea);
      case 'detallado':
        return this.crearDetallado(tarea);
      default:
        throw new Error(`Tipo de elemento desconocido: ${tipo}`);
    }
  }

  /**
   * Crea una representación "simple" de la tarea.
   * @private
   * @param {Tarea} tarea
   * @returns {HTMLLIElement}
   */
  crearSimple(tarea) {
    const li = document.createElement('li');
    li.textContent = tarea.toString(); // Usa el método toString() de Tarea
    li.dataset.id = tarea.id; // Añadimos data-id para posible interacción
    li.style.cursor = 'pointer';

    if (tarea.completada) {
      li.style.textDecoration = 'line-through';
      li.style.opacity = '0.6';
    }
    return li;
  }

  /**
   * Crea una representación "detallada" de la tarea.
   * @private
   * @param {Tarea} tarea
   * @returns {HTMLDivElement}
   */
  crearDetallado(tarea) {
    const div = document.createElement('div');
    div.dataset.id = tarea.id;
    div.className = 'tarea-detallada'; // Para CSS
    div.style.border = '1px solid #ccc';
    div.style.padding = '10px';
    div.style.margin = '5px 0';
    div.style.borderRadius = '5px';

    if (tarea.completada) {
      div.style.backgroundColor = '#f0f0f0';
      div.style.opacity = '0.7';
    }

    // Formatear la fecha
    const fechaFormateada = tarea.fechaCreacion.toLocaleString('es-ES', {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric',
      hour: '2-digit',
      minute: '2-digit',
    });

    // Usamos innerHTML para construir la estructura interna
    div.innerHTML = `
      <div style="display: flex; justify-content: space-between; align-items: start;">
        <div>
          <h4 style="margin: 0 0 5px 0; ${tarea.completada ? 'text-decoration: line-through;' : ''}">
            ${tarea.texto}
          </h4>
          <small>Creada: ${fechaFormateada}</small>
        </div>
        <label style="flex-shrink: 0; margin-left: 10px; cursor: pointer;">
          <input type"checkbox" ${tarea.completada ? 'checked' : ''} />
          Completada
        </label>
      </div>
    `;
    return div;
  }
}

export default ElementoUIFactory;