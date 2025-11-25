console.log("---  Ejercicio 1: Funciones predefinidas ---");

// --- Array de números ---
const numeros = [4.7, 2.3, 9.8, 6.5];

// a) Redondea todos los números hacia arriba
const redondeadosHaciaArriba = numeros.map(Math.ceil);
console.log("a) Redondeados hacia arriba:", redondeadosHaciaArriba); // [5, 3, 10, 7]

// b) Convierte a strings y muestra longitud
const longitudes = numeros.map(num => num.toString().length);
console.log("b) Longitudes de strings:", longitudes); // [3, 3, 3, 3]

// c) Calcula el mayor y el menor valor
const maxValor = Math.max(...numeros);
const minValor = Math.min(...numeros);
console.log("c) Mayor:", maxValor, "| Menor:", minValor); // 9.8 | 2.3


const str = "JavaScript";

// a) Convierte a mayúsculas
console.log("a) Mayúsculas:", str.toUpperCase()); // "JAVASCRIPT"

// b) Obtén los 4 primeros caracteres
console.log("b) 4 primeros caracteres:", str.slice(0, 4)); // "Java"

// c) Verifica si contiene la letra "S" (mayúscula)
console.log("c) Contiene 'S':", str.includes("S")); // true