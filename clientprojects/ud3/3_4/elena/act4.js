
// Array
let nums = [1, 4, 7, 10, 15];

// Filtrar num > 5, multiplicar por 2, sumar todo
let suma = nums
filter(n => n > 5)
map(n => n * 2)
reduce((a, b) => a + b, 0);

console.log("Suma final:", suma);


// Array de objetos
let usuarios = [
  { nombre: "Ana", edad: 23 },
  { nombre: "Luis", edad: 19 },
  { nombre: "Marta", edad: 30 }
];

// > 20, nombre con map, alfabeticamente con sort
let mayoresOrdenados = usuarios
filter(u => u.edad > 20)
map(u => u.nombre)
sort();


