const TaskManager = require('./TaskManager.js');

console.log('=== SISTEMA DE TAREAS CON PATRÓN OBSERVER ===\n');


// ============================================
// CREANDO LOS OBSERVADORES (FUNCIONES QUE SE EJECUTARÁN AUTOMÁTICAMENTE)
// ============================================

/**
 * Este observador muestra todas las tareas por consola
 * Se ejecutará automáticamente cada vez que haya cambios
 */
function actualizarListaConsola() {
  console.log('\n📋 LISTA DE TAREAS ACTUALIZADA:');
  
  const gestor = TaskManager.getInstance();
  const tareas = gestor.obtenerTareas();
  
  if (tareas.length === 0) {
    console.log('   (No hay tareas)\n');
  } else {
    tareas.forEach((tarea, index) => {
      console.log(`   ${index + 1}. ${tarea.toString()}`);
    });
    console.log('');
  }
}


/**
 * Este observador muestra el contador de tareas
 * También se ejecuta automáticamente cuando algo cambia
 */
function mostrarContador() {
  const gestor = TaskManager.getInstance();
  const total = gestor.obtenerTareas().length;
  
  console.log(`📊 Total de tareas en el sistema: ${total}`);
}


// ============================================
// SUSCRIBIENDO LOS OBSERVADORES
// ============================================

console.log('>> Suscribiendo observadores al TaskManager...\n');

const gestor = TaskManager.getInstance();

// "Nos suscribimos" al gestor con nuestras funciones
gestor.suscribir(actualizarListaConsola);
gestor.suscribir(mostrarContador);

console.log('✓ Observadores suscritos correctamente');
console.log('✓ Ahora cada cambio ejecutará automáticamente estas funciones\n');


// ============================================
// AÑADIENDO TAREAS (LOS OBSERVADORES SE EJECUTAN SOLOS)
// ============================================

console.log('>> Añadiendo primera tarea...');
gestor.agregarTarea('Comprar el pan');
// Aquí automáticamente se ejecutan actualizarListaConsola() y mostrarContador()

console.log('\n' + '─'.repeat(60) + '\n');


console.log('>> Añadiendo segunda tarea...');
gestor.agregarTarea('Estudiar JavaScript');

console.log('\n' + '─'.repeat(60) + '\n');


console.log('>> Añadiendo tercera tarea...');
gestor.agregarTarea('Hacer ejercicio');

console.log('\n' + '─'.repeat(60) + '\n');


// ============================================
// COMPLETANDO UNA TAREA
// ============================================

console.log('>> Marcando la primera tarea como completada...');

const tareas = gestor.obtenerTareas();
const idPrimera = tareas[0].id;

gestor.marcarTareaComoCompletada(idPrimera);
// De nuevo, los observadores se ejecutan automáticamente

console.log('\n' + '─'.repeat(60) + '\n');


// ============================================
// AÑADIENDO MÁS TAREAS
// ============================================

console.log('>> Añadiendo dos tareas más...');
gestor.agregarTarea('Llamar al dentista');

console.log('\n' + '─'.repeat(60) + '\n');

gestor.agregarTarea('Leer 30 páginas');

console.log('\n' + '─'.repeat(60) + '\n');


// ============================================
// ELIMINANDO UNA TAREA
// ============================================

console.log('>> Eliminando una tarea del sistema...');

const idSegunda = tareas[1].id;
gestor.eliminarTarea(idSegunda);

console.log('\n' + '─'.repeat(60) + '\n');


// ============================================
// COMPLETANDO OTRA TAREA
// ============================================

console.log('>> Marcando otra tarea como completada...');

const tareasActuales = gestor.obtenerTareas();
const idTercera = tareasActuales[2].id;

gestor.marcarTareaComoCompletada(idTercera);

console.log('\n' + '─'.repeat(60) + '\n');


// ============================================
// RESUMEN FINAL
// ============================================

console.log('\n🎉 ¡IMPORTANTE! Fíjate que en ningún momento llamamos directamente');
console.log('   a actualizarListaConsola() o mostrarContador()');
console.log('   Se ejecutaron AUTOMÁTICAMENTE cada vez que cambió algo.');
console.log('   Esto es el patrón Observer en acción.\n');