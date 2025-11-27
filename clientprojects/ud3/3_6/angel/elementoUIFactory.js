"use strict";

import { Tarea } from "./tarea.js";

/**
 * Fábrica para crear elementos DOM que representen tareas.
 * @class
 */
export class ElementoUIFactory {

    /**
     * Crea un elemento DOM para una tarea según el tipo.
     * @param {Tarea} tarea - Instancia de la tarea a representar.
     * @param {string} tipo - Tipo de elemento ('simple' o 'detallado').
     * @returns {HTMLElement} Elemento DOM generado.
     */
    crearElementoTarea(tarea, tipo) {
        if (tipo === 'simple') {
            const li = document.createElement('li');
            li.textContent = tarea.toString();
            return li;
        } else if (tipo === 'detallado') {
            const div = document.createElement('div');
            div.classList.add('tarea-detallada');

            const texto = document.createElement('p');
            texto.textContent = tarea.texto;
            div.appendChild(texto);

            const fecha = document.createElement('small');
            fecha.textContent = `Creada: ${tarea.fechaCreacion.toLocaleString()}`;
            div.appendChild(fecha);

            const checkbox = document.createElement('input');
            checkbox.type = 'checkbox';
            checkbox.checked = tarea.completada;

            checkbox.addEventListener('change', () => {
                tarea.completada = checkbox.checked;
            });

            div.appendChild(checkbox);
            return div;
        } else {
            throw new Error(`Tipo de elemento no soportado: ${tipo}`);
        }
    }
}
