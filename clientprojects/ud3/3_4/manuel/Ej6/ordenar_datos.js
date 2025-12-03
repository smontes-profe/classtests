let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 }
];

let ordenados = [...estudiantes].sort((a, b) => b.nota - a.nota);

let todosAprobados = estudiantes.every(e => e.nota >= 5);
let algunoHonor = estudiantes.some(e => e.nota >= 9);

let agrupados = estudiantes.reduce((acc, e) => {
  acc[e.nota] = acc[e.nota] ? [...acc[e.nota], e] : [e];
  return acc;
}, {});

let formato = estudiantes.map(e => `${e.nombre} - ${e.nota}`);

console.log({ ordenados, todosAprobados, algunoHonor, agrupados, formato });