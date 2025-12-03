import Tarea from './Tarea.js';

/**
 * @typedef {function} Observador
 * Función callback que será notificada cuando el estado cambie.
 */

let instance = null;

/**
 * @class
 */
export default class TaskManager {
    /**
     * @property {Tarea[]} tareas - Array de tareas.
     * @private
     */
    tareas = [];

    /**
     * @property {Observador[]} observadores - Array de funciones observadoras.
     * @private
     */
    observadores = [];

    /**
     * El constructor es privado (simulado) para el Singleton.
     * Si se intenta instanciar directamente, devuelve la instancia existente.
     * @hideconstructor
     */
    constructor() {
        if (instance) {
            return instance;
        }
        instance = this;
        console.log("Instancia de TaskManager creada");
    }

    /**
     * Obtiene la instancia única del TaskManager.
     * @static
     * @returns {TaskManager} La instancia única.
     */
    static getInstance() {
        if (!instance) {
            instance = new TaskManager();
        }
        return instance;
    }

    // --- Métodos del Observer ---

    /**
     * Suscribe una función para recibir notificaciones.
     * @param {Observador} observador - La función que se ejecutará al notificar.
     */
    suscribir(observador) {
        this.observadores.push(observador);
    }

    /**
     * Ejecuta todas las funciones observadoras suscritas.
     * @private
     */
    notificar() {
        console.log("Notificando a los observadores...");
        this.observadores.forEach(observador => observador());
    }

    // --- Métodos de gestión de tareas ---

    /**
     * Añade una nueva tarea a la lista.
     * @param {string} texto El texto de la nueva tarea.
     */
    agregarTarea(texto) {
        const nuevaTarea = new Tarea(texto);
        this.tareas.push(nuevaTarea);
        this.notificar(); // Notifica después de cambiar el estado
    }

    /**
     * Elimina una tarea de la lista por su ID.
     * @param {number} id El ID de la tarea a eliminar.
     */
    eliminarTarea(id) {
        this.tareas = this.tareas.filter(tarea => tarea.id !== id);
        this.notificar(); // Notifica después de cambiar el estado
    }

    /**
     * Marca una tarea como completada por su ID.
     * @param {number} id El ID de la tarea a completar.
     */
    marcarTareaComoCompletada(id) {
        const tarea = this.tareas.find(t => t.id === id);
        if (tarea) {
            tarea.completar();
            this.notificar(); // Notifica después de cambiar el estado
        }
    }

    /**
     * Devuelve todas las tareas actuales.
     * @returns {Tarea[]} Un array con todas las tareas.
     */
    obtenerTareas() {
        return this.tareas;
    }
}