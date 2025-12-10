/**
 * @fileoverview Script para el Ejercicio 3: Formulario de Inscripción a TechConf 2025.
 * Implementa validación en vivo, cálculo dinámico de coste y gestión del evento submit.
 */

// 1. Selección del DOM
const form = document.getElementById('form-inscripcion');
const nombreInput = document.getElementById('nombre');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const tipoEntradaSelect = document.getElementById('tipo-entrada');
const talleresCheckboxes = document.querySelectorAll('input[name="taller"]');
const resumenTotalDiv = document.getElementById('resumen-total');

// Mensajes de error
const errorNombre = document.getElementById('error-nombre');
const errorEmail = document.getElementById('error-email');
const errorPassword = document.getElementById('error-password');


// 2. Definición de Expresiones Regulares
/**
 * Expresión regular simple para validar el formato de un email.
 * @type {RegExp}
 */
const regexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

/**
 * Expresión regular para validar la contraseña: Mínimo 8 caracteres, 1 mayúscula, 1 número.
 * @type {RegExp}
 */
const regexPassword = /^(?=.*[A-Z])(?=.*\d).{8,}$/;


// 3. Funciones de Validación 

/**
 * Muestra u oculta un mensaje de error y aplica/quita la clase 'error' al input.
 * @param {HTMLInputElement} inputEl - El elemento input.
 * @param {HTMLElement} errorEl - El elemento span donde mostrar el error.
 * @param {string} mensaje - El mensaje de error. Si es vacío, oculta el error.
 */
function mostrarError(inputEl, errorEl, mensaje) {
    errorEl.textContent = mensaje;
    if (mensaje) {
        inputEl.classList.add('error');
    } else {
        inputEl.classList.remove('error');
    }
}

/**
 * Valida el campo Nombre: no debe estar vacío. (Criterio g)
 * Se ejecuta en el evento 'blur'.
 * @returns {boolean} True si es válido, False si no.
 */
function validarNombre() {
    const valor = nombreInput.value.trim();
    if (valor === "") {
        mostrarError(nombreInput, errorNombre, 'El nombre completo es obligatorio.');
        return false;
    }
    mostrarError(nombreInput, errorNombre, '');
    return true;
}

/**
 * Valida el campo Email: debe coincidir con la regex. (Criterio g)
 * Se ejecuta en el evento 'blur'.
 * @returns {boolean} True si es válido, False si no.
 */
function validarEmail() {
    const valor = emailInput.value.trim();
    if (!regexEmail.test(valor)) {
        mostrarError(emailInput, errorEmail, 'Introduce un formato de email válido (ej: tu@dominio.com).');
        return false;
    }
    mostrarError(emailInput, errorEmail, '');
    return true;
}

/**
 * Valida el campo Contraseña: debe coincidir con la regex. (Criterio g)
 * Se ejecuta en el evento 'input'.
 * @returns {boolean} True si es válido, False si no.
 */
function validarPassword() {
    const valor = passwordInput.value;
    if (!regexPassword.test(valor)) {
        mostrarError(passwordInput, errorPassword, 'Mín. 8 caracteres, al menos 1 mayúscula y 1 número.');
        return false;
    }
    mostrarError(passwordInput, errorPassword, '');
    return true;
}


// 4. Cálculo Dinámico de Coste (Criterios c, e)

/**
 * Calcula el coste total de la inscripción.
 * Lee el valor del select y suma 50€ por cada checkbox marcado.
 * Actualiza el DOM.
 */
function actualizarTotal() {
    // Obtiene el valor base del select y lo convierte a número entero
    let total = parseInt(tipoEntradaSelect.value, 10); 
    
    // Suma el coste de los talleres seleccionados
    talleresCheckboxes.forEach(checkbox => {
        if (checkbox.checked) {
            total += parseInt(checkbox.value, 10); 
        }
    });

    // Actualiza el DOM
    resumenTotalDiv.textContent = `Total a Pagar: ${total}€`;
}


// 5. Asignación de Listeners (Criterio c, f)

// Validación
nombreInput.addEventListener('blur', validarNombre); 
emailInput.addEventListener('blur', validarEmail);   
passwordInput.addEventListener('input', validarPassword); 

// Cálculo Dinámico
tipoEntradaSelect.addEventListener('change', actualizarTotal); 
talleresCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', actualizarTotal); 
});

// Inicializar el total al cargar la página
document.addEventListener('DOMContentLoaded', actualizarTotal);


// 6. Gestión del Envío del Formulario (Criterios a, b, f)

/**
 * Manejador para el evento 'submit' del formulario.
 * Previene el envío por defecto, ejecuta las validaciones y gestiona el resultado.
 * @param {SubmitEvent} event - El objeto de evento de envío.
 */
form.addEventListener('submit', (event) => {
    // Criterio b: Evitar la recarga de la página
    event.preventDefault();

    // Re-ejecutar todas las validaciones
    const nombreValido = validarNombre();
    const emailValido = validarEmail();
    const passwordValido = validarPassword();

    // Comprobar si todas las validaciones son correctas
    if (nombreValido && emailValido && passwordValido) {
        // Éxito:
        
        // Ocultar el formulario
        form.style.display = 'none';

        // Mostrar mensaje de éxito
        const mensajeExito = document.createElement('h2');
        mensajeExito.textContent = '¡Inscripción completada! ✅';
        mensajeExito.style.color = 'green';
        
        // Crear el resumen final
        const resumen = document.createElement('p');
        resumen.innerHTML = `**Gracias ${nombreInput.value}**. Recibirás un correo de confirmación en **${emailInput.value}**. <br>${resumenTotalDiv.textContent}.`;
        
        // Insertar los mensajes antes del formulario
        form.parentNode.insertBefore(mensajeExito, form); 
        form.parentNode.insertBefore(resumen, form);

    } else {
        // Fallo:
        alert('Por favor, corrige los errores marcados antes de inscribirte.');
    }
});