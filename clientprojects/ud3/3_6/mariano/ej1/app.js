import Tarea from './Tarea.js';

// Crear instancias de Tarea
const tarea1 = new Tarea('Comprar el pan');
const tarea2 = new Tarea('Llamar al dentista');

// Mostrar el estado inicial
console.log('--- Estado inicial ---');
console.log(tarea1.toString()); 
console.log(tarea2.toString()); 

// Completar una tarea
tarea1.completar();

// Mostrar estado actualizado
console.log('\n--- Después de completar tarea1 ---');
console.log(tarea1.toString()); 
console.log(tarea2.toString()); 

// Mostrar objetos completos (opcional)
console.log('\n--- Detalles internos ---');
console.log(tarea1);
console.log(tarea2);
