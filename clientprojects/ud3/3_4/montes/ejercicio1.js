const array = [4.7, 2.3, 9.8, 6.5];
//! Redondea todos los números hacia arriba usando una función predefinida.
let arrayRedondeado = array.map((numero) => Math.ceil(numero)); //? Siendo numero el elemento que recorre
console.log(arrayRedondeado);

//! Convierte todos los números a strings y muestra su longitud.
let arrayString = array.map((elemento) => elemento.toString());
console.log(arrayString);

//! Calcula el mayor y el menor valor usando funciones Math.
let Max = Math.max(...array); // Spread Operator, desempaqueta el array
console.log(Max); // Pero lo utilizamos por el metodo Math.max esperan (4.7, 2.3, ...)
let Min = Math.min(...array);
console.log(Min);

const palabra = "JavaScript";
//!  Convierte todas las letras a mayúsculas.
let mayuscula = palabra.toLocaleUpperCase();
console.log(mayuscula);

//! Obtén los 4 primeros caracteres usando un método de string.
let partePalabra = palabra.substring(0, 4); // Recordar que el metodo subString el fin no esta incluido empieza en el 0 pero no incluye el 4
console.log(partePalabra);

//! Verifica si contiene la letra "S" (mayúscula).
let encontrarLetraS = palabra.includes("S");
console.log(encontrarLetraS);
