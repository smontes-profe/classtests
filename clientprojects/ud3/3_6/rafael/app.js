// Obtener la instancia única del TaskManager (patrón Singleton)
const taskManager = TaskManager.getInstance();
const factory = new ElementoUIFactory();

// EJERCICIO 3: FUNCIONES OBSERVADORAS

/**
 * Función observadora que muestra todas las tareas en la consola.
 * Se ejecuta automáticamente cuando hay cambios en las tareas.
 */
function actualizarListaConsola() {
  console.log('\nLISTA DE TAREAS:');
  console.log('');
  const tareas = taskManager.obtenerTareas();
  
  if (tareas.length === 0) {
    console.log('No hay tareas.');
  } else {
    tareas.forEach((tarea, index) => {
      console.log(`${index + 1}. ${tarea.toString()}`);
    });
  }
  console.log('\n\n');
}

/**
 * Función observadora que muestra el contador de tareas.
 * Se ejecuta automáticamente cuando hay cambios en las tareas.
 */
function mostrarContador() {
  const total = taskManager.obtenerTareas().length;
  const completadas = taskManager.obtenerTareas().filter(t => t.completada).length;
  console.log(`📊 Total de tareas: ${total} | Completadas: ${completadas} | Pendientes: ${total - completadas}`);
}

/**
 * Función observadora que actualiza la lista visual en el DOM.
 * Utiliza la fábrica para crear elementos UI.
 */
function actualizarListaDOM() {
  const listaSimple = document.getElementById('lista-simple');
  const listaDetallada = document.getElementById('lista-detallada');
  
  if (!listaSimple || !listaDetallada) return;
  
  // Limpiar listas
  listaSimple.innerHTML = '';
  listaDetallada.innerHTML = '';
  
  const tareas = taskManager.obtenerTareas();
  
  // Crear elementos simples
  tareas.forEach(tarea => {
    const elementoSimple = factory.crearElementoTarea(tarea, 'simple');
    listaSimple.appendChild(elementoSimple);
  });
  
  // Crear elementos detallados
  tareas.forEach(tarea => {
    const elementoDetallado = factory.crearElementoTarea(tarea, 'detallado');
    
    // Añadir eventos a los elementos detallados
    const checkbox = elementoDetallado.querySelector('.tarea-checkbox');
    const btnEliminar = elementoDetallado.querySelector('.btn-eliminar');
    
    checkbox.addEventListener('change', () => {
      taskManager.marcarTareaComoCompletada(tarea.id);
    });
    
    btnEliminar.addEventListener('click', () => {
      taskManager.eliminarTarea(tarea.id);
    });
    
    listaDetallada.appendChild(elementoDetallado);
  });
}

//SUSCRIBIR OBSERVADORES
taskManager.suscribir(actualizarListaConsola);
taskManager.suscribir(mostrarContador);
taskManager.suscribir(actualizarListaDOM);

//DEMOSTRACIÓN DE USO

console.log(' Iniciando aplicación de gestión de tareas...\n');

// Verificar que el Singleton funciona
const otraInstancia = TaskManager.getInstance();
console.log('Singleton verificado:', taskManager === otraInstancia);

// Añadir tareas de demostración
console.log('\nñadiendo tareas de demostración...');
taskManager.agregarTarea('Comprar el pan');
taskManager.agregarTarea('Estudiar JavaScript');
taskManager.agregarTarea('Hacer ejercicio');

// Guardar ID de la primera tarea para usarlo después
const primeraTarea = taskManager.obtenerTareas()[0];

// Esperar un momento y completar una tarea
setTimeout(() => {
  console.log('\nCompletando una tarea...');
  taskManager.marcarTareaComoCompletada(primeraTarea.id);
}, 1000);

// Esperar un momento y eliminar una tarea
setTimeout(() => {
  console.log('\nEliminando una tarea...');
  const tareas = taskManager.obtenerTareas();
  if (tareas.length > 0) {
    taskManager.eliminarTarea(tareas[tareas.length - 1].id);
  }
}, 2000);

//CONFIGURACIÓN DE EVENTOS DEL DOM

document.addEventListener('DOMContentLoaded', () => {
  const formulario = document.getElementById('form-tarea');
  const input = document.getElementById('input-tarea');
  
  if (formulario && input) {
    formulario.addEventListener('submit', (e) => {
      e.preventDefault();
      const texto = input.value.trim();
      
      if (texto) {
        taskManager.agregarTarea(texto);
        input.value = '';
        input.focus();
      }
    });
  }
  
  // Disparar actualización inicial del DOM
  actualizarListaDOM();
});