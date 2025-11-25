
// Array
let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

// 1. id
const generarId = arr => Math.max(...arr.map(t => t.id)) + 1;

// 2. añadir tarea
const agregarTarea = (arr, titulo) => [...arr, { id: generarId(arr), titulo, completada: false }];

// 3. marcar completada
const completarTarea = (arr, id) =>
arr.map(t => (t.id === id ? { ...t, completada: true } : t));

// 4. eliminar la tarea
const eliminarTarea = (arr, id) => arr.filter(t => t.id !== id);

// 5. tareas !completada
const obtenerPendientes = arr => arr.filter(t => !t.completada);

// 6. con reduce
const contarCompletadas = arr => arr.reduce((acc, t) => acc + (t.completada ? 1 : 0), 0);

console.log({ nuevas, completadas, pendientes, totalComp });


