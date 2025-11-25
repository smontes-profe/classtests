"use strict"


let tareas = [
    { id: 1, titulo: "Estudiar JavaScript", completada: false },
    { id: 2, titulo: "Comprar pan", completada: true },
    { id: 3, titulo: "Hacer ejercicio", completada: false }
  ];
  
  console.log("Lista inicial de tareas:");
  console.log(tareas);
  
  // 1️ generarId(arr) → devuelve el siguiente id disponible
  const generarId = arr => arr.length ? Math.max(...arr.map(t => t.id)) + 1 : 1;
  
  // 2️ agregarTarea(arr, titulo) → añade una nueva tarea (sin modificar el original)
  const agregarTarea = (arr, titulo) => [...arr, { id: generarId(arr), titulo, completada: false }];
  
  // 3️ completarTarea(arr, id) → marca una tarea como completada
  const completarTarea = (arr, id) => arr.map(t => t.id === id ? { ...t, completada: true } : t);
  
  // 4️ eliminarTarea(arr, id) → elimina la tarea correspondiente
  const eliminarTarea = (arr, id) => arr.filter(t => t.id !== id);
  
  // 5️ obtenerPendientes(arr) → devuelve las tareas no completadas
  const obtenerPendientes = arr => arr.filter(t => !t.completada);
  
  // 6️ contarCompletadas(arr) → cuenta cuántas tareas están completadas
  const contarCompletadas = arr => arr.reduce((acc, t) => acc + (t.completada ? 1 : 0), 0);
  
  
  // Agregar una nueva tarea
  const tareasActualizadas = agregarTarea(tareas, "Leer un libro");
  console.log("\nTareas después de agregar una nueva:");
  console.log(tareasActualizadas);
  
  // Completar una tarea
  const tareasCompletadas = completarTarea(tareasActualizadas, 3);
  console.log("\nTareas después de completar la de id=3:");
  console.log(tareasCompletadas);
  
  // Eliminar una tarea
  const tareasSinPan = eliminarTarea(tareasCompletadas, 2);
  console.log("\nTareas después de eliminar la de id=2:");
  console.log(tareasSinPan);
  
  // Obtener pendientes
  const pendientes = obtenerPendientes(tareasSinPan);
  console.log("\nTareas pendientes:");
  console.log(pendientes);
  
  // Contar completadas
  const totalCompletadas = contarCompletadas(tareasSinPan);
  console.log("\nTotal de tareas completadas:", totalCompletadas);
  