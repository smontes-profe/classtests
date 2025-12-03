"use strict";

let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 },
];

// a) Ordena a los estudiantes por nota de mayor a menor (sin modificar el original).

let estudiantesPorNotas = [...estudiantes].sort(
  (estudianteA, estudianteB) => estudianteB.nota - estudianteA.nota
);

console.log(estudiantesPorNotas);

/**
 Comprueba:
si todos han aprobado (nota >= 5)
si alguno tiene matrícula de honor (nota >= 9)
c) Agrupa los estudiantes por nota usando reduce() (objeto cuyo índice sea la nota).
d) Genera un array de strings con formato "Nombre - Nota" usando map().
*/

// Aptos
let estudiantesAptos = estudiantes.filter(
  (estudiantes) => estudiantes.nota >= 5
).length;

console.log(estudiantesAptos);

// Matrícula
let estudiantesMatricula = estudiantes.filter(
  (estudiantes) => estudiantes.nota >= 9
).length;

console.log(estudiantesMatricula);

// Agrupa los estudiantes por nota usando reduce() (objeto cuyo índice sea la nota).
let estudiantePorNota = estudiantes.reduce((resultadoObejto, estudiante) => {
  const notaEstudiante = estudiante.nota;

  if (!resultadoObejto[notaEstudiante]) {
    resultadoObejto[notaEstudiante] = [];
  }

  resultadoObejto[notaEstudiante].push(estudiante);

  return resultadoObejto;
}, {});

console.log(estudiantePorNota);

// Genera un array de strings con formato "Nombre - Nota" usando map().
let estudiantesString = estudiantes.map(
  (estudante) => `Nombre: ${estudante.nombre} - Nota: ${estudante.nota}`
);

console.log(estudiantesString);
