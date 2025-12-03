'use strict';

import { TaskManager } from "./taskManager.js";
import { Tarea } from "../Ejercicio001/tarea.js";

const taskManager1 = new TaskManager();
const taskManager2 = new TaskManager();

taskManager1.agregarTarea("Terminar la tarea de js para el miércoles");
taskManager1.agregarTarea("Terminar JC para el domingo");

console.log(taskManager1.obtenerTareas());
console.log(taskManager2.obtenerTareas());

const arrayDeTareas = taskManager1.obtenerTareas();
let tareaID = arrayDeTareas.find(tarea => tarea.descripcion === "Terminar JC para el domingo")?.id;

taskManager1.eliminarTarea(tareaID);

console.log(taskManager1.obtenerTareas());
console.log(taskManager2.obtenerTareas());