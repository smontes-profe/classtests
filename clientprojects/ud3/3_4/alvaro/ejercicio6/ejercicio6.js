// Ejercicio 6: Ordenar, agrupar y validar datos
// Objetivo: Trabajar con sort, every, some y reduce para clasificación y comprobaciones

// Dado el array:
let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 }
];

// a) Ordena a los estudiantes por nota de mayor a menor (sin modificar el original)
let ordenados = [...estudiantes].sort((a, b) => b.nota - a.nota);

// b) Comprueba:
// si todos han aprobado (nota >= 5)
let todosAprobados = estudiantes.every(e => e.nota >= 5);
// si alguno tiene matrícula de honor (nota >= 9)
let algunoHonor = estudiantes.some(e => e.nota >= 9);

// c) Agrupa los estudiantes por nota usando reduce() (objeto cuyo índice sea la nota)
let agrupados = estudiantes.reduce((acc, e) => {
    (acc[e.nota] = acc[e.nota] || []).push(e);
    return acc;
}, {});

// d) Genera un array de strings con formato "Nombre - Nota" usando map()
let formato = estudiantes.map(e => `${e.nombre} - ${e.nota}`);

// Mostrar resultados en consola
console.log({ ordenados, todosAprobados, algunoHonor, agrupados, formato });
