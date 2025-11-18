/**
 * Fábrica responsable de crear los elementos del DOM para representar las tareas.
 * Desacopla la lógica de la aplicación de la estructura específica del HTML.
 * @class ElementoUIFactory
 */
export class ElementoUIFactory {
    /**
     * Crea un elemento del DOM para una tarea según el tipo especificado.
     * @param {import('./Tarea.js').Tarea} tarea El objeto Tarea a representar.
     * @param {string} tipo El formato deseado ('simple' o 'detallado').
     * @returns {HTMLElement} El elemento del DOM creado.
     */
    crearElementoTarea(tarea, tipo = 'simple') {
        switch (tipo) {
            case 'simple':
                return this.crearElementoSimple(tarea);
            // Se podrían añadir más tipos aquí, como 'detallado'
            default:
                throw new Error(`Tipo de elemento UI desconocido: ${tipo}`);
        }
    }

    /**
     * Crea una representación simple de la tarea como un elemento <li>.
     * @private
     * @param {import('./Tarea.js').Tarea} tarea
     * @returns {HTMLLIElement}
     */
    crearElementoSimple(tarea) {
        const li = document.createElement('li');
        li.textContent = tarea.toString();
        li.dataset.id = tarea.id; // Añadimos el ID para futuras interacciones
        if (tarea.completada) {
            li.classList.add('completada');
        }
        return li;
    }
}