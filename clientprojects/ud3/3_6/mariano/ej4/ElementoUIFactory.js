/**
 * @class ElementoUIFactory
 * @classdesc
 * Fábrica responsable de crear elementos del DOM para representar tareas.
 * 
 * Aplica el **Patrón Factory**, permitiendo generar diferentes tipos de vistas
 * para una misma entidad (`Tarea`) sin que el código cliente conozca los detalles
 * de cómo se crean o estructuran esos elementos.
 * 
 * Ejemplo de uso:
 * ```js
 * const factory = new ElementoUIFactory();
 * const li = factory.crearElementoTarea(tarea, 'simple');
 * document.body.appendChild(li);
 * ```
 */
export default class ElementoUIFactory {
    /**
     * Crea un elemento del DOM que representa una tarea, según el tipo solicitado.
     * 
     * @param {Tarea} tarea - Instancia de la clase Tarea que se desea representar.
     * @param {'simple'|'detallado'} tipo - Tipo de elemento visual a generar.
     * @returns {HTMLElement} Elemento del DOM representando la tarea.
     */
    crearElementoTarea(tarea, tipo = 'simple') {
      if (tipo === 'simple') {
        const li = document.createElement('li');
        li.textContent = tarea.toString();
        return li;
      }
  
      if (tipo === 'detallado') {
        const div = document.createElement('div');
        div.classList.add('tarea-detallada');
        div.style.border = '1px solid #ccc';
        div.style.borderRadius = '8px';
        div.style.padding = '10px';
        div.style.marginBottom = '8px';
        div.style.display = 'flex';
        div.style.alignItems = 'center';
        div.style.justifyContent = 'space-between';
        div.style.backgroundColor = tarea.completada ? '#d4edda' : '#f8f9fa';
  
        // Texto descriptivo
        const texto = document.createElement('span');
        texto.textContent = tarea.texto;
  
        // Fecha
        const fecha = document.createElement('small');
        fecha.textContent = `Creada: ${tarea.fechaCreacion.toLocaleString()}`;
        fecha.style.marginLeft = '10px';
        fecha.style.color = '#555';
  
        // Checkbox para marcar completada
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.checked = tarea.completada;
        checkbox.addEventListener('change', () => {
          tarea.completar();
          div.style.backgroundColor = tarea.completada ? '#d4edda' : '#f8f9fa';
        });
  
        const info = document.createElement('div');
        info.appendChild(texto);
        info.appendChild(fecha);
  
        div.appendChild(info);
        div.appendChild(checkbox);
  
        return div;
      }
  
      throw new Error(`Tipo de elemento desconocido: ${tipo}`);
    }
  }
  