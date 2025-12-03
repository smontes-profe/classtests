//Funcion que me devuelve el saludo
function saludar(nombre) {
  return "Hola, " + nombre + "!";
}

//Funcion para ver si es par o impar
function esPar(numero) {
  return numero % 2 === 0;
}

//Funcion que me devuelve un array de numeros y la funcion callback
function operacionArray(arr, callback) {
  let nuevo = [];
  for (let n of arr) {
    nuevo.push(callback(n));
  }
  return nuevo;
}

//Ejemplo de callback que sale en el ejercicio
function multiplicarPor2(n) {
  return n * 2;
}

//Funcion flecha que me devuelve el promedio de un array
let promedio = arr => arr.reduce((a, b) => a + b, 0) / arr.length;

//Muestro por consola
console.log(saludar("Sergio"));
console.log("4 es par?", esPar(4));
console.log(operacionArray([1,2,3], multiplicarPor2));
console.log("Promedio:", promedio([5, 10, 15]));