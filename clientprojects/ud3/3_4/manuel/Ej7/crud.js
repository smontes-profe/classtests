let tareas = [
  { id: 1, titulo: "Estudiar JavaScript", completada: false },
  { id: 2, titulo: "Comprar pan", completada: true },
  { id: 3, titulo: "Hacer ejercicio", completada: false }
];

const generarId = arr => Math.max(...arr.map(t => t.id)) + 1;

const agregarTarea = (arr, titulo) => [...arr, { id: generarId(arr), titulo, completada: false }];

const completarTarea = (arr, id) =>
  arr.map(t => (t.id === id ? { ...t, completada: true } : t));

const eliminarTarea = (arr, id) => arr.filter(t => t.id !== id);

const obtenerPendientes = arr => arr.filter(t => !t.completada);

const contarCompletadas = arr =>
  arr.reduce((acc, t) => acc + (t.completada ? 1 : 0), 0);

console.log(contarCompletadas(tareas));