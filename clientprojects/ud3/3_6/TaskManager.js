import { Tarea } from './Tarea.js';

/**
 * Gestiona el estado de todas las tareas de la aplicación.
 * @class TaskManager
 * @implements El patrón Singleton para garantizar una única instancia.
 * @implements El patrón Observer para notificar cambios.
 */
export class TaskManager {
    /**
     * La única instancia de la clase TaskManager.
     * @private
     * @static
     */
    static instancia;

    /**
     * El array que contiene todas las tareas.
     * @type {Tarea[]}
     */
    tareas = [];

    /**
     * El array de funciones observadoras que serán notificadas de los cambios.
     * @type {Function[]}
     */
    observadores = [];

    constructor() {
        // Esto refuerza el patrón Singleton. Si se intenta crear con 'new', devuelve la instancia existente.
        if (TaskManager.instancia) {
            return TaskManager.instancia;
        }
        TaskManager.instancia = this;
    }

    /**
     * Obtiene la única instancia de TaskManager.
     * @static
     * @returns {TaskManager} La instancia única.
     */
    static getInstance() {
        if (!this.instancia) {
            this.instancia = new TaskManager();
        }
        return this.instancia;
    }

    /**
     * Suscribe una función observadora para ser notificada de los cambios.
     * @param {Function} observador La función a ejecutar cuando haya cambios.
     */
    suscribir(observador) {
        this.observadores.push(observador);
    }

    /**
     * Ejecuta todas las funciones observadoras, pasándoles el estado actual de las tareas.
     * @private
     */
    notificar() {
        // Pasamos una copia de las tareas para evitar modificaciones externas
        const tareasActuales = [...this.tareas];
        this.observadores.forEach(obs => obs(tareasActuales));
    }

    /**
     * Añade una nueva tarea a la lista y notifica a los observadores.
     * @param {string} texto El texto de la nueva tarea.
     */
    agregarTarea(texto) {
        const nuevaTarea = new Tarea(texto);
        this.tareas.push(nuevaTarea);
        this.notificar();
    }
    
    /**
     * Marca una tarea como completada y notifica a los observadores.
     * @param {number} id El ID de la tarea a completar.
     */
    marcarTareaComoCompletada(id) {
        const tarea = this.tareas.find(t => t.id === id);
        if (tarea) {
            tarea.completar();
            this.notificar();
        }
    }
}