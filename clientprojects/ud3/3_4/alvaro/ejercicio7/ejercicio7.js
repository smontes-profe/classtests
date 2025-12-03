// Ejercicio 7: Sistema de gestión de tareas (CRUD básico con arrays)
// Objetivo: Encadenar operaciones funcionales y uso de callbacks personalizados

// Dado el array inicial:
let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

// Crea funciones reutilizables:

// a) generarId(arr) → Devuelve el id siguiente
const generarId = arr => Math.max(...arr.map(t => t.id)) + 1;

// b) agregarTarea(arr, titulo) → añade una nueva tarea con id autogenerada
const agregarTarea = (arr, titulo) => [...arr, { id: generarId(arr), titulo, completada: false }];

// c) completarTarea(arr, id) → marca como completada la tarea con ese id
const completarTarea = (arr, id) => arr.map(t => t.id === id ? { ...t, completada: true } : t);

// d) eliminarTarea(arr, id) → elimina la tarea correspondiente
const eliminarTarea = (arr, id) => arr.filter(t => t.id !== id);

// e) obtenerPendientes(arr) → devuelve las tareas !completada
const obtenerPendientes = arr => arr.filter(t => !t.completada);

// f) contarCompletadas(arr) → usando reduce()
const contarCompletadas = arr => arr.reduce((acc, t) => acc + (t.completada ? 1 : 0), 0);

// He puesto estos ejemplos generados a partir de chatgpt para probar que las funciones funcionan bien
// y ver los resultados. Sé que no era obligatorio según el enunciado.

// Ejemplos de uso de las funciones (Esto lo hago para ver los resulados por consola y comprobar que funciona)

// Añadir una nueva tarea
let nuevas = agregarTarea(tareas, "Aprender Node.js");

// Marcar la tarea con id 3 como completada
let completadas = completarTarea(tareas, 3);

// Obtener tareas pendientes
let pendientes = obtenerPendientes(tareas);

// Contar tareas completadas
let totalCompletadas = contarCompletadas(tareas);

// Mostrar resultados en consola
console.log({ nuevas, completadas, pendientes, totalCompletadas });
