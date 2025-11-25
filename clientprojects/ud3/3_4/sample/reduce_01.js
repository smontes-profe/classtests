const estudiantes = [
  { nombre: "Ana", nota: 7 },
  { nombre: "Luis", nota: 5 },
  { nombre: "María", nota: 9 },
  { nombre: "Pedro", nota: 4 },
  { nombre: "Sofía", nota: 8 }
];

// Usamos reduce para sumar las notas
const resultado = estudiantes.reduce((acum, estudiante, index, array) => {
  acum.total += estudiante.nota;

  // Al final del array, calculamos la media
  if (index === array.length - 1) {
    acum.media = acum.total / array.length;
    delete acum.total; // opcional, no necesitamos total en el resultado final
  }

  return acum;
}, { total: 0, media: 0 });

console.log(resultado);
