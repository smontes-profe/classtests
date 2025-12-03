// Ejercicio 4: Operaciones combinadas y encadenamiento
// Objetivo: Aplicar varias operaciones de arrays y funciones en cadena.

// Dado el array de números [1, 4, 7, 10, 15]:
// Filtra los números mayores que 5
// Multiplica cada número filtrado por 2
// Calcula la suma de todos los números resultantes
// (todo encadenando filter(), map() y reduce())

// Dado el array de objetos:
// let usuarios = [
//   {nombre: "Ana", edad: 23},
//   {nombre: "Luis", edad: 19},
//   {nombre: "Marta", edad: 30}
// ];

// Filtra los mayores de 20
// Obtén un array con solo sus nombres usando map()
// Ordena los nombres alfabéticamente usando sort().

//! PARTE 1: ARRAY NUM
arrNum = [1, 4, 7, 10, 15];

let mierda = arrNum
.filter((num) => num > 5)
.map((elemento) => elemento * 2)
.reduce((acumulado, valorActual) => (acumulado += valorActual), 0);
console.log(mierda);

//! PARTE 2: OBJETOS
let usuarios = [
  { nombre: "Ana", edad: 23 },
  { nombre: "Luis", edad: 19 },
  { nombre: "Marta", edad: 30 },
];

let nuevoUsuario = usuarios.filter(elemento => elemento.edad > 20 ).map(elemento => elemento.nombre).sort();
console.log(nuevoUsuario);