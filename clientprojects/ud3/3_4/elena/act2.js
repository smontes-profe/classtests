
// 1. Funcion saludar que reciba nombre
function saludar(nombre) {
  return "Hola, ${nombre}!";
}

console.log(saludar("Sergio"));


// 2. Funcion con true/false
function esPar(numero) {
  return numero % 2 === 0;
}

console.log("¿10 es par?:", esPar(10));


// 3. Funcion con array y callback
function operacionArray(arr, callback) {
  return arr.map(callback);
}

let resultado = operacionArray([1, 2, 3], n => n * 2);
console.log("Array multiplicado por 2:", resultado);


// 4. Funcion flecha con array
const promedio = arr => arr.reduce((a, b) => a + b, 0) / arr.length;

console.log("Promedio:", promedio([5, 10, 15]));


