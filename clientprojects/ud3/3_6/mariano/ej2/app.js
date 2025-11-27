"use strict"

import TaskManager from './TaskManager.js';

// Obtener la instancia única del TaskManager
const gestor1 = TaskManager.getInstance();
const gestor2 = TaskManager.getInstance();

// Comprobar que ambas variables apuntan al mismo objeto
console.log('gestor1 y gestor2 son la misma instancia?', gestor1 === gestor2); 

// Agregar tareas
gestor1.agregarTarea('Estudiar JavaScript');
gestor1.agregarTarea('Hacer ejercicio');
gestor1.agregarTarea('Leer un libro');

// Mostrar tareas iniciales
console.log('');
gestor1.obtenerTareas().forEach(t => console.log(t.toString()));

// Marcar una tarea como completada
const idTareaACompletar = gestor1.obtenerTareas()[1].id;
gestor1.marcarTareaComoCompletada(idTareaACompletar);

// Mostrar tareas después de completar una
console.log('Después de completar una tarea');
gestor1.obtenerTareas().forEach(t => console.log(t.toString()));

// Eliminar una tarea
const idTareaAEliminar = gestor1.obtenerTareas()[0].id; 
gestor1.eliminarTarea(idTareaAEliminar);

// Mostrar tareas después de eliminar
console.log('Después de eliminar una tarea');
gestor1.obtenerTareas().forEach(t => console.log(t.toString()));
