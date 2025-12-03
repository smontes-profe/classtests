let numeros2 = [1, 4, 7, 10, 15];

let total = numeros2
  .filter(n => n > 5)
  .map(n => n * 2)
  .reduce((a, b) => a + b, 0);

console.log(total);

let usuarios = [
  { nombre: "Ana", edad: 23 },
  { nombre: "Luis", edad: 19 },
  { nombre: "Marta", edad: 30 }
];

let nombres = usuarios
  .filter(u => u.edad > 20)
  .map(u => u.nombre)
  .sort();

console.log(nombres);