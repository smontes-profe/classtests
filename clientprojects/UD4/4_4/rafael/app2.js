/** @type {HTMLInputElement} Input de email */
const inputEmail = document.getElementById('email-input');

/** @type {HTMLSpanElement} Feedback de validación */
const spanFeedback = document.getElementById('email-feedback');

/** @type {RegExp} Regex para validar email */
const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

/**
 * Valida email en tiempo real
 * @param {Event} event - Evento del input
 */
inputEmail.addEventListener('input', function (event) {
    const valor = event.target.value;
    if (regexEmail.test(valor)) {
        inputEmail.classList.add('valido');
        inputEmail.classList.remove('invalido');
        spanFeedback.textContent = 'Email Válido';
    } else {
        inputEmail.classList.add('invalido');
        inputEmail.classList.remove('valido');
        spanFeedback.textContent = 'Email Inválido';
    }
});