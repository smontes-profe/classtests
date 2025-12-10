// --- app3.js ---

// Referencias y configuración
const form = document.getElementById('form-inscripcion');
const nombreInput = document.getElementById('nombre');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const tipoEntradaSelect = document.getElementById('tipo-entrada');
const talleresCheckboxes = document.querySelectorAll('input[name="taller"]');
const resumenTotal = document.getElementById('resumen-total');
const errorNombre = document.getElementById('error-nombre');
const errorEmail = document.getElementById('error-email');
const errorPassword = document.getElementById('error-password');

// Regex
const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
// Mínimo 8 chars, 1 mayúscula, 1 número
const regexPassword = /^(?=.*[A-Z])(?=.*\d).{8,}$/;


// --- Validaciones ---


// Función helper para mostrar/ocultar errores
function gestionarFeedback(inputElement, errorElement, mensaje) {
    if (mensaje) {
        inputElement.classList.add('error');
        errorElement.textContent = mensaje;
        return false;
    }
    inputElement.classList.remove('error');
    errorElement.textContent = "";
    return true;
}

// Valida que haya nombre
function validarNombre() {
    const valor = nombreInput.value.trim();
    return gestionarFeedback(
        nombreInput,
        errorNombre,
        valor === "" ? "El nombre completo no puede estar vacío." : ""
    );
}

// Valida formato email
function validarEmail() {
    const valor = emailInput.value.trim();
    return gestionarFeedback(
        emailInput,
        errorEmail,
        regexEmail.test(valor) ? "" : "El formato del email es incorrecto."
    );
}

// Valida contraseña segura
function validarPassword() {
    const valor = passwordInput.value;
    return gestionarFeedback(
        passwordInput,
        errorPassword,
        regexPassword.test(valor) ? "" : "Mín. 8 caracteres, 1 mayúscula y 1 número."
    );
}


// --- Costes ---


// Recalcula el total sumando entrada + talleres
function actualizarTotal() {
    // Precio base
    let total = parseInt(tipoEntradaSelect.value) || 0;

    // +50 por taller
    talleresCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            total += parseInt(checkbox.value); // Son 50 cada uno
        }
    });

    // Actualizamos texto
    resumenTotal.textContent = `Total a Pagar: ${total}€`;
}


// --- Listeners ---


// Validamos al salir del campo (o al escribir en password)
nombreInput.addEventListener('blur', validarNombre);
emailInput.addEventListener('blur', validarEmail);
passwordInput.addEventListener('input', validarPassword);

// Recalcular si cambian opciones
tipoEntradaSelect.addEventListener('change', actualizarTotal);
talleresCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', actualizarTotal);
});

// Total inicial
actualizarTotal();


// --- Submit ---


// Manejo del envío
form.addEventListener('submit', (event) => {
    // Que no recargue
    event.preventDefault();

    // Validamos todo de nuevo
    const nombreValido = validarNombre();
    const emailValido = validarEmail();
    const passwordValido = validarPassword();

    // Si todo ok...
    if (nombreValido && emailValido && passwordValido) {

        const totalFinal = resumenTotal.textContent;

        // Escondemos form
        form.style.display = 'none';

        // Mensaje final
        const mensajeFinal = document.createElement('h2');
        mensajeFinal.textContent = `🎉 ¡Inscripción completada! Gracias, ${nombreInput.value}. ${totalFinal} serán cobrados.`;
        document.body.appendChild(mensajeFinal);

    } else {
        // Si falla algo, focus al primero con error
        if (!nombreValido) nombreInput.focus();
        else if (!emailValido) emailInput.focus();
        else if (!passwordValido) passwordInput.focus();

        alert('Por favor, corrige los errores marcados antes de inscribirte.');
    }
});