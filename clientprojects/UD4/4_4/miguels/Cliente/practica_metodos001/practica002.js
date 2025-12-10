"use strict";

/**
 * Tienes un array de objetos que representan las notas de varios estudiantes:

const estudiantes = [
  { nombre: "Ana", nota: 7 },
  { nombre: "Luis", nota: 5 },
  { nombre: "María", nota: 9 },
  { nombre: "Pedro", nota: 4 },
  { nombre: "Sofía", nota: 8 }
];

✅ Instrucciones

Usando solo reduce() (sin filter(), map() ni otros métodos):

Calcular la nota media del grupo.

Contar cuántos estudiantes han aprobado (nota ≥ 5).

Obtener la nota más alta del grupo.

Mostrar el resultado en un objeto con este formato:

{
  media: ...,
  aprobados: ...,
  maxNota: ...
}

💡 Pista

Recuerda que reduce() permite acumular varios valores a la vez si el acumulador es un objeto.
 */

const estudiantes = [
  { nombre: "Ana", nota: 7 },
  { nombre: "Luis", nota: 5 },
  { nombre: "María", nota: 9 },
  { nombre: "Pedro", nota: 4 },
  { nombre: "Sofía", nota: 8 },
];

let notaMediaEstudiantes = estudiantes.reduce(
  (sumaNotas, estudiante, index, array) => {
    if (index === array.length - 1) {
      return (sumaNotas + estudiante.nota) / array.length;
    }

    return sumaNotas + estudiante.nota;
  },
  0
);

console.log(notaMediaEstudiantes);

let notaMedia002 = estudiantes.reduce((notaSumaTotal, estudiante) => {
  return notaSumaTotal + estudiante.nota;
}, 0);

console.log(notaMedia002 / 5);
