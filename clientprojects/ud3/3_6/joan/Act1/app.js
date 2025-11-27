import { Tarea } from './Tarea.js';

// instancias
const tarea1 = new Tarea("Reclamar cofre clash royale");
const tarea2 = new Tarea("Autocliquear");

// ver las tareas
console.log("Tareas:");
console.log(tarea1.toString());
console.log(tarea2.toString());

// Completar 
tarea1.completar();

// verla las tareas coon cambios
console.log("\nDespués de completar la primera tarea:");
console.log(tarea1.toString());
console.log(tarea2.toString());
