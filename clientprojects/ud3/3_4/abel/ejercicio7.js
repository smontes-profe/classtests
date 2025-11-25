/*
Objetivo: Encadenar operaciones funcionales y uso de callbacks personalizados.

Puntuación: 5

Dado el array inicial:

 
let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];
Crea funciones reutilizables:

1.generarId(arr) → Devuelve el id siguiente.
2.agregarTarea(arr, titulo) → añade una nueva tarea con id autogenerada.
3.completarTarea(arr, id) → marca como completada la tarea con ese id.
4.eliminarTarea(arr, id) → elimina la tarea correspondiente.
5.obtenerPendientes(arr) → devuelve las tareas !completada.
6.contarCompletadas(arr) → usando reduce().
Todo debe ser inmutable (sin modificar el array original). Intenta hacer todas las funciones con un return de una sola línea y nada más.
*/

let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

// 1️⃣ Generar nuevo id
const generarId = arr => Math.max(...arr.map(t => t.id)) + 1;

// 2️⃣ Agregar tarea
const agregarTarea = (arr, titulo) => [...arr, { id: generarId(arr), titulo, completada: false }];

// 3️⃣ Completar tarea
const completarTarea = (arr, id) => arr.map(t => t.id === id ? { ...t, completada: true } : t);

// 4️⃣ Eliminar tarea
const eliminarTarea = (arr, id) => arr.filter(t => t.id !== id);

// 5️⃣ Obtener tareas pendientes
const obtenerPendientes = arr => arr.filter(t => !t.completada);

// 6️⃣ Contar completadas con reduce
const contarCompletadas = arr => arr.reduce((acum, t) => acum + (t.completada ? 1 : 0), 0);
