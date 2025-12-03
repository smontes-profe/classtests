function saludar(nombre) {
  return `Hola, ${nombre}!`;
}

function esPar(numero) {
  return numero % 2 === 0;
}

function operacionArray(arr, callback) {
  let nuevo = [];
  for (let n of arr) {
    nuevo.push(callback(n));
  }
  return nuevo;
}

let resultado = operacionArray([1, 2, 3], n => n * 2);
console.log(resultado);

const promedio = arr => arr.reduce((a, b) => a + b, 0) / arr.length;
console.log(promedio([2, 4, 6]));