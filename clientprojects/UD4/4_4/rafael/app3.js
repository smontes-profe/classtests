// 1. OBTENER ELEMENTOS DEL HTML
const form = document.getElementById('form-inscripcion');
const inputNombre = document.getElementById('nombre');
const inputEmail = document.getElementById('email');
const inputPassword = document.getElementById('password');
const selectTipoEntrada = document.getElementById('tipo-entrada');
const checkboxTallerJS = document.getElementById('taller-js');
const checkboxTallerCSS = document.getElementById('taller-css');
const resumenTotal = document.getElementById('resumen-total');

// 2. REGEX PARA VALIDACIONES
const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const regexPassword = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

// 3. FUNCIÓN: Validar Nombre (se ejecuta al salir del campo)
/**
 * Comprueba que el nombre no esté vacío
 * @returns {boolean}
 */
function validarNombre() {
    if (inputNombre.value.trim() == '') {
        inputNombre.classList.add('error');
        document.getElementById('error-nombre').textContent = 'El nombre es obligatorio';
        return false;
    } else {
        inputNombre.classList.remove('eror');
        document.getElementById('error-nombre').textContent = '';
        return true;
    }
}

// 4. FUNCIÓN: Validar Email (se ejecuta al salir del campo)
/**
 * Valida formato del email
 * @returns {boolean}
 */
function validarEmail() {
    if (!regexEmail.test(inputEmail.value)) {
        inputEmail.classList.add('error');
        document.getElementById('error-email').textContent = 'Email inválido';
        return false;
    } else {
        inputEmail.classList.remove('error');
        document.getElementById('error-email').textContent = '';
        return true;
    }
}

// 5. FUNCIÓN: Validar Contraseña (se ejecuta al escribir)
/**
 * Valida la contraseña (mín 8 caracteres, 1 mayús, 1 núm)
 * @returns {boolean}
 */
function validarPassword() {
    if (!regexPassword.test(inputPassword.value)) {
        inputPassword.classList.add('error');
        document.getElementById('error-password').textContent = 'Mínimo 8 caracteres, 1 mayúscula y 1 número';
        return false;
    } else {
        inputPassword.classList.remove('error');
        document.getElementById('error-password').textContent = '';
        return true;
    }
}

// 6. FUNCIÓN: Calcular Total
/**
 * Suma entrada + talleres
 */
function actualizarTotal() {
    let total = parseInt(selectTipoEntrada.value);

    if (checkboxTallerJS.checked) {
        total += 50;
    }
    if (checkboxTallerCSS.checked) {
        total += 50;
    }

    resumenTotal.textContent = `Total a Pagar: ${total}€`;
}

// 7. EVENTOS: Validaciones
inputNombre.addEventListener('blur', validarNombre);
inputEmail.addEventListener('blur', validarEmail);
inputPassword.addEventListener('input', validarPassword);

// 8. EVENTOS: Cálculo de Total
selectTipoEntrada.addEventListener('change', actualizarTotal);
checkboxTallerJS.addEventListener('change', actualizarTotal);
checkboxTallerCSS.addEventListener('change', actualizarTotal);

// 9. EVENTO: Envío del Formulario
/**
 * Al enviar el formulario
 * @param {Event} event
 */
form.addEventListener('submit', function (event) {
    event.preventDefault();

    const nombreOK = validarNombre();
    const emailOK = validarEmail();
    const passwordOK = validarPassword();

    if (nombreOK && emailOK && passwordOK) {
        form.style.display = 'none';
        const mensaje = document.createElement('h2');
        mensaje.textContent = '¡Inscripción completada!';
        document.body.appendChild(mensaje);
    }
});
