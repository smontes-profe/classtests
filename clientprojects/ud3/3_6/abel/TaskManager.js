import Tarea from './Tarea.js';

export default class TaskManager {
    constructor() {
        if (TaskManager._instance) {
            throw new Error('No se puede crear otra instancia de TaskManager. Usa TaskManager.getInstance()');
        }
        this.tareas = [];
        this.observadores = []; // Array de funciones observadoras
    }

    // Singleton
    static getInstance() {
        if (!TaskManager._instance) {
            TaskManager._instance = new TaskManager();
        }
        return TaskManager._instance;
    }

    // Suscribir un observador (función)
    suscribir(observador) {
        if (typeof observador === 'function') {
            this.observadores.push(observador);
        }
    }

    // Notificar a todos los observadores
    notificar() {
        this.observadores.forEach(func => func());
    }

    agregarTarea(texto) {
        const id = `${Date.now()}-${Math.random().toString(36).slice(2, 8)}`;
        const tarea = new Tarea(id, texto);
        this.tareas.push(tarea);
        this.notificar(); // Llamada automática a los observadores
        return tarea;
    }

    eliminarTarea(id) {
        const index = this.tareas.findIndex(t => t.id === id);
        if (index !== -1) {
            this.tareas.splice(index, 1);
            this.notificar();
            return true;
        }
        return false;
    }

    obtenerTareas() {
        return this.tareas;
    }

    marcarTareaComoCompletada(id) {
        const tarea = this.tareas.find(t => t.id === id);
        if (tarea) {
            tarea.completar();
            this.notificar();
            return true;
        }
        return false;
    }
}
