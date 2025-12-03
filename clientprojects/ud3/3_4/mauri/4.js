// Archivo JavaScript 4

const numbers = [1, 4, 7, 10, 15];

// 1. Filtra > 5  [7, 10, 15]
// 2. Multiplica * 2 [14, 20, 30]
// 3. Suma [64]
const finalSum = numbers
    .filter(num => num > 5)
    .map(num => num * 2)
    .reduce((accumulator, currentValue) => accumulator + currentValue, 0);

console.log("--- Operaciones con Números ---");
console.log(`Array inicial: [${numbers}]`);
console.log(`Suma final encadenada: ${finalSum}`); // Salida: 64

let usuarios = [
  {nombre: "Ana", edad: 23},
  {nombre: "Luis", edad: 19},
  {nombre: "Marta", edad: 30}
];

// 1. Filtra edad > 20
// 2. Obtiene solo los nombres
// 3. Ordena los nombres
const sortedNames = usuarios
    .filter(user => user.edad > 20)
    .map(user => user.nombre)
    .sort();

console.log("\n--- Operaciones con Objetos ---");
console.log("Usuarios iniciales:");
console.log(usuarios);
console.log(`Nombres ordenados (Mayores de 20): [${sortedNames}]`);