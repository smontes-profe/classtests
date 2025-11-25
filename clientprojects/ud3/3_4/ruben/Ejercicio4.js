let numeros = [1, 4, 7, 10, 15];
let numerosFiltrados = numeros.filter(n => n > 5);
let numerosMultiplicados = numerosFiltrados.map(n => n * 2);
let sumaTotal = numerosMultiplicados.reduce((start, actual) => start + actual, 0);
console.log("Suma total de números mayores a 5 multiplicados por 2: " + sumaTotal);

let usuarios = [
  {nombre: "Ana", edad: 23},
  {nombre: "Luis", edad: 19},
  {nombre: "Marta", edad: 30}
];
let mayoresDe20 = usuarios.filter(u => u.edad > 20);
let nombres = mayoresDe20.map(u => u.nombre);
nombres.sort();
console.log("Nombres de usuarios mayores de 20 ordenados alfabéticamente: " + nombres);