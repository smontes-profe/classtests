/**
 * @fileoverview Script para el Ejercicio 2: Validador en Vivo.
 * Implementa una validación de email en tiempo real usando el evento 'input' y RegExp.
 */

// 1. Selección del DOM
const emailInput = document.getElementById('email-input');
const emailFeedback = document.getElementById('email-feedback');

/**
 * Expresión regular simple para validar el formato de un email.
 * @type {RegExp}
 */
const regexEmail = /^[\w-.]+@([\w-]+\.)+[\w-]{2,4}$/;

/**
 * Manejador principal para el evento 'input' en el campo de email.
 * Valida el valor del input en tiempo real contra una expresión regular y actualiza el feedback visual.
 * (Criterios d, f, g)
 * @param {Event} event - El objeto de evento.
 */
emailInput.addEventListener('input', (event) => {
    const valor = emailInput.value.trim();

    // Comprueba si el valor coincide con la expresión regular
    const esValido = regexEmail.test(valor);

    // Si está vacío, resetea el estado
    if (valor.length === 0) {
        emailInput.classList.remove('valido', 'invalido');
        emailFeedback.textContent = '';
        emailFeedback.classList.remove('valido', 'invalido');
    } else if (esValido) {
        // Válido
        emailInput.classList.remove('invalido');
        emailInput.classList.add('valido');
        emailFeedback.textContent = 'Email Válido ✅';
        emailFeedback.classList.remove('invalido');
        emailFeedback.classList.add('valido');
    } else {
        // Inválido
        emailInput.classList.remove('valido');
        emailInput.classList.add('invalido');
        emailFeedback.textContent = 'Email Inválido ❌';
        emailFeedback.classList.remove('valido');
        emailFeedback.classList.add('invalido');
    }
});