/*
Objetivo: Trabajar con sort, every, some y reduce para clasificación y comprobaciones.

Puntuación: 4,5

Dado el array:

 
let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 }
];
Realiza:

a) Ordena a los estudiantes por nota de mayor a menor (sin modificar el original).

b) Comprueba:
    si todos han aprobado (nota >= 5)  
    si alguno tiene matrícula de honor (nota >= 9)

c) Agrupa los estudiantes por nota usando reduce() (objeto cuyo índice sea la nota).

d) Genera un array de strings con formato "Nombre - Nota" usando map().
*/

let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 }
];

//a
//Ordenar por las notas sin cambiar el objeto original
let ordenado = [...estudiantes].sort((a,b) => b.nota -a.nota);
console.log(ordenado)

//b
//comprobar los aprobados
let aprobado = estudiantes.every(e => e.nota >=5); 
//las matriculas de honor
let matriculaH = estudiantes.some(e => e.nota ===9);
console.log(aprobado);
console.log(matriculaH);

//c
let agrupado = estudiantes.reduce((acum,e) => {
    (acum[e.nota] ||= []).push(e.nombre);
    return acum;
}, {});

console.log(agrupado)

//d
//Genera un array de strings con formato "Nombre - Nota" usando map().
let cambio = estudiantes.map(e => `${e.nombre} - ${e.nota}`);
console.log(cambio);
