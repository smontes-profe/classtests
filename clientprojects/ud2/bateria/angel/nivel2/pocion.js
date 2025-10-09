const btn = document.getElementById('evaluar');
const nivelMagiaInput = document.getElementById('nivelMagia');
const capaSelect = document.getElementById('capa');
const mensajeDiv = document.getElementById('mensaje');

btn.addEventListener('click', () => {
  const nivelMagia = parseInt(nivelMagiaInput.value);
  const capa = capaSelect.value;
  let mensaje = '';

  // Evaluar nivel de magia
  if (nivelMagia > 70) {
    mensaje += '¡Cuidado, magia poderosa!\n';
  } else {
    mensaje += 'Magia inofensiva\n';
  }

  // Decisión múltiple según capa
  switch(capa) {
    case 'invisible':
      mensaje += 'Puedes espiar sin ser visto';
      break;
    case 'roja':
      mensaje += 'Todos te miran';
      break;
    case 'negra':
      mensaje += 'Sospechoso';
      break;
    default:
      mensaje += 'Capa desconocida';
  }

  mensajeDiv.textContent = mensaje;
});
