// Saludar
function saludar(nombre) {
  return `Hola, ${nombre}!`;
}

// esPar
function esPar(numero) {
  return numero % 2 === 0;
}

// operacionArray
function operacionArray(arr, callback) {
  let resultado = [];
  for (let num of arr) {
    resultado.push(callback(num));
  }
  return resultado;
}

// Promedio función flecha
const promedio = arr => arr.reduce((a, b) => a + b, 0) / arr.length;


// Ejemplo de uso
console.log(saludar("Sergio"));
console.log(esPar(4));

console.log(operacionArray([1,2,3], n => n * 2));
console.log(promedio([5, 10, 15])); // 10
