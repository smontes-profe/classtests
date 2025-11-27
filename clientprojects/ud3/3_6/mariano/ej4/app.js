import TaskManager from './TaskManager.js';
import ElementoUIFactory from './ElementoUIFactory.js';

// Obtener el gestor de tareas (Singleton)
const gestor = TaskManager.getInstance();
const factory = new ElementoUIFactory();

// Crear contenedores en el DOM
const listaSimple = document.getElementById('lista-simple');
const listaDetallada = document.getElementById('lista-detallada');

// Crear algunas tareas
gestor.agregarTarea('Aprender Factory Pattern');
gestor.agregarTarea('Implementar Observer');
gestor.agregarTarea('Refactorizar código');

// Mostrar las tareas en formato simple y detallado
gestor.obtenerTareas().forEach(tarea => {
  const elementoSimple = factory.crearElementoTarea(tarea, 'simple');
  const elementoDetallado = factory.crearElementoTarea(tarea, 'detallado');

  listaSimple.appendChild(elementoSimple);
  listaDetallada.appendChild(elementoDetallado);
});
