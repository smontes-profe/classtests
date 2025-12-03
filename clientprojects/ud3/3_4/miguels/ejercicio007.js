"use strict";

let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false },
];

// generarId(arr) → Devuelve el id siguiente.
function generarId(arr) {
  let maxID = arr.length > 0 ? Math.max(...arr.map(t => t.id)) : 0;
  return maxID + 1;
}

console.log(`Generar tareas: ${generarId(tareas)}`);

// agregarTarea(arr, titulo) → añade una nueva tarea con id autogenerada.
function agregarTarea(arr, titulo) {
  const nuevaTarea = {
    id: generarId(arr),
    titulo: titulo,
    completada: false,
  };

  return [...arr, nuevaTarea];
}

console.log(agregarTarea(tareas, "Salirm de casa"));

// completarTarea(arr, id) → marca como completada la tarea con ese id.
function completarTarea(arr, id) {
  return arr.map((tarea) =>
    tarea.id == id ? { ...tarea, completada: true } : tarea
  );
}

console.log(completarTarea(tareas, 1));

// eliminarTarea(arr, id) → elimina la tarea correspondiente.
function eliminarTarea(arr, id) {
  return arr.filter((tarea) => tarea.id !== id);
}



// obtenerPendientes(arr) → devuelve las tareas !completada.
function obtenerPendientes(arr) {
  return arr.filter((tarea) => !tarea.completada);
}

// contarCompletadas(arr) → usando reduce().
function contarCompletadas(arr) {
  return arr.reduce(
    (complet, tarea) => complet + (tarea.completada ? 1 : 0),
    0
  );
}
