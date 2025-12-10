
// Ejercicio 2: El Validador en Vivo

document.addEventListener('DOMContentLoaded', () => {
  const input = document.getElementById('email-input'); // Cada vez que el usuario escribe
  const feedback = document.getElementById('email-feedback');

  if (!input || !feedback) return;

  // Regex
  const regexEmail = /^\S+@\S+\.\S+$/;

  function marcarValido() {
    input.classList.add('valido');
    input.classList.remove('invalido');
    feedback.textContent = 'Email Válido';
    feedback.classList.remove('invalido');
    feedback.classList.add('valido');
  }
  function marcarInvalido() {
    input.classList.add('invalido');
    input.classList.remove('valido');
    feedback.textContent = 'Email Inválido';
    feedback.classList.remove('valido');
    feedback.classList.add('invalido');
  }

  // Listener y validación
  input.addEventListener('input', (e) => { // Cada vez que el usuario escribe
    const valor = e.target.value.trim(); // Texto sin espacios
    if (valor === '') {
      input.classList.remove('valido', 'invalido');
      feedback.textContent = '';
      return;
    }

    if (regexEmail.test(valor)) {
      marcarValido();
    } else {
      marcarInvalido();
    }
  });
});


