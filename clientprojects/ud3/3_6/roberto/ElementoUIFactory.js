import TaskManager from './TaskManager.js';

/**
 * Fábrica para crear elementos del DOM que representan una tarea.
 * Desacopla la lógica de la aplicación de la creación específica de la UI.
 * @class
 */
export default class ElementoUIFactory {

    /**
     * Crea y devuelve un elemento del DOM para una tarea específica.
     * @param {Tarea} tarea - La instancia de la tarea a representar.
     * @param {'simple' | 'detallado'} tipo - El formato de UI deseado.
     * @returns {HTMLElement} El elemento del DOM creado.
     */
    crearElementoTarea(tarea, tipo = 'simple') {
        if (tipo === 'simple') {
            return this.crearSimple(tarea);
        }

        if (tipo === 'detallado') {
            return this.crearDetallado(tarea);
        }

        throw new Error(`Tipo de UI no reconocido: ${tipo}`);
    }

    /**
     * Crea una representación "simple" (<li>).
     * @private
     * @param {Tarea} tarea
     * @returns {HTMLLIElement}
     */
    crearSimple(tarea) {
        const li = document.createElement('li');
        li.textContent = tarea.toString();
        
        // Añadimos un botón de eliminar para interactividad
        const btnEliminar = document.createElement('button');
        btnEliminar.textContent = 'X';
        btnEliminar.style.marginLeft = '10px';
        btnEliminar.onclick = () => {
             TaskManager.getInstance().eliminarTarea(tarea.id);
        };

        li.appendChild(btnEliminar);
        return li;
    }

    /**
     * Crea una representación "detallada" (<div>).
     * @private
     * @param {Tarea} tarea
     * @returns {HTMLDivElement}
     */
    crearDetallado(tarea) {
        const div = document.createElement('div');
        div.style.border = '1px solid #ccc';
        div.style.padding = '10px';
        div.style.margin = '5px 0';
        div.style.backgroundColor = tarea.completada ? '#f0f0f0' : '#fff';

        const h4 = document.createElement('h4');
        h4.textContent = tarea.texto;

        const p = document.createElement('p');
        p.textContent = `Creada: ${tarea.fechaCreacion.toLocaleString()}`;

        const label = document.createElement('label');
        const checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.checked = tarea.completada;
        
        // Al hacer clic, notificamos al TaskManager
        checkbox.addEventListener('click', () => {
            if (checkbox.checked) {
                TaskManager.getInstance().marcarTareaComoCompletada(tarea.id);
            }
            // Nota: La instrucción no pedía "descompletar", solo "completar".
            // Para una app real, aquí iría la lógica de toggle.
        });

        label.append(checkbox, ' Completada');
        div.append(h4, p, label);
        return div;
    }
}