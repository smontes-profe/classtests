/**
 * Script principal para el formulario de inscripción.
 * Maneja validaciones en tiempo real, cálculo de costos y envío del formulario.
 */

const form = document.getElementById('form-inscripcion');
const nombreInput = document.getElementById('nombre');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const tipoEntradaSelect = document.getElementById('tipo-entrada');
const talleresCheckbox = document.querySelectorAll('input[name="taller"]');
const errorNombre = document.getElementById('error-nombre');
const errorEmail = document.getElementById('error-email');
const errorPassword = document.getElementById('error-password');
const resumenTotal = document.getElementById('resumen-total');

// Expresiones regulares
const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/; // Mínimo 8 caracteres, 1 mayúscula, 1 número

/**
 * Valida el campo nombre.
 * Comprueba que no esté vacío.
 * @returns {boolean} True si es válido, false si no.
 */
function validarNombre() {
    if (nombreInput.value.trim() === '') {
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
 * Valida el campo email.
 * Comprueba el formato usando regex.
 * @returns {boolean} True si es válido, false si no.
 */
function validarEmail() {
    if (!emailRegex.test(emailInput.value)) {
        errorEmail.textContent = 'Email inválido';
        emailInput.classList.add('error');
        return false;
    } else {
        errorEmail.textContent = '';
        emailInput.classList.remove('error');
        return true;
    }
}

/**
 * Valida el campo contraseña.
 * Comprueba longitud y requisitos de caracteres.
 * @returns {boolean} True si es válido, false si no.
 */
function validarPassword() {
    if (!passwordRegex.test(passwordInput.value)) {
        errorPassword.textContent = 'Mínimo 8 caracteres, 1 mayúscula, 1 número';
        passwordInput.classList.add('error');
        return false;
    } else {
        errorPassword.textContent = '';
        passwordInput.classList.remove('error');
        return true;
    }
}

// Listeners de validación según instrucciones
nombreInput.addEventListener('blur', validarNombre);
emailInput.addEventListener('blur', validarEmail);
passwordInput.addEventListener('input', validarPassword);

/**
 * Calcula y actualiza el costo total de la inscripción.
 * Suma el precio de la entrada seleccionada y los talleres marcados.
 */
function actualizarTotal() {
    let total = parseInt(tipoEntradaSelect.value);

    talleresCheckbox.forEach(checkbox => {
        if (checkbox.checked) {
            total += parseInt(checkbox.value);
        }
    });

    resumenTotal.textContent = `Total a Pagar: ${total}€`;
}

// Listeners para cálculo de total
tipoEntradaSelect.addEventListener('change', actualizarTotal);
talleresCheckbox.forEach(checkbox => {
    checkbox.addEventListener('change', actualizarTotal);
});

/**
 * Maneja el evento submit del formulario.
 * Previene el envío, ejecuta todas las validaciones y muestra el resultado.
 */
form.addEventListener('submit', (event) => {
    event.preventDefault();

    // Ejecutar todas las validaciones
    const isNombreValido = validarNombre();
    const isEmailValido = validarEmail();
    const isPasswordValido = validarPassword();

    if (isNombreValido && isEmailValido && isPasswordValido) {
        // Si todo es válido
        form.style.display = 'none';
        const h2 = document.createElement('h2');
        h2.textContent = '¡Inscripción completada!';
        document.body.appendChild(h2);
    }
});

// Inicializar el total al cargar la página
actualizarTotal();
