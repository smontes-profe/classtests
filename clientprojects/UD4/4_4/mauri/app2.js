/**
 * Regulación para validar un email
 */
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

/**
 * Función para validar un email
 */
function validarEmail(event) {
    const input = event.target;
    const feedback = document.getElementById("feedback");
    const valorEmail = input.value;

    // Comprobar si el email es válido
    if (regexEmail.test(valorEmail)) {
        input.classList.remove("invalido");
        input.classList.add("valido");
        feedback.textContent = "Email válido";
        feedback.classList.remove("invalido");
        feedback.classList.add("valido");
    } else {
        input.classList.remove("valido");
        input.classList.add("invalido");
        feedback.textContent = "Email inválido";
        feedback.classList.remove("valido");
        feedback.classList.add("invalido");
    }
}

/**
 * Función para inicializar el validador de email
 */
function inicializar() {
    const emailInput = document.getElementById("email-input");
    emailInput.addEventListener("input", validarEmail);
}

inicializar();
