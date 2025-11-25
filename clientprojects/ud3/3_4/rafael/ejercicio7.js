console.log("EJERCICIO 7: Sistema de gestión de tareas\n");

// Array inicial de tareas
let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

console.log("Array original:", tareas);


// Funciones (todas en una línea con return)
const generarId = arr => arr.length > 0 ? Math.max(...arr.map(t => t.id)) + 1 : 1;

const agregarTarea = (arr, titulo) => [...arr, { id: generarId(arr), titulo: titulo, completada: false }];

const completarTarea = (arr, id) => arr.map(t => t.id === id ? { ...t, completada: true } : t);

const eliminarTarea = (arr, id) => arr.filter(t => t.id !== id);

const obtenerPendientes = arr => arr.filter(t => !t.completada);

const contarCompletadas = arr => arr.reduce((contador, t) => t.completada ? contador + 1 : contador, 0);


// PRUEBAS
console.log("\nPRUEBAS\n");

// Prueba 1: ID siguiente
console.log("1. Generar siguiente ID:");
let siguienteId = generarId(tareas);
console.log("Siguiente ID disponible:", siguienteId);

// Prueba 2: Agregar nueva tarea
console.log("\n2. Agregar tarea 'Llamar al médico':");
tareas = agregarTarea(tareas, "Llamar al médico");
console.log(tareas);

// Prueba 3: Completar una tarea
console.log("\n3. Completar tarea con ID 1:");
tareas = completarTarea(tareas, 1);
console.log(tareas);

// Prueba 4: Eliminar una tarea
console.log("\n4. Eliminar tarea con ID 2:");
tareas = eliminarTarea(tareas, 2);
console.log(tareas);

// Prueba 5: Obtener tareas pendientes
console.log("\n5. Obtener tareas pendientes:");
let pendientes = obtenerPendientes(tareas);
console.log(pendientes);

// Prueba 6: Contar completadas
console.log("\n6. Contar tareas completadas:");
let numCompletadas = contarCompletadas(tareas);
console.log("Número de tareas completadas:", numCompletadas);

console.log("\nFIN EJERCICIO 7");