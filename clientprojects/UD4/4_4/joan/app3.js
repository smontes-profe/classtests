// Selección de elementos del formulario
const form = document.getElementById('form-inscripcion');
const nombreInput = document.getElementById('nombre');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const tipoEntrada = document.getElementById('tipo-entrada');
const tallerJS = document.getElementById('taller-js');
const tallerCSS = document.getElementById('taller-css');
const resumenTotal = document.getElementById('resumen-total');

// Elementos de error
const errorNombre = document.getElementById('error-nombre');
const errorEmail = document.getElementById('error-email');
const errorPassword = document.getElementById('error-password');

// Expresiones regulares
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const regexPassword = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

/**
 * Valida que el campo nombre no esté vacío
 * @returns {boolean} - true si el nombre es válido, false en caso contrario
 */
function validarNombre() {
    const valor = nombreInput.value.trim();

    if (valor === '') {
        errorNombre.textContent = 'El nombre es obligatorio';
        nombreInput.classList.add('error');
        return false;
    } else {
        errorNombre.textContent = '';
        nombreInput.classList.remove('error');
        return true;
    }
}

/**
 * Valida el formato del email usando expresión regular
 * @returns {boolean} - true si el email es válido, false en caso contrario
 */
function validarEmail() {
    const valor = emailInput.value.trim();

    if (!regexEmail.test(valor)) {
        errorEmail.textContent = 'El email no tiene un formato válido';
        emailInput.classList.add('error');
        return false;
    } else {
        errorEmail.textContent = '';
        emailInput.classList.remove('error');
        return true;
    }
}

/**
 * Valida la contraseña (mínimo 8 caracteres, 1 mayúscula, 1 número)
 * @returns {boolean} - true si la contraseña es válida, false en caso contrario
 */
function validarPassword() {
    const valor = passwordInput.value;

    if (!regexPassword.test(valor)) {
        errorPassword.textContent = 'Mínimo 8 caracteres, 1 mayúscula y 1 número';
        passwordInput.classList.add('error');
        return false;
    } else {
        errorPassword.textContent = '';
        passwordInput.classList.remove('error');
        return true;
    }
}

/**
 * Calcula y actualiza el total a pagar según la entrada y talleres seleccionados
 */
function actualizarTotal() {
    let total = parseInt(tipoEntrada.value);

    if (tallerJS.checked) {
        total += parseInt(tallerJS.value);
    }

    if (tallerCSS.checked) {
        total += parseInt(tallerCSS.value);
    }

    resumenTotal.textContent = `Total a Pagar: ${total}€`;
}

/**
 * Maneja el envío del formulario
 * @param {Event} event - El evento submit del formulario
 */
function handleSubmit(event) {
    event.preventDefault();

    // Ejecutar todas las validaciones
    const nombreValido = validarNombre();
    const emailValido = validarEmail();
    const passwordValido = validarPassword();

    // Si todas las validaciones son correctas
    if (nombreValido && emailValido && passwordValido) {
        form.style.display = 'none';

        const mensajeExito = document.createElement('h2');
        mensajeExito.textContent = '¡Inscripción completada!';
        document.body.appendChild(mensajeExito);
    }
}

// Eventos de validación
nombreInput.addEventListener('blur', validarNombre);
emailInput.addEventListener('blur', validarEmail);
passwordInput.addEventListener('input', validarPassword);

// Eventos de cálculo de total
tipoEntrada.addEventListener('change', actualizarTotal);
tallerJS.addEventListener('change', actualizarTotal);
tallerCSS.addEventListener('change', actualizarTotal);

// Evento de envío del formulario
form.addEventListener('submit', handleSubmit);
