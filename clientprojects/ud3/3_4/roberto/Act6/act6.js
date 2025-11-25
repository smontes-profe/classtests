console.log("---  Ejercicio 6: Ordenar, agrupar y validar datos ---");

let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 }
];

// a) Ordenar por nota de mayor a menor (sin modificar original)
const ordenados = estudiantes.slice().sort((a, b) => b.nota - a.nota);
console.log("a) Ordenados (mayor a menor):", ordenados);

// b) Comprobaciones
const todosAprobados = estudiantes.every(e => e.nota >= 5);
const algunaMatricula = estudiantes.some(e => e.nota >= 9);
console.log("b) ¿Todos aprobados? (>= 5):", todosAprobados); // false
console.log("b) ¿Alguna matrícula? (>= 9):", algunaMatricula); // true

// c) Agrupar por nota usando reduce()
const agrupadosPorNota = estudiantes.reduce((acc, estudiante) => {
  const nota = estudiante.nota;
  if (!acc[nota]) {
    acc[nota] = [];
  }
  acc[nota].push(estudiante);
  return acc;
}, {});
console.log("c) Agrupados por nota:", agrupadosPorNota);

// d) Generar array de strings "Nombre - Nota"
const formatoStrings = estudiantes.map(e => `${e.nombre} - ${e.nota}`);
console.log("d) Formato strings:", formatoStrings);