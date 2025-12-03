import { TaskManager } from "./TaskManager.js";



const gestor1 = TaskManager.getInstance();
const gestor2 = TaskManager.getInstance();


console.log("Es el mismo ?    ", gestor1 === gestor2); 


gestor1.agregarTarea("Estudiar para juanca");
gestor1.agregarTarea("proponer algo para no ir a ingles");
gestor1.agregarTarea("pitipausa");


console.log("\nLista de tareas");
gestor1.obtenerTareas().forEach((t) => console.log(t.toString()));



const primeraTarea = gestor1.obtenerTareas()[0];
gestor1.marcarTareaComoCompletada(primeraTarea.id);




console.log("\ndespues de completar la primera tarea");
gestor1.obtenerTareas().forEach((t) => console.log(t.toString()));


gestor1.eliminarTarea(primeraTarea.id);

console.log("\ndespues de eliminar la primera tarea");
gestor1.obtenerTareas().forEach((t) => console.log(t.toString()));
