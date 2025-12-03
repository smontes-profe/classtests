// Ejercicio 1: Funciones predefinidas y manipulación básica
// Objetivo: Practicar funciones predefinidas de JavaScript.

// Dado el array de números [4.7, 2.3, 9.8, 6.5]:
let numeros = [4.7, 2.3, 9.8, 6.5];

// a) Redondea todos los números hacia arriba usando una función predefinida.
let redondeados = numeros.map(num => Math.ceil(num));
console.log("a) Redondeados hacia arriba:", redondeados);

// b) Convierte todos los números a strings y muestra su longitud.
let longitudes = numeros.map(num => num.toString().length);
console.log("b) Longitudes de cada número:", longitudes);

// c) Calcula el mayor y el menor valor usando funciones Math.
let mayor = Math.max(...numeros);
let menor = Math.min(...numeros);
console.log(`c) Mayor: ${mayor}, Menor: ${menor}`);

// Dado el string "JavaScript":
let texto = "JavaScript";

// a) Convierte todas las letras a mayúsculas.
console.log("a) Mayúsculas:", texto.toUpperCase());

// b) Obtén los 4 primeros caracteres usando un método de string.
console.log("b) Primeros 4 caracteres:", texto.substring(0, 4));

// c) Verifica si contiene la letra "S" (mayúscula).
console.log("c) Contiene 'S':", texto.includes("S"));
