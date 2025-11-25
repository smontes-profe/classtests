let numeros = [1, 4, 7, 10, 15];

let resultado = numeros
  .filter(n => n > 5)   // [7,10,15]
  .map(n => n * 2)      // [14,20,30]
  .reduce((a,b) => a + b, 0); // 64

console.log(resultado);

let usuarios = [
  {nombre: "Ana", edad: 23},
  {nombre: "Luis", edad: 19},
  {nombre: "Marta", edad: 30}
];

let mayores20Ordenados = usuarios
  .filter(u => u.edad > 20)
  .map(u => u.nombre)
  .sort();

console.log(mayores20Ordenados); // ["Ana", "Marta"]
