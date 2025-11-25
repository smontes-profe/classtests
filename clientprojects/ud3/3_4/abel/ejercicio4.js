/*
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
*/

//Crear array numeros
let numeros = [1, 4, 7, 10, 15];

//Filtrar los numeros mayores que 5
let mas5 = numeros.every(numeros => numeros > 5);

//Multiplicar cada numero filtrado por 2
let mas5por2 = mas5.map(mas5 => mas5 * 2);

//Suma de todos los numeros resultantes
//Version recortada
let total = mas5por2.reduce((acum, num) => acum + num, 0);

//Version ejercicio
let total2 = numeros
  .filter(n => n > 5)
  .map(n => n * 2)
  .reduce((acum, n) => acum + n, 0);



//Crear array de objetos
let usuarios = [
  {nombre: "Ana", edad: 23},
  {nombre: "Luis", edad: 19},
  {nombre: "Marta", edad: 30}
];

//Filtrar los mayores de 20
let nombresOrdenados = usuarios
  .filter(usuario => usuario.edad > 20)
  .map(usuario => usuario.nombre)
  .sort();