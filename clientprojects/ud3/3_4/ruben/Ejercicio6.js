let estudiantes = [
    { nombre: "Ana", nota: 9 },
    { nombre: "Luis", nota: 4 },
    { nombre: "Marta", nota: 7 },
    { nombre: "Pedro", nota: 5 },
    { nombre: "Sara", nota: 9 }
];

let estudiantesOrdenados = [...estudiantes].sort((a, b) => b.nota - a.nota);
console.log("Estudiantes ordenados por nota de mayor a menor:", estudiantesOrdenados);

let aprobados = estudiantes.filter(e => e.nota >= 5).length === estudiantes.length;
console.log("¿Todos han aprobado?", aprobados);

let matriculaHonor = aprobados.filter(e => e.nota >= 9);
console.log("Hay", matriculaHonor.length > 0 +"estudiantes con matrícula de honor.");

let estudiantesAgrupados = estudiantes.reduce((acc, estudiante) => {
    if (!acc[estudiante.nota]) {
        acc[estudiante.nota] = [];
    }
    acc[estudiante.nota].push(estudiante);
    return acc;
}, {});
console.log("Estudiantes agrupados por nota:", estudiantesAgrupados);

let estudiantesFormateados = estudiantes.map(e => `${e.nombre} - ${e.nota}`);
console.log("Array de strings con formato 'Nombre - Nota':", estudiantesFormateados);