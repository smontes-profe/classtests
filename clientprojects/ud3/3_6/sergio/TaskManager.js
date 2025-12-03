import Tarea from "./Tarea.js";

//Clase para gestionar todas las tareas
class TaskManager {
    //Hago la variable estatica para guardar una unica estancia
    static instancia = null;
     
    constructor() {
        //Array donde se guardan las tareas
        this.tareas = [];
        //Array de funciones para el patron observer
        this.observadores = [];
    }

    //Devuelvo la unica estancia de taskmanager
    static getInstance() {
    if (!TaskManager.instancia) {
      TaskManager.instancia = new TaskManager();
        }
        return TaskManager.instancia;
    }

    //Para añadir una nueva tarea y notifico a los observadores
    agregarTarea(texto) {
    const nueva = new Tarea(texto);
    this.tareas.push(nueva);
    this.notificar(); // avisamos a los observadores
    }

    //Para eliminar una tarea por su id y notifico a los observadores
    eliminarTarea(id) {
    this.tareas = this.tareas.filter(t => t.id !== id);
    this.notificar();
    }

    //Para devolver las tareas actuales
    obtenerTareas() {
    return this.tareas;
    }

    //Para marcar una tarea como completada por su id
    marcarTareaComoCompletada(id) {
    const tarea = this.tareas.find(t => t.id === id);
    if (tarea) {
      tarea.completar();
      this.notificar();
    }
  }


  //Para el patron observer
  
  //Para suscribir una nueva funcion
   suscribir(observador) {
    this.observadores.push(observador);
  }

  //Notifico a los observadores suscritos
  notificar() {
    this.observadores.forEach(fn => fn());
  }
}

export default TaskManager;