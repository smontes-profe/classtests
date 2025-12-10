/**
 * Expresión regular para validar formato de email
 * @type {RegExp}
 */
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

/**
 * Expresión regular para validar contraseña
 * Requisitos: mínimo 8 caracteres, al menos 1 mayúscula, al menos 1 número
 * @type {RegExp}
 */
const regexPassword = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

/**
 * Valida el campo de nombre (no vacío)
 * @returns {boolean} - True si el nombre es válido, false en caso contrario
 */
function validarNombre() {
    const nombre = document.getElementById('nombre');
    const errorNombre = document.getElementById('error-nombre');
    
    if (nombre.value.trim() === '') {
        nombre.classList.add('error');
        errorNombre.textContent = 'El nombre es obligatorio';
        return false;
    } else {
        nombre.classList.remove('error');
        errorNombre.textContent = '';
        return true;
    }
}

/**
 * Valida el campo de email usando expresión regular
 * @returns {boolean} - True si el email es válido, false en caso contrario
 */
function validarEmailCampo() {
    const email = document.getElementById('email');
    const errorEmail = document.getElementById('error-email');
    
    if (!regexEmail.test(email.value)) {
        email.classList.add('error');
        errorEmail.textContent = 'El email no tiene un formato válido';
        return false;
    } else {
        email.classList.remove('error');
        errorEmail.textContent = '';
        return true;
    }
}

/**
 * Valida el campo de contraseña usando expresión regular
 * Requisitos: mínimo 8 caracteres, 1 mayúscula, 1 número
 * @returns {boolean} - True si la contraseña es válida, false en caso contrario
 */
function validarPassword() {
    const password = document.getElementById('password');
    const errorPassword = document.getElementById('error-password');
    
    if (!regexPassword.test(password.value)) {
        password.classList.add('error');
        errorPassword.textContent = 'La contraseña debe tener al menos 8 caracteres, 1 mayúscula y 1 número';
        return false;
    } else {
        password.classList.remove('error');
        errorPassword.textContent = '';
        return true;
    }
}

/**
 * Calcula y actualiza el total a pagar basándose en el tipo de entrada y talleres seleccionados
 */
function actualizarTotal() {
    const tipoEntrada = document.getElementById('tipo-entrada');
    const tallerJS = document.getElementById('taller-js');
    const tallerCSS = document.getElementById('taller-css');
    const resumenTotal = document.getElementById('resumen-total');
    
    // Obtener el valor base de la entrada
    let total = parseInt(tipoEntrada.value);
    
    // Sumar talleres adicionales si están seleccionados
    if (tallerJS.checked) {
        total += parseInt(tallerJS.value);
    }
    
    if (tallerCSS.checked) {
        total += parseInt(tallerCSS.value);
    }
    
    // Actualizar el texto del resumen
    resumenTotal.textContent = `Total a Pagar: ${total}€`;
}

/**
 * Maneja el envío del formulario, validando todos los campos
 * @param {Event} event - El objeto del evento submit
 */
function manejarEnvio(event) {
    // Prevenir el envío por defecto del formulario
    event.preventDefault();
    
    // Ejecutar todas las validaciones
    const nombreValido = validarNombre();
    const emailValido = validarEmailCampo();
    const passwordValido = validarPassword();
    
    // Si todas las validaciones son correctas
    if (nombreValido && emailValido && passwordValido) {
        // Ocultar el formulario
        const formulario = document.getElementById('form-inscripcion');
        formulario.style.display = 'none';
        
        // Mostrar mensaje de éxito
        const mensajeExito = document.createElement('h2');
        mensajeExito.textContent = '¡Inscripción completada!';
        mensajeExito.style.color = 'white';
        mensajeExito.style.textAlign = 'center';
        mensajeExito.style.marginTop = '50px';
        mensajeExito.style.backgroundColor = 'green';
        mensajeExito.style.padding = '20px';
        mensajeExito.style.borderRadius = '10px';
        
        // Añadir el mensaje al body después del formulario
        formulario.parentNode.insertBefore(mensajeExito, formulario.nextSibling);
    } else {
        // Si hay errores, no hacer nada (los mensajes ya están visibles)
        console.log('Formulario contiene errores. Por favor, corrígelos antes de enviar.');
    }
}

/**
 * Inicializa todos los event listeners del formulario de inscripción
 */
function inicializar() {
    // Obtener elementos del DOM
    const formulario = document.getElementById('form-inscripcion');
    const nombre = document.getElementById('nombre');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const tipoEntrada = document.getElementById('tipo-entrada');
    const tallerJS = document.getElementById('taller-js');
    const tallerCSS = document.getElementById('taller-css');
    
    // Validación en vivo y al salir
    nombre.addEventListener('blur', validarNombre);
    email.addEventListener('blur', validarEmailCampo);
    password.addEventListener('input', validarPassword);
    
    // Cálculo dinámico del total
    tipoEntrada.addEventListener('change', actualizarTotal);
    tallerJS.addEventListener('change', actualizarTotal);
    tallerCSS.addEventListener('change', actualizarTotal);
    
    // Gestión del envío del formulario
    formulario.addEventListener('submit', manejarEnvio);
    
    // Inicializar el total con el valor por defecto
    actualizarTotal();
}

// Iniciar cuando el DOM esté completamente cargado
inicializar();
