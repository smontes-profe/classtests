// actividad9.js
import {CajaFuerte} from './cajafuerte.js';

console.log('=== ACTIVIDAD 9: CajaFuerte ===\n');

// 1. Crear un objeto miCaja con propietario "Ana" y código inicial 1234
const miCaja = new CajaFuerte('Ana', 1234);
console.log('1. Caja fuerte creada:');
console.log(`   Propietario: ${miCaja.propietario}`);

// 2. Llamar a verCodigo()
console.log('\n2. Ver código actual:');
console.log(`   Código: ${miCaja.verCodigo()}`);

// 3. Cambiar el código a 5678
console.log('\n3. Cambiar código a 5678:');
miCaja.cambiarCodigo(5678);
console.log(`   Nuevo código: ${miCaja.verCodigo()}`);

// 4. Intentar cambiar el código con un valor inválido
console.log('\n4. Intentar cambiar código a 123 (3 dígitos):');
miCaja.cambiarCodigo(123);

console.log('\n5. Intentar cambiar código a 12345 (5 dígitos):');
miCaja.cambiarCodigo(12345);

// 6. Intentar acceder directamente a #codigo desde fuera de la clase
console.log('\n6. Intentar acceder directamente a #codigo:');
try {
  console.log(`   miCaja.#codigo = ${miCaja.#codigo}`);
} catch (error) {
  console.log(`Error: ${error.message}`);
  console.log('La propiedad privada #codigo NO es accesible desde fuera de la clase');
}

// Alternativa para demostrar que la propiedad no existe en el objeto
console.log('\n7. Verificar propiedades del objeto:');
console.log('Propiedades públicas:', Object.keys(miCaja));
console.log('¿Existe miCaja.codigo?', miCaja.codigo);
console.log('El campo privado #codigo está completamente encapsulado');

console.log('\n=== FIN DE LA ACTIVIDAD ===');