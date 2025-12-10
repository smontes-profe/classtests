'use strict';

const word = "JavaScript";

// Convierte todas las letras en mayúsculas

let wordUpper = word.toUpperCase();

console.log(wordUpper);


// Obtén los 4 primeros caracteres usando un método de string.

let fourCharWord = word.slice(0, 4);

console.log(fourCharWord);

// Verifica si contiene la letra "S" (mayúscula).

let checkUpperChar = word.includes("J");

console.log(checkUpperChar);