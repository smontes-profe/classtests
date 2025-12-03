// Archivo JavaScript 7
let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

// 1. generarId(arr)
const generarId = (arr) => arr.reduce((maxId, tarea) => Math.max(tarea.id, maxId), 0) + 1;

// 2. agregarTarea(arr, titulo)
const agregarTarea = (arr, titulo) => [
    ...arr, 
    { id: generarId(arr), titulo: titulo, completada: false }
];

// 3. completarTarea(arr, id)
const completarTarea = (arr, id) => arr.map(
    tarea => tarea.id === id ? { ...tarea, completada: true } : tarea
);

// 4. eliminarTarea(arr, id)
const eliminarTarea = (arr, id) => arr.filter(tarea => tarea.id !== id);

// 5. obtenerPendientes(arr)
const obtenerPendientes = (arr) => arr.filter(tarea => !tarea.completada);

// 6. contarCompletadas(arr)
const contarCompletadas = (arr) => arr.reduce((acc, tarea) => tarea.completada ? acc + 1 : acc, 0);

console.log("--- ESTADO INICIAL ---");
console.table(tareas);

console.log("\n--- OPERACIONES ---");

// Añadir tarea (inmutable)
const tareasConNueva = agregarTarea(tareas, "Pasear al perro");
console.log("Añadida 'Pasear al perro':");
console.table(tareasConNueva);

// Completar tarea (inmutable)
const tareasCompletadas = completarTarea(tareasConNueva, 3);
console.log("Completada Tarea ID 3:");
console.table(tareasCompletadas);

// Eliminar tarea (inmutable)
const tareasEliminadas = eliminarTarea(tareasCompletadas, 2);
console.log("Eliminada Tarea ID 2:");
console.table(tareasEliminadas);

// Obtener pendientes
const pendientes = obtenerPendientes(tareasEliminadas);
console.log("Tareas Pendientes (sobre el último estado):");
console.table(pendientes);

// Contar completadas
const numCompletadas = contarCompletadas(tareasEliminadas);
console.log(`Número de Tareas Completadas (sobre el último estado): ${numCompletadas}`);

console.log("\n--- VERIFICACIÓN DE INMUTABILIDAD ---");
console.log("El array original 'tareas' sigue intacto:");
console.table(tareas);