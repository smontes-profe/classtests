/**
 * Fábrica de elementos UI para la aplicación de tareas.
 * Implementa el patrón Factory para centralizar la creación de elementos DOM.
 */
export default class ElementoUIFactory {

    /**
     * Crea un elemento del DOM según el tipo solicitado.
     * 
     * @param {string} tipo - Tipo de elemento a crear ('li', 'button', 'span', etc.).
     * @param {object} [props] - Propiedades adicionales del elemento (clases, id, texto).
     * @returns {HTMLElement} El elemento DOM creado.
     */
    crearElementoTarea(tipo, props = {}) {
        const elemento = document.createElement(tipo);

        if (props.id) elemento.id = props.id;
        if (props.className) elemento.className = props.className;
        if (props.texto) elemento.textContent = props.texto;
        if (props.onclick && typeof props.onclick === 'function') {
            elemento.addEventListener('click', props.onclick);
        }

        return elemento;
    }
}
