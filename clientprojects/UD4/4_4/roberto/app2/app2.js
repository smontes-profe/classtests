// --- app2.js ---

const emailInput = document.getElementById('email-input');
const emailFeedback = document.getElementById('email-feedback');

// Regex simple para email
const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

// Validamos el email mientras escribes
emailInput.addEventListener('input', () => {
    const valor = emailInput.value.trim();
    const esValido = regexEmail.test(valor);

    // Reseteamos estado
    emailInput.classList.remove('valido', 'invalido');
    emailFeedback.classList.remove('valido', 'invalido');

    if (valor.length === 0) {
        // Si está vacío no decimos nada
        emailFeedback.textContent = "";
        return;
    }

    if (esValido) {
        emailInput.classList.add('valido');
        emailFeedback.textContent = "Email Válido";
        emailFeedback.classList.add('valido');
    } else {
        emailInput.classList.add('invalido');
        emailFeedback.textContent = "Email Inválido";
        emailFeedback.classList.add('invalido');
    }
});