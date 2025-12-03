console.log("EJERCICIO 4: Operaciones combinadas y encadenamiento\n");

// PARTE 1
console.log("PARTE 1");
let numeros = [1, 4, 7, 10, 15];
console.log("Array original:", numeros);

// Filtrar > 5, multiplicar por 2, y sumar todo (encadenado)
let resultado = numeros
    .filter(num => num > 5)
    .map(num => num * 2)
    .reduce((suma, num) => suma + num, 0);

console.log("\nProceso encadenado:");
console.log("  1. Filtrar números > 5:", numeros.filter(num => num > 5));
console.log("  2. Multiplicar por 2:", numeros.filter(num => num > 5).map(num => num * 2));
console.log("  3. Suma total:", resultado);


// PARTE 2
console.log("\nPARTE 2");
let usuarios = [
  {nombre: "Ana", edad: 23},
  {nombre: "Luis", edad: 19},
  {nombre: "Marta", edad: 30}
];

console.log("Array original de usuarios:", usuarios);

// Filtrar mayores de 20, obtener nombres, ordenar alfabéticamente
let nombresMayores20 = usuarios
    .filter(usuario => usuario.edad > 20)
    .map(usuario => usuario.nombre)
    .sort();

console.log("\nProceso encadenado:");
console.log("  1. Filtrar mayores de 20:", usuarios.filter(u => u.edad > 20));
console.log("  2. Obtener nombres:", usuarios.filter(u => u.edad > 20).map(u => u.nombre));
console.log("  3. Ordenar alfabéticamente:", nombresMayores20);

console.log("\nFIN EJERCICIO 4");