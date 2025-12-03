"use strict";

const arrayNum = [1, 4, 7, 10, 15];

/**
Filtra los números mayores que 5
Multiplica cada número filtrado por 2
Calcula la suma de todos los números resultantes
(todo encadenando filter(), map() y reduce())
*/
const arrayModify = arrayNum
  .filter((num) => num > 5)
  .map((num) => num * 2)
  .reduce((total, num) => total + num, 0);

console.log(arrayModify);


/**
Filtra los mayores de 20
Obtén un array con solo sus nombres usando map()
Ordena los nombres alfabéticamente usando sort().
*/
let usuarios = [
  {nombre: "Ana", edad: 23},
  {nombre: "Luis", edad: 19},
  {nombre: "Marta", edad: 30}
];

const usuariosModify = usuarios
.filter(usuario => usuario.edad > 20)
.map(usuario => usuario.nombre)
.sort();

console.log(usuariosModify);