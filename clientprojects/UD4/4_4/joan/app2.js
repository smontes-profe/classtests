// Selección de elementos
const emailInput = document.getElementById('email-input');
const emailFeedback = document.getElementById('email-feedback');

// Expresión regular para validar email
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

/**
 * Valida el email en tiempo real y actualiza la interfaz
 * @param {Event} event - El evento input del campo de texto
 */
function validarEmail(event) {
    const valor = event.target.value;
    const esValido = regexEmail.test(valor);

    if (esValido) {
        emailInput.classList.remove('invalido');
        emailInput.classList.add('valido');
        emailFeedback.textContent = 'Email Válido';
        emailFeedback.className = 'valido';
    } else {
        emailInput.classList.remove('valido');
        emailInput.classList.add('invalido');
        emailFeedback.textContent = 'Email Inválido';
        emailFeedback.className = 'invalido';
    }
}

// Evento input para validación en tiempo real
emailInput.addEventListener('input', validarEmail);
