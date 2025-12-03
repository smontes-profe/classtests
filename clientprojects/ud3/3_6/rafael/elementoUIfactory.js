/**
 * Fábrica para crear elementos del DOM que representan tareas.
 * Implementa el patrón Factory para desacoplar la creación de elementos UI.
 * @class
 */
class ElementoUIFactory {
  /**
   * Crea un elemento del DOM para representar una tarea según el tipo especificado.
   * @param {Object} tarea - La tarea a representar (debe tener propiedades texto, completada, fechaCreacion).
   * @param {string} tipo - El tipo de elemento a crear: 'simple' o 'detallado'.
   * @returns {HTMLElement} El elemento del DOM creado.
   */
  crearElementoTarea(tarea, tipo = 'simple') {
    if (tipo === 'simple') {
      return this.crearElementoSimple(tarea);
    } else if (tipo === 'detallado') {
      return this.crearElementoDetallado(tarea);
    } else {
      throw new Error(`Tipo de elemento "${tipo}" no reconocido. Usa 'simple' o 'detallado'.`);
    }
  }

  /**
   * Crea un elemento simple de lista con el texto de la tarea.
   * @private
   * @param {Object} tarea - La tarea a representar.
   * @returns {HTMLLIElement} Elemento de lista con el texto de la tarea.
   */
  crearElementoSimple(tarea) {
    const li = document.createElement('li');
    li.textContent = tarea.toString();
    li.className = tarea.completada ? 'tarea-completada' : 'tarea-pendiente';
    li.dataset.tareaId = tarea.id;
    return li;
  }

  /**
   * Crea un elemento detallado con texto, fecha y checkbox.
   * @private
   * @param {Object} tarea - La tarea a representar.
   * @returns {HTMLDivElement} Elemento div con información detallada de la tarea.
   */
  crearElementoDetallado(tarea) {
    const div = document.createElement('div');
    div.className = 'tarea-detallada';
    div.dataset.tareaId = tarea.id;

    const checkbox = document.createElement('input');
    checkbox.type = 'checkbox';
    checkbox.checked = tarea.completada;
    checkbox.className = 'tarea-checkbox';

    const textoSpan = document.createElement('span');
    textoSpan.textContent = tarea.texto;
    textoSpan.className = 'tarea-texto';
    if (tarea.completada) {
      textoSpan.style.textDecoration = 'line-through';
    }

    const fechaSpan = document.createElement('span');
    fechaSpan.textContent = `Creada: ${tarea.fechaCreacion.toLocaleString('es-ES')}`;
    fechaSpan.className = 'tarea-fecha';

    const botonEliminar = document.createElement('button');
    botonEliminar.textContent = 'Eliminar';
    botonEliminar.className = 'btn-eliminar';

    div.appendChild(checkbox);
    div.appendChild(textoSpan);
    div.appendChild(fechaSpan);
    div.appendChild(botonEliminar);

    return div;
  }
}