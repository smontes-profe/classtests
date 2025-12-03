import {Tarea} from './Tarea.js';

/**
 * Gestiona el conjunto de tareas.
 * @class TaskManager
 */
export class TaskManager {
    /**
     * instancia estática única de TaskManager.
     * @type {TaskManager | null}
     * @private
     * @static
     */
    static instancia = null;

    /**
     * Constructor privado para evitar instanciación directa.
     * @constructor
     * @private
     */ 
    constructor() {
        this.tareas = [];
        this.observadores = [];
    }

    /**
     * Método para controlar el acceso a la instancia única de TaskManager.
     * @returns {TaskManager} La instancia única de TaskManager.
     * @method getInstancia
     * @static
     */
    static getInstancia() {
        if(!TaskManager.instancia) {
            TaskManager.instancia = new TaskManager();
        }
        return TaskManager.instancia;
    }

    /**
     * Agrega un observador que se llamará cuando se modifique la lista de tareas.
     * @param {Function} observador - La función observadora a agregar.
     * @method suscribir
     */
    suscribir(observador) {
        this.observadores.push(observador);
    }

    /**
     * Ejecuta todos los observadores registrados.
     * @method notificar
     * @private
     */
    notificar() {
        this.observadores.forEach(observador => observador());
    }

    /**
     * Crea una nueva tarea al gestor.
     * @param {string} texto - La tarea a añadir.
     * @returns {Tarea} Instancia recien creada
     * @method agregarTarea
     */
    agregarTarea(texto) {
        const newTarea = new Tarea(texto);
        this.tareas.push(newTarea);
        //Notificar a los observadores
        this.notificar();
    }

    /**
     * Elimina una tarea del gestor por su ID.
     * @method eliminarTarea
     * @param {number} id - ID de la tarea a eliminar.
     * @returns {boolean} `true` si se eliminó, `false` si no se encontró.
     */
    eliminarTarea(id) {
        this.tareas = this.tareas.filter(tarea => tarea.id !== id);
        this.notificar();
    }

    /**
     * Obtiene todas las tareas almacenadas.
     * @method obtenerTareas
     * @returns {Tarea[]} Array de tareas.
     */
    obtenerTareas() {
        return this.tareas;
    }

    /**
     * Busca una tarea por su ID y marca como completada.
     * @method marcarTareaComoCompletada
     * @param {number} id - ID de la tarea a marcar.
     * @returns {boolean} `true` si se marcó, `false` si no se encontró.
     */
    marcarTareaComoCompletada(id) {
        const tarea = this.tareas.find(tarea => tarea.id === id);

        if(tarea) {
            tarea.completar();
            //Notificar a los observadores
            this.notificar();
        }
    }
}
