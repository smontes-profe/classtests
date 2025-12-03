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



MODIFICADORES A LA NOTA: +-2 puntos
Código limpio, ordenado y bien documentado
Código "original" o no (pasaré varios filtros para comprobar que porcentaje me dicen que proviene de IA).
Cuaderno del profesor.*/

let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];  

function generarId(arr) {
    return arr.length > 0 ? Math.max(...arr.map(t => t.id)) + 1 : 1;
}

function agregarTarea(arr, titulo) {
    const nuevoId = generarId(arr);
    return [...arr, { id: nuevoId, titulo: titulo, completada: false }];
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
    return arr.reduce((acum, t) => acum + (t.completada ? 1 : 0), 0);
}

// Ejemplos de uso:
let nuevasTareas = agregarTarea(tareas, "Leer un libro");
console.log("Después de agregar una tarea:", nuevasTareas);

nuevasTareas = completarTarea(nuevasTareas, 1);
console.log("Después de completar la tarea con id 1:", nuevasTareas);

nuevasTareas = eliminarTarea(nuevasTareas, 2);
console.log("Después de eliminar la tarea con id 2:", nuevasTareas);

let pendientes = obtenerPendientes(nuevasTareas);
console.log("Tareas pendientes:", pendientes);

let totalCompletadas = contarCompletadas(nuevasTareas);
console.log("Número de tareas completadas:", totalCompletadas);
