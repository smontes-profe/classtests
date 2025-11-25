/*Ejercicio 3: Arrays – creación y manipulación
Objetivo: Crear arrays y usar métodos básicos y avanzados.

Crea un array frutas con cinco frutas.
Añade una fruta al inicio y otra al final.
Elimina la primera y la última fruta.

Crea un nuevo array frutasMayus con todas las frutas en mayúsculas usando map().
Filtra solo las frutas que contengan la letra "a" usando filter().
Encuentra la posición de la fruta "Manzana" usando findIndex().
Comprueba si alguna fruta empieza con "P" usando some() y si todas las frutas tienen más de 3 letras usando every().
Ordena las frutas alfabéticamente usando sort().
Usa reduce() para crear un string que contenga todas las frutas separadas por coma.
Puntuación: 1. */ 

const frutas = ["Manzana", "Platano", "Ciruela", "Tomate", "Paraguayo"];

frutas.unshift("Mango");
frutas.push("Pera");
frutas.shift();
frutas.pop();

const frutasMayus = frutas.map(fruta => fruta.toUpperCase());
const frutasConA = frutas.filter(fruta => fruta.toLowerCase().includes("a"));
const indiceManzana = frutas.findIndex(fruta => fruta === "Manzana");
const algunaEmpiezaConP = frutas.some(fruta => fruta.startsWith("P"));
const todasMasDe3Letras = frutas.every(fruta => fruta.length > 3);

frutas.sort();

const frutasReducidas = frutas.reduce((acc, fruta) => acc + fruta + ", ", "").slice(0, -2);




console.log("Frutas", frutas);
console.log("Frutas en mayusculas", frutasMayus);
console.log("Frutas con a", frutasConA);
console.log("Indice de Manzana", indiceManzana);
console.log("Alguna empieza con P?", algunaEmpiezaConP);
console.log("Todas tienen más de 3 letras", todasMasDe3Letras);
console.log("Frutas reducidas", frutasReducidas);
