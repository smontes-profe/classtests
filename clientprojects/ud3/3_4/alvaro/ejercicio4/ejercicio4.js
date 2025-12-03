// Ejercicio 4: Operaciones combinadas y encadenamiento
// Objetivo: Aplicar varias operaciones de arrays y funciones en cadena.

//Dado el array de números [1, 4, 7, 10, 15]:
let numerosEj4 = [1, 4, 7, 10, 15];

// Filtra los números mayores que 5
// Multiplica cada número filtrado por 2
// Calcula la suma de todos los números resultantes (todo encadenando filter(), map() y reduce())
let sumaEj4 = numerosEj4
    .filter(n => n > 5)
    .map(n => n * 2)
    .reduce((a, b) => a + b, 0);

console.log("Suma total (Ej4):", sumaEj4);

// Dado el array de objetos:
let usuariosEj4 = [
    { nombre: "Ana", edad: 23 },
    { nombre: "Luis", edad: 19 },
    { nombre: "Marta", edad: 30 }
];

// Filtra los mayores de 20
// Obtén un array con solo sus nombres usando map()
// Ordena los nombres alfabéticamente usando sort()
let nombresMayores20Ej4 = usuariosEj4
    .filter(u => u.edad > 20)
    .map(u => u.nombre)
    .sort();

console.log("Usuarios mayores de 20 (Ej4):", nombresMayores20Ej4);
