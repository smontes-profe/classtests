let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 }
];

// a) Ordenar por nota desc sin mutar original
let ordenados = [...estudiantes].sort((a, b) => b.nota - a.nota);

// b) Comprobaciones
let todosAprobados = estudiantes.every(e => e.nota >= 5);
let algunoMatricula = estudiantes.some(e => e.nota >= 9);

// c) Agrupar por nota
let agrupados = estudiantes.reduce((acc, e) => {
  acc[e.nota] = (acc[e.nota] || 0) + 1;
  return acc;
}, {});

// d) Formato "Nombre - Nota"
let nombresNotas = estudiantes.map(e => `${e.nombre} - ${e.nota}`);

console.log(ordenados, todosAprobados, algunoMatricula, agrupados, nombresNotas);
