//Array
let nums = [1, 4, 7, 10, 15];

let total = nums
//Filtro los numeros mayores que 5
  .filter(n => n > 5)

//Multiplico cada numero por 2
  .map(n => n * 2)

//Suma de los numeros resultantes
  .reduce((a, b) => a + b);

console.log("Resultado total:", total);

//Array de objetos:
let usuarios = [
  {nombre: "Ana", edad: 23},
  {nombre: "Luis", edad: 19},
  {nombre: "Marta", edad: 30}
];

//Filtro los mayores de 20
let mayores20 = usuarios

.filter(u => u.edad > 20)

//Array con solo sus nombres con map
 .map(u => u.nombre)

//Ordeno los nombres alfabeticamente con sort
.sort();