/**
 * Elementos
 */
const emailInput = document.getElementById("email-input");
const feedback = document.getElementById("email-feedback");

/**
 * Validación email
 */
const regexEmail = /^\S+@\S+\.\S+$/;

/**
 * Validación en tiempo real del email
 * @param {InputEvent} event
 */
emailInput.addEventListener("input", () => {
    const valor = emailInput.value;

    if (regexEmail.test(valor)) {
        emailInput.classList.add("valido");
        emailInput.classList.remove("invalido");
        feedback.textContent = "Email Válido";
        feedback.classList.add("valido");
        feedback.classList.remove("invalido");
    } else {
        emailInput.classList.add("invalido");
        emailInput.classList.remove("valido");
        feedback.textContent = "Email Inválido";
        feedback.classList.add("invalido");
        feedback.classList.remove("valido");
    }
});