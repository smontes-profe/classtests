const emailInput = document.getElementById('email-input');
const emailFeedback = document.getElementById('email-feedback');

// Expresión regular para validar el formato de email
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

/**
 * Evento input: Se dispara cada vez que el usuario escribe en el campo de email.
 * Valida el email en tiempo real usando regex y actualiza las clases y el mensaje de feedback.
 */
emailInput.addEventListener('input', () => {
    const valorInput = emailInput.value;
    const esValido = emailRegex.test(valorInput);

    if (esValido) {
        // Si es válido: añade clase valido al input, quita invalido y pone mensaje
        emailInput.classList.remove('invalido');
        emailInput.classList.add('valido');
        emailFeedback.textContent = 'Email Válido';
        // Opcional: También podemos poner el texto en verde si se desea, 
        // pero la instrucción dice "añade la clase valido al input".
        emailFeedback.className = 'valido'; // Para que el texto también salga verde según CSS
    } else {
        // Si es inválido: añade clase invalido al input, quita valido y pone mensaje
        emailInput.classList.remove('valido');
        emailInput.classList.add('invalido');
        emailFeedback.textContent = 'Email Inválido';
        emailFeedback.className = 'invalido'; // Para que el texto también salga rojo según CSS
    }
});
