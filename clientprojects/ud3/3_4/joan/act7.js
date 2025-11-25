/*Ejercicio 7: Sistema de gestión de tareas (CRUD básico con arrays)
Objetivo: Encadenar operaciones funcionales y uso de callbacks personalizados.

Puntuación: 5

Dado el array inicial:

 
let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];
Crea funciones reutilizables:

generarId(arr) → Devuelve el id siguiente.
agregarTarea(arr, titulo) → añade una nueva tarea con id autogenerada.
completarTarea(arr, id) → marca como completada la tarea con ese id.
eliminarTarea(arr, id) → elimina la tarea correspondiente.
obtenerPendientes(arr) → devuelve las tareas !completada.
contarCompletadas(arr) → usando reduce().
Todo debe ser inmutable (sin modificar el array original). Intenta hacer todas las funciones con un return de una sola línea y nada más.

Puntuación: 2,5.
*/

let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

const generarId = arr =>
  Math.max(...arr.map(t => t.id)) + 1;



const agregarTarea = (arr, titulo) => [
  ...arr,
  { id: generarId(arr), titulo, completada: false }
];

const completarTarea = (arr, id) =>
  arr.map(t =>
    t.id === id ? { ...t, completada: true } : t
  );


const eliminarTarea = (arr, id) =>
  arr.filter(t => t.id !== id);



const obtenerPendientes = arr =>
  arr.filter(t => !t.completada);










//

function contarCompletadas(arr) {
  return arr.reduce((acc, t) => acc + (t.completada ? 1 : 0), 0);
}


const contarCompletadas = arr =>
  arr.reduce((total, t) => total + (t.completada ? 1 : 0), 0);