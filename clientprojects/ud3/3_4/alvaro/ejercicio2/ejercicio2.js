// Ejercicio 2: Funciones definidas por el usuario
// Objetivo: Crear y usar funciones con parámetros, return y callback.

// a) Crea una función saludar(nombre) que reciba un nombre y devuelva "Hola, [nombre]!".
function saludar(nombre) {
    return `Hola, ${nombre}!`;
}
console.log(saludar("Álvaro"));

// b) Crea una función esPar(numero) que devuelva true si el número es par, false si es impar.
function esPar(numero) {
    return numero % 2 === 0;
}
console.log("Es par 4?", esPar(4));

// c) Crea una función operacionArray(arr, callback) que reciba un array de números y una función callback, y aplique la callback a cada elemento del array (usa for…of o forEach).
// Ejemplo de callback: multiplicar por 2, sumar 5, etc.
function operacionArray(arr, callback) {
    return arr.map(callback);
}
console.log("Multiplicar por 2:", operacionArray([1, 2, 3], n => n * 2));

// d) Crea una función flecha promedio = arr => … que devuelva el promedio de un array de números utilizando reduce.
const promedio = arr => arr.reduce((a, b) => a + b, 0) / arr.length;
console.log("Promedio:", promedio([5, 10, 15]));
