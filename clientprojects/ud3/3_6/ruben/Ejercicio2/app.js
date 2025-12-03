// Importamos el TaskManager
const TaskManager = require('./TaskManager.js');

console.log('=== SISTEMA DE GESTIÓN DE TAREAS CON SINGLETON ===\n');


// ============================================
// PROBANDO QUE EL SINGLETON FUNCIONA
// ============================================

console.log('>> Comprobando que el Singleton funciona correctamente...\n');

// Obtenemos la instancia dos veces
const gestor1 = TaskManager.getInstance();
const gestor2 = TaskManager.getInstance();

// Verificamos que son la misma instancia
console.log('¿gestor1 === gestor2?', gestor1 === gestor2);
console.log('👉 Esto debe ser true, porque el Singleton garantiza una única instancia\n');


// ============================================
// AÑADIENDO TAREAS AL SISTEMA
// ============================================

console.log('>> Añadiendo varias tareas al gestor...\n');

const gestor = TaskManager.getInstance();

gestor.agregarTarea('Comprar el pan');
gestor.agregarTarea('Estudiar JavaScript');
gestor.agregarTarea('Hacer ejercicio');
gestor.agregarTarea('Llamar al médico');

console.log('✓ Se han añadido 4 tareas\n');


// ============================================
// LISTANDO TODAS LAS TAREAS
// ============================================

console.log('>> Lista de todas las tareas actuales:\n');

const todasLasTareas = gestor.obtenerTareas();

todasLasTareas.forEach((tarea, index) => {
  console.log(`  ${index + 1}. ${tarea.toString()} (ID: ${tarea.id})`);
});

console.log('\n');


// ============================================
// COMPLETANDO ALGUNAS TAREAS
// ============================================

console.log('>> Marcando algunas tareas como completadas...\n');

// Completamos la primera y la tercera tarea
const idPrimera = todasLasTareas[0].id;
const idTercera = todasLasTareas[2].id;

gestor.marcarTareaComoCompletada(idPrimera);
console.log('✓ Tarea "Comprar el pan" marcada como completada');

gestor.marcarTareaComoCompletada(idTercera);
console.log('✓ Tarea "Hacer ejercicio" marcada como completada\n');


// ============================================
// LISTANDO TAREAS ACTUALIZADAS
// ============================================

console.log('>> Estado actualizado de las tareas:\n');

gestor.obtenerTareas().forEach((tarea, index) => {
  console.log(`  ${index + 1}. ${tarea.toString()}`);
});

console.log('\n');


// ============================================
// ELIMINANDO UNA TAREA
// ============================================

console.log('>> Eliminando una tarea del sistema...\n');

const idSegunda = todasLasTareas[1].id;
const seElimino = gestor.eliminarTarea(idSegunda);

if (seElimino) {
  console.log('✓ Tarea "Estudiar JavaScript" eliminada correctamente\n');
} else {
  console.log('✗ No se pudo eliminar la tarea\n');
}


// ============================================
// LISTA FINAL
// ============================================

console.log('>> Estado FINAL del sistema:\n');

const tareasFinal = gestor.obtenerTareas();

console.log(`Total de tareas: ${tareasFinal.length}\n`);

tareasFinal.forEach((tarea, index) => {
  console.log(`  ${index + 1}. ${tarea.toString()} (ID: ${tarea.id})`);
});

console.log('\n');


// ============================================
// VERIFICACIÓN FINAL DEL SINGLETON
// ============================================

console.log('>> Verificación final: accediendo desde otra "parte" del código...\n');

// Simulamos que esto es otro módulo o parte del código
const otroGestor = TaskManager.getInstance();

console.log('Tareas vistas desde "otroGestor":');
otroGestor.obtenerTareas().forEach((tarea, index) => {
  console.log(`  ${index + 1}. ${tarea.toString()}`);
});

console.log('\n👉 Las tareas son las mismas porque es la misma instancia (Singleton)');