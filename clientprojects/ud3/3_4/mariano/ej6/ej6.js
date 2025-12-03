"use strict"


let estudiantes = [
    { nombre: "Ana", nota: 9 },
    { nombre: "Luis", nota: 4 },
    { nombre: "Marta", nota: 7 },
    { nombre: "Pedro", nota: 5 },
    { nombre: "Sara", nota: 9 }
  ];
  
  console.log("Listado original de estudiantes:");
  console.log(estudiantes);
  
  // a) Ordenar por nota de mayor a menor (sin modificar el original)
  const ordenados = [...estudiantes].sort((a, b) => b.nota - a.nota);
  console.log("\na) Estudiantes ordenados por nota (descendente):");
  console.log(ordenados);
  
  // b) Comprobaciones
  const todosAprobados = estudiantes.every(e => e.nota >= 5);
  const algunoMatriculaHonor = estudiantes.some(e => e.nota >= 9);
  
  console.log("\nb) Comprobaciones:");
  console.log("¿Todos han aprobado?:", todosAprobados);
  console.log("¿Alguno tiene matrícula de honor (>=9)?:", algunoMatriculaHonor);
  
  // c) Agrupar por nota usando reduce
  const agrupadosPorNota = estudiantes.reduce((acum, est) => {
    if (!acum[est.nota]) {
      acum[est.nota] = [];
    }
    acum[est.nota].push(est.nombre);
    return acum;
  }, {});
  
  console.log("\nc) Estudiantes agrupados por nota:");
  console.log(agrupadosPorNota);

  
  // d) Generar array de strings con formato "Nombre - Nota"
  const formatoStrings = estudiantes.map(e => `${e.nombre} - ${e.nota}`);
  console.log("\nd) Array de strings 'Nombre - Nota':");
  console.log(formatoStrings);
  