
/**
 * @file 
 * @description 
*/


/**
 * Para elementos visuales de tareas
 * @class
 */
export class ElementoUIFactory {
  /**
   * @param {import('./tarea.js').Tarea} tarea - Instancia de la tarea
   * @param {'simple'|'detallado'} tipo - Tipo de representación visual
   * @returns {HTMLElement} Elemento del DOM
  */

  static crearElementoTarea(tarea, tipo) {
    if (tipo === 'simple') {
      const li = document.createElement('li');
      li.textContent = tarea.toString();
      return li;
    }

    if (tipo === 'detallado') {
      const div = document.createElement('div');
      div.className = 'tarea-detallada';

      const texto = document.createElement('p');
      texto.textContent = tarea.texto;

      const fecha = document.createElement('small');
      fecha.textContent = `Creada: ${tarea.fechaCreacion.toLocaleString()}`;

      const check = document.createElement('input');
      check.type = 'checkbox';
      check.checked = tarea.completada;

      div.appendChild(check);
      div.appendChild(texto);
      div.appendChild(fecha);

      return div;
    }

    throw new Error('Tipo de elemento no reconocido');
  }
}


