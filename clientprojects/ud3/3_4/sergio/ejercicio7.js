//Array
let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

//Devuelvo el id siguiente
const generarId = arr => Math.max(...arr.map(t => t.id)) + 1;

//añado una nueva tarea con id autogenerada
const agregarTarea = (arr, titulo) => [...arr, { id: generarId(arr), titulo, completada: false }];

//Marco como completada la tarea con ese id
const completarTarea = (arr, id) => arr.map(t => t.id === id ? { ...t, completada: true } : t);

//Elimino la tarea correspondiente
const eliminarTarea = (arr, id) => arr.filter(t => t.id !== id);

//Devuelvo las tareas !completada
const obtenerPendientes = arr => arr.filter(t => !t.completada);

//uso reduce
const contarCompletadas = arr => arr.reduce((acc, t) => acc + (t.completada ? 1 : 0), 0);

//Para comprobar
let nuevas = agregarTarea(tareas, "Leer un libro");
console.log("Agregada:", nuevas);
console.log("Completada:", completarTarea(tareas, 1));
console.log("Pendientes:", obtenerPendientes(tareas));
console.log("Completadas:", contarCompletadas(tareas));