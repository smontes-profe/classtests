console.log("---  Ejercicio 2: Funciones definidas por el usuario ---");

// 1. Función saludar
const saludar = (nombre) => `Hola, ${nombre}!`;
console.log("Saludar:", saludar("Ana")); // "Hola, Ana!"

// 2. Función esPar
const esPar = (numero) => numero % 2 === 0;
console.log("esPar(4):", esPar(4)); // true
console.log("esPar(7):", esPar(7)); // false

// 3. Función operacionArray (usando forEach)
const operacionArray = (arr, callback) => {
  const resultado = [];
  arr.forEach(elemento => {
    resultado.push(callback(elemento));
  });
  return resultado;
  
};

const miArray = [1, 2, 3];
const duplicar = x => x * 2;
console.log("operacionArray (duplicar):", operacionArray(miArray, duplicar)); // [2, 4, 6]

// 4. Función flecha promedio con reduce
const promedio = arr => arr.reduce((acc, val) => acc + val, 0) / arr.length;
console.log("Promedio:", promedio([10, 20, 30])); // 20