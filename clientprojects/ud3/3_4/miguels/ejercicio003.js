"use strict";

// Crea un array frutas con cinco frutas.
const fruits = ["apple", "banana", "orange", "tomato", "kiwi"];

// Añade una fruta al inicio y otra al final.
fruits.unshift("strawberry");
fruits.push("watermelon");

console.log(fruits);

// Elimina la primera y la última fruta.
fruits.shift();
fruits.pop();

console.log(fruits);

// Crea un nuevo array frutasMayus con todas las frutas en mayúsculas usando map().
const fruitsToUpper = fruits.map((fruit) => fruit.toUpperCase());

console.log(fruitsToUpper);

// Filtra solo las frutas que contengan la letra "a" usando filter().
const fruitsOnlyCharA = fruits.filter((fruit) => fruit.includes("a"));

console.log(fruitsOnlyCharA);

// Encuentra la posición de la fruta "Manzana" usando findIndex().
const indexApple = fruits.indexOf("apple");

console.log(indexApple);

// Comprueba si alguna fruta empieza con "P" usando some() y si todas las frutas tienen más de 3 letras usando every().
const fruitCharsP3 = fruits.some(fruit => fruit.startsWith("p") && fruit.length > 3);

console.log(fruitCharsP3);

// Ordena las frutas alfabéticamente usando sort().
const fruitsSort = fruits.sort();

console.log(fruitsSort);

// Usa reduce() para crear un string que contenga todas las frutas separadas por coma

const fruitsPhrase = fruits.reduce((phrase, fruit) => {

   return phrase ? `${phrase}, ${fruit}` : fruit;

}, "");

console.log(fruitsPhrase);