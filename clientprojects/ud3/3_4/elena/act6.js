
// Array
let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 }
];

// a) De mayor a menor
let ordenados = [...estudiantes].sort((a, b) => b.nota - a.nota);

// b) aprobados, matricula honor
let todosAprobados = estudiantes.every(e => e.nota >= 5);
let algunoHonor = estudiantes.some(e => e.nota >= 9);

// c) Estudiantes por nota
let agrupados = estudiantes.reduce((acc, e) => {
  acc[e.nota] = acc[e.nota] ? [...acc[e.nota], e] : [e];
  return acc;
}, {});

// d) Array de strings
let formato = estudiantes.map(e => `${e.nombre} - ${e.nota}`);

console.log({ ordenados, todosAprobados, algunoHonor, agrupados, formato });


