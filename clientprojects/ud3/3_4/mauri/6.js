// Archivo JavaScript 6
let estudiantes = [
  { nombre: "Ana", nota: 9 },
  { nombre: "Luis", nota: 4 },
  { nombre: "Marta", nota: 7 },
  { nombre: "Pedro", nota: 5 },
  { nombre: "Sara", nota: 9 }
];

console.log("--- Array de Estudiantes Inicial ---");
console.table(estudiantes);

const estudiantesOrdenados = [...estudiantes].sort((a, b) => b.nota - a.nota);

console.log("\na) Estudiantes Ordenados por Nota (Mayor a Menor):");
console.table(estudiantesOrdenados);

// b.1) Comprueba si todos han aprobado (nota >= 5)
const todosAprobaron = estudiantes.every(estudiante => estudiante.nota >= 5);
console.log(`\nb.1) ¿Todos han aprobado (nota >= 5)? (every): ${todosAprobaron}`); // Salida: false (por Luis, con 4)

// b.2) Comprueba si alguno tiene matrícula de honor (nota >= 9)
const algunoMatricula = estudiantes.some(estudiante => estudiante.nota >= 9);
console.log(`b.2) ¿Alguno tiene matrícula de honor (nota >= 9)? (some): ${algunoMatricula}`); // Salida: true (por Ana y Sara)

// c) Agrupar estudiantes por nota usando reduce()
const estudiantesAgrupados = estudiantes.reduce((grupos, estudiante) => {
    const notaClave = estudiante.nota;
        if (!grupos[notaClave]) {
        grupos[notaClave] = [];
    }
        grupos[notaClave].push(estudiante.nombre);

    return grupos;
}, {});

console.log("\nc) Estudiantes Agrupados por Nota (reduce):");
console.log(estudiantesAgrupados);

const stringsFormateados = estudiantes.map(estudiante => `${estudiante.nombre} - ${estudiante.nota}`);

console.log("\nd) Array de Strings Formateados (map):");
console.log(stringsFormateados);