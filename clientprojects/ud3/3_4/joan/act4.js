/* Ejercicio 4: Operaciones combinadas y encadenamiento
Objetivo: Aplicar varias operaciones de arrays y funciones en cadena.

Dado el array de números [1, 4, 7, 10, 15]:

Filtra los números mayores que 5
Multiplica cada número filtrado por 2
Calcula la suma de todos los números resultantes
(todo encadenando filter(), map() y reduce())
Dado el array de objetos:

 
let usuarios = [
  {nombre: "Ana", edad: 23},
  {nombre: "Luis", edad: 19},
  {nombre: "Marta", edad: 30}
];
 
Filtra los mayores de 20
Obtén un array con solo sus nombres usando map()
Ordena los nombres alfabéticamente usando sort().
Puntuación: 1. */

const numeros2 = [1, 4, 7, 10, 15];


const sumaFinal = numeros2
  .filter(n => n > 5)
  .map(n => n * 2)
  .reduce((a, b) => a + b, 0);

let usuarios = [
  { nombre: "Ana", edad: 23 },
  { nombre: "Luis", edad: 19 },
  { nombre: "Marta", edad: 30 }
];

const mayores20 = usuarios.filter(u => u.edad > 20);

const nombresOrdenados = mayores20.map(u => u.nombre).sort();