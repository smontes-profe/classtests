// Ejercicio 2: Funciones definidas por el usuario
// Objetivo: Crear y usar funciones con parámetros, return y callback.

// Crea una función saludar(nombre) que reciba un nombre y devuelva "Hola, [nombre]!".
// Crea una función esPar(numero) que devuelva true si el número es par, false si es impar.
// Crea una función operacionArray(arr, callback) que reciba un array de números y una función callback, y aplique la callback a cada elemento del array (usa for…of o forEach).
// Ejemplo de callback: multiplicar por 2, sumar 5, etc.
// Crea una función flecha promedio = arr => … que devuelva el promedio de un array de números utilizando reduce.

let nombre = "Maria";
console.log(saludar(nombre));
let numero = 15;
console.log(esPar(numero));
//! Crea una función saludar(nombre) que reciba un nombre y devuelva "Hola, [nombre]!".
function saludar(nombre) {
  return `Hola, ${nombre}`;
}

//! Crea una función esPar(numero) que devuelva true si el número es par, false si es impar.
function esPar(numero) {
  return numero % 2 === 0 ? true : false;
}

// Mas corta
// function esPar(numero) {
//   return numero % 2 === 0;
// }

//! Crea una función operacionArray(arr, callback) que reciba un array de números y una función callback,
//! y aplique la callback a cada elemento del array (usa for…of o forEach).
function operacionArray(arr, callback) {
  let nuevoArray = [];
  arr.forEach((elemento) => {
    let resultado = callback(elemento);
    nuevoArray.push(resultado);
  });
  return nuevoArray;
}

function multiplicarPorDos(num) {
  return num * 2;
}

let arrNumList = [2, 3, 4, 5];
console.log(operacionArray(arrNumList, multiplicarPorDos));

//! Crea una función flecha promedio = arr => … que devuelva el promedio de un array de números utilizando reduce.
// let arrNumList = [2, 3, 4, 5]; //* Suma 14, Longitud = 4
let promedio = (arr) => {
  let suma = arr.reduce((acc, val) => acc+ val, 0);
  return suma/arr.length;
};

console.log(promedio (arrNumList));

