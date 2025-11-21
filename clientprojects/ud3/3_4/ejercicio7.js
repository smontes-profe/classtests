let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

function generarId(arr) {
  return arr.length > 0 ? Math.max(...arr.map(tarea => tarea.id)) + 1 : 1;
}

function agregarTarea(arr, titulo) {
  return [...arr, { id: generarId(arr), titulo, completada: false }];
}

function completarTarea(arr, id) {
  return arr.map(t => t.id === id ? { ...t, completada: true } : t);
}

function eliminarTarea(arr, id) {
  return arr.filter(t => t.id !== id);
}

function obtenerPendientes(arr) {
  return arr.filter(t => !t.completada);
}

function contarCompletadas(arr) {
  return arr.reduce((acc, t) => acc + (t.completada ? 1 : 0), 0);
}


// Ejemplos de uso
let tareas2 = agregarTarea(tareas, "Leer un libro");
let tareas3 = completarTarea(tareas2, 3);
let tareas4 = eliminarTarea(tareas3, 2);

console.table(tareas2);
console.table(tareas3);
console.table(tareas4);
console.table(obtenerPendientes(tareas4));
console.log(contarCompletadas(tareas4));
