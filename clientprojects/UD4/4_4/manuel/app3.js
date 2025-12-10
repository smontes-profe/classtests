/**
 * Elementos
 */
const form = document.getElementById("form-inscripcion");
const nombre = document.getElementById("nombre");
const email = document.getElementById("email");
const password = document.getElementById("password");

const errorNombre = document.getElementById("error-nombre");
const errorEmail = document.getElementById("error-email");
const errorPassword = document.getElementById("error-password");

const selectEntrada = document.getElementById("tipo-entrada");
const tallerJs = document.getElementById("taller-js");
const tallerCss = document.getElementById("taller-css");

const resumenTotal = document.getElementById("resumen-total");

/**
 * Validación email y contraseña
 */
const regexEmail = /^\S+@\S+\.\S+$/;
const regexPass = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

/**
 *  Nombre no vacío
 * @returns {boolean}
 */
function validarNombre() {
    if (nombre.value.trim() === "") {
        errorNombre.textContent = "El nombre no puede estar vacío.";
        nombre.classList.add("error");
        return false;
    }
    errorNombre.textContent = "";
    nombre.classList.remove("error");
    return true;
}

/**
 * Validación email
 * @returns {boolean}
 */
function validarEmail() {
    if (!regexEmail.test(email.value)) {
        errorEmail.textContent = "Email inválido.";
        email.classList.add("error");
        return false;
    }
    errorEmail.textContent = "";
    email.classList.remove("error");
    return true;
}

/**
 * Validación contraseña
 * @returns {boolean}
 */
function validarPassword() {
    if (!regexPass.test(password.value)) {
        errorPassword.textContent = "Debe tener 8 caracteres, 1 mayúscula y 1 número.";
        password.classList.add("error");
        return false;
    }
    errorPassword.textContent = "";
    password.classList.remove("error");
    return true;
}

/**
 * Validación
 */
nombre.addEventListener("blur", validarNombre);
email.addEventListener("blur", validarEmail);
password.addEventListener("input", validarPassword);

/**
 * Cálculo total
 */
function actualizarTotal() {
    let total = parseInt(selectEntrada.value);

    if (tallerJs.checked) total += 50;
    if (tallerCss.checked) total += 50;

    resumenTotal.textContent = `Total a Pagar: ${total}€`;
}

/**
 * Cálculo
 */
selectEntrada.addEventListener("change", actualizarTotal);
tallerJs.addEventListener("change", actualizarTotal);
tallerCss.addEventListener("change", actualizarTotal);

/**
 * Envío y validación final
 * @param {SubmitEvent} event
 */
form.addEventListener("submit", (event) => {
    event.preventDefault();

    const okNombre = validarNombre();
    const okEmail = validarEmail();
    const okPass = validarPassword();

    if (okNombre && okEmail && okPass) {
        form.innerHTML = "<h2>¡Inscripción completada!</h2>";
    }
});
