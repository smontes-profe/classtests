console.log("EJERCICIO 6: Ordenar, agrupar y validar datos\n");

// Array de estudiantes
let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 }
];

console.log("Estudiantes originales:", estudiantes);


// a) Ordenar por nota de mayor a menor (sin modificar el original)
console.log("\na) Ordenar por nota (mayor a menor)");
let estudiantesOrdenados = [...estudiantes].sort((a, b) => b.nota - a.nota);
console.log("Ordenados por nota:", estudiantesOrdenados);

// b) Comprobaciones con every() y some()
console.log("\nb) Comprobaciones");

let todosAprobados = estudiantes.every(estudiante => estudiante.nota >= 5);
console.log("¿Todos han aprobado (nota >= 5)?:", todosAprobados);

let hayMatricula = estudiantes.some(estudiante => estudiante.nota >= 9);
console.log("¿Alguno tiene matrícula de honor (nota >= 9)?:", hayMatricula);


// c) Agrupar estudiantes por nota usando reduce()
console.log("\nc) Agrupar por nota");
let estudiantesPorNota = estudiantes.reduce((grupos, estudiante) => {
    let nota = estudiante.nota;
    
    if (!grupos[nota]) {
        grupos[nota] = [];
    }
    
    grupos[nota].push(estudiante);
    
    return grupos;
}, {});

console.log("Estudiantes agrupados por nota:", estudiantesPorNota);


// d) Array de strings con formato "Nombre - Nota"
console.log("\nd) Formato Nombre - Nota");
let estudiantesFormateados = estudiantes.map(estudiante => {
    return estudiante.nombre + " - " + estudiante.nota;
});
console.log("Array formateado:", estudiantesFormateados);

console.log("\nFIN EJERCICIO 6");