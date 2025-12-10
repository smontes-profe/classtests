// Funciones para no repetir código visual

/**
 * Muestra u oculta un elemento de carga.
 * @param {string} elementId ID del elemento HTML
 * @param {boolean} show True para mostrar, False para ocultar
 */
export function toggleLoading(elementId, show) {
    const el = document.getElementById(elementId);
    if (el) el.style.display = show ? 'block' : 'none';
}

/**
 * Muestra un mensaje de error en el elemento especificado.
 * @param {string} elementId ID del elemento donde mostrar el error
 * @param {string} message Mensaje de error
 */
export function showError(elementId, message) {
    const el = document.getElementById(elementId);
    if (el) {
        el.textContent = `Error: ${message}`;
        el.style.display = 'block';
    }
}