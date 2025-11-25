"use strict"

// 1️ Array de números
const numeros = [1, 4, 7, 10, 15];
console.log("Array original:", numeros);

// Filtrar los mayores que 5, multiplicar por 2 y sumar todos
// Usando encadenamiento: filter() → map() → reduce()
const resultado = numeros
  .filter(num => num > 5)         
  .map(num => num * 2)            
  .reduce((acum, num) => acum + num, 0); 
console.log("Suma total tras operaciones:", resultado);


// 2️ Array de objetos (usuarios)
let usuarios = [
  { nombre: "Ana", edad: 23 },
  { nombre: "Luis", edad: 19 },
  { nombre: "Marta", edad: 30 }
];

console.log("\nUsuarios originales:", usuarios);

// Filtrar mayores de 20, obtener nombres y ordenarlos alfabéticamente
const nombresMayores20 = usuarios
  .filter(user => user.edad > 20)      
  .map(user => user.nombre)            
  .sort();                            

console.log("Nombres de mayores de 20 (ordenados):", nombresMayores20);
