// Ejercicio 7: Sistema de gestión de tareas (CRUD básico con arrays)
// Objetivo: Encadenar operaciones funcionales y uso de callbacks personalizados.

// Puntuación: 5

// Dado el array inicial:

let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false },
];
// Crea funciones reutilizables:

// generarId(arr) → Devuelve el id siguiente.
// agregarTarea(arr, titulo) → añade una nueva tarea con id autogenerada.
// completarTarea(arr, id) → marca como completada la tarea con ese id.
// eliminarTarea(arr, id) → elimina la tarea correspondiente.
// obtenerPendientes(arr) → devuelve las tareas !completada.
// contarCompletadas(arr) → usando reduce().
// Todo debe ser inmutable (sin modificar el array original). Intenta hacer todas las funciones con un return de una sola línea y nada más.

function generarId(arr) {
  return (
    1 +
    arr.reduce((acumulado, nextTarea) => Math.max(acumulado, nextTarea.id), 0)
  );
}
function agregarTarea(arr, titulo) {
  return [...arr, { id: generarId(arr), titulo: titulo, completada: false }];
}

function completarTarea(arr, id) {
  return [...arr].map((elemento) =>
    elemento.id === id ? { ...elemento, completada: true } : elemento
  ); //? Dios me a costado recorrar difrenciar arr/elemento el cojunto/el elemento
}

function eliminarTarea(arr, id) {
  return [...arr].filter((elemento) => elemento.id !== id); //? filter tiene un push dentro PORTERO DE DISCOTECA
}

function obtenerPendientes(arr) {
  return [...arr].filter((elemento) => !elemento.completada);
}

function contarCompletadas(arr) {
  return [...arr].reduce(
    (acumulado, valorActual) =>
      valorActual.completada ? acumulado + 1 : acumulado,
    0
  ); //! acumulado++ no sirve ?
}
console.log(generarId(tareas));
console.log(agregarTarea(tareas, "Nueva tarea"));
console.log(completarTarea(tareas, 3));
console.log(eliminarTarea(tareas, 2));
console.log(obtenerPendientes(tareas));
console.log(contarCompletadas(tareas));
