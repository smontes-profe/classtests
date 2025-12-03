console.log("---  Ejercicio 7: Sistema de gestión de tareas (CRUD) ---");

let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

// 1. generarId(arr)
const generarId = arr => arr.reduce((max, t) => (t.id > max ? t.id : max), 0) + 1;
console.log("Siguiente ID:", generarId(tareas)); // 4

// 2. agregarTarea(arr, titulo)
const agregarTarea = (arr, titulo) => [...arr, { id: generarId(arr), titulo, completada: false }];
const tareasNuevas = agregarTarea(tareas, "Leer un libro");
console.log("Tarea agregada:", tareasNuevas);

// 3. completarTarea(arr, id)
const completarTarea = (arr, id) => arr.map(t => (t.id === id ? { ...t, completada: true } : t));
const tareasCompletadas = completarTarea(tareasNuevas, 1);
console.log("Tarea 1 completada:", tareasCompletadas);

// 4. eliminarTarea(arr, id)
const eliminarTarea = (arr, id) => arr.filter(t => t.id !== id);
const tareasEliminadas = eliminarTarea(tareasCompletadas, 2); // Elimina "Comprar pan"
console.log("Tarea 2 eliminada:", tareasEliminadas);

// 5. obtenerPendientes(arr)
const obtenerPendientes = arr => arr.filter(t => !t.completada);
console.log("Tareas pendientes:", obtenerPendientes(tareasEliminadas));

// 6. contarCompletadas(arr)
const contarCompletadas = arr => arr.reduce((acc, t) => (t.completada ? acc + 1 : acc), 0);
console.log("Total completadas:", contarCompletadas(tareasEliminadas)); // 1

// Verificación de inmutabilidad
console.log("Array 'tareas' original (inmutable):", tareas);