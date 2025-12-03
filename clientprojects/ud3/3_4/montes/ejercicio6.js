// Ejercicio 6: Ordenar, agrupar y validar datos
// Objetivo: Trabajar con sort, every, some y reduce para clasificación y comprobaciones.

// Puntuación: 4,5 //! Esto se te has escapado en el enunciado

// Dado el array:

let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 },
];
// Realiza:

// a) Ordena a los estudiantes por nota de mayor a menor (sin modificar el original).
// b) Comprueba:
// si todos han aprobado (nota >= 5)
// si alguno tiene matrícula de honor (nota >= 9)
// c) Agrupa los estudiantes por nota usando reduce() (objeto cuyo índice sea la nota).
// d) Genera un array de strings con formato "Nombre - Nota" usando map().

function estudiantesOrdenados(arr) {
  return [...arr].sort(
    //? Por el hecho de utilizar una copia
    (elemento1, elemento2) => elemento2.nota - elemento1.nota
  );
}

function esAprobado(arr) {
  return arr.every((elemento) => elemento.nota >= 5);
}

function esMatriculaHonor(arr) {
  return arr.some((elemento) => elemento.nota >= 9);
}

function agruparEstudiantes(arr) {
  return arr.reduce((acumulado, valorActual) => {
    const nota = valorActual.nota;
    if (acumulado[nota] === undefined) {
      acumulado[nota] = [];
    }
    acumulado[nota].push(valorActual);

    return acumulado;
  }, {});
}

function toNewString(arr) {
  return arr.map (elemento => `${elemento.nombre} - ${elemento.nota}`);
}

console.log(estudiantesOrdenados(estudiantes));
console.log(esAprobado(estudiantesOrdenados(estudiantes)));
console.log(esMatriculaHonor(estudiantes));
console.log(agruparEstudiantes(estudiantes));
console.log(toNewString(estudiantes));