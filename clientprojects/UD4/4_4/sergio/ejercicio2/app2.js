const inputEmail = document.getElementById("email-input");
const feedback = document.getElementById("email-feedback");

//Hago la regex para validar el email
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

//Valido el email en tiempo real con input + regex.test()
inputEmail.addEventListener("input", () => {
    const valor = inputEmail.value;

    if (regexEmail.test(valor)) {
        inputEmail.classList.add("valido");
        inputEmail.classList.remove("invalido");
        feedback.textContent = "Email Válido";
    } else {
        inputEmail.classList.add("invalido");
        inputEmail.classList.remove("valido");
        feedback.textContent = "Email Inválido";
    }
});