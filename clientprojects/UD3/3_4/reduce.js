const estudiantes = [
  { nombre: "Ana", nota: 7 },
  { nombre: "Luis", nota: 5 },
  { nombre: "María", nota: 9 },
  { nombre: "Pedro", nota: 4 },
  { nombre: "Sofía", nota: 8 }
];

// Usamos reduce para calcular media, aprobados y nota máxima
const estadisticas = estudiantes.reduce(
  (acum, estudiante, index, array) => {
    // Sumamos la nota para calcular media
    acum.totalNotas += estudiante.nota;

    // Contamos aprobados
    if (estudiante.nota >= 5) {
      acum.aprobados += 1;
    }

    // Comprobamos si es la nota más alta
    if (estudiante.nota > acum.maxNota) {
      acum.maxNota = estudiante.nota;
    }

    // Al final, calculamos la media
    if (index === array.length - 1) {
      acum.media = acum.totalNotas / array.length;
      delete acum.totalNotas; // opcional, no necesitamos totalNotas en el resultado final
    }

    return acum;
  },
  { totalNotas: 0, aprobados: 0, maxNota: 0, media: 0 }
);

console.log(estadisticas);
