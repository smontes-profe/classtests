'use strict';

const array = [4.7, 2.3, 9.8, 6.5];

// Redondeo de número hacia arriba

let arrayUp = array.map(num => Math.ceil(num));

console.log(arrayUp);

// Convierte todos los números a strings y muestra su longitud.

let arrayToString = array.map(num => num.toString());

console.log(arrayToString);
console.log(typeof arrayToString[0]);
console.log(arrayToString.length);

// Calcula el mayor y el menor valor usando funciones Math.

// Mayor

let numMaxArray = array.reduce((max, num) => num > max ? num : max);

console.log(numMaxArray);

// Menor

let numMinorArray = array.reduce((max, num) => num < max ? num : max);

console.log(numMinorArray);
