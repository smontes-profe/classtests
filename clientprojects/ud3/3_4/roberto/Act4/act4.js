console.log("---  Ejercicio 4: Operaciones combinadas y encadenamiento ---");

// --- Array de números ---
const numerosEncadenados = [1, 4, 7, 10, 15];

const resultadoEncadenado = numerosEncadenados
  .filter(n => n > 5)       // [7, 10, 15]
  .map(n => n * 2)          // [14, 20, 30]
  .reduce((acc, n) => acc + n, 0); // 64

console.log("Resultado encadenado (números):", resultadoEncadenado); // 64

// --- Array de objetos ---
let usuarios = [
  { nombre: "Ana", edad: 23 },
  { nombre: "Luis", edad: 19 },
  { nombre: "Marta", edad: 30 }
];

const nombresMayores = usuarios
  .filter(u => u.edad > 20) // [{nombre: "Ana", edad: 23}, {nombre: "Marta", edad: 30}]
  .map(u => u.nombre)       // ["Ana", "Marta"]
  .sort();                  // ["Ana", "Marta"]

console.log("Nombres mayores ordenados:", nombresMayores); // ["Ana", "Marta"]