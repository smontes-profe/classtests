//Array
let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 }
];

//Ordeno los estudiantes por nota de mayor a menor
let ordenados = [...estudiantes].sort((a, b) => b.nota - a.nota);
console.log("Ordenados:", ordenados);

//Compruebo si todos han aprobado, si alguno tiene matricula de honor, agrupo los estudiantes por su nota con reduce, y genero un array de strings con un formato y suando map
let todosAprobados = estudiantes.every(e => e.nota >= 5);

let algunHonor = estudiantes.some(e => e.nota >= 9);

console.log("Todos aprobados?", todosAprobados);

console.log("Alguno matricula de honor?", algunHonor);

//(Me he ayudado un poco de la ia en esta porque no me salia)
let agrupados = estudiantes.reduce((acc, e) => {
  if (!acc[e.nota]) acc[e.nota] = [];
  acc[e.nota].push(e.nombre);
  return acc;
}, {});
console.log("Agrupados:", agrupados);

let lista = estudiantes.map(e => `${e.nombre} - ${e.nota}`);
console.log("Lista:", lista);