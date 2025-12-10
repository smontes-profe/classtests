"use strict";

// PARTE 1

// Expresiones Regulares
const regexMail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const regexPassword = /^(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{8,}$/;
const regexName = /^(?!\s*$).+/;

// Elementos del DOM (Inputs y Errores)
const inputMail = document.getElementById("email");
const spanMail = document.getElementById("error-email");

const inputPass = document.getElementById("password");
const spanPass = document.getElementById("error-password");

const inputName = document.getElementById("nombre");
const spanName = document.getElementById("error-nombre");

const selectEntrada = document.getElementById("tipo-entrada");
const checkBoxTotal = document.querySelectorAll("input[name=taller]");
const divResumenTotal = document.getElementById("resumen-total");

const formElement = document.getElementById("form-inscripcion");

// PARTE 2

/**
 * Valida un campo input comparando su valor con una expresión regular.
 * Muestra u oculta el mensaje de error y la clase CSS visual.
 * @param {RegExp} regex - La expresión regular para la validación.
 * @param {HTMLElement} span - El elemento donde se muestra el mensaje de error.
 * @param {string} mensajeError - El texto a mostrar si falla la validación.
 * @returns {boolean} - True si es válido, False si falla.
 */
const validarCampo = (input, regex, span, mensajeError) => {
  // .trim() asegura que no contemos espacios en blanco al inicio/final (opcional si la regex ya lo cubre)
  if (!regex.test(input.value)) {
    span.textContent = mensajeError;
    input.classList.add("error");
    return false;
  } else {
    span.textContent = "";
    input.classList.remove("error");
    return true;
  }
};

// Listeners de validación

// Nombre: Evento 'blur' (Al salir)
inputName.addEventListener("blur", () => {
  validarCampo(inputName, regexName, spanName, "El nombre es obligatorio");
});

// Email: Evento 'blur' (Al salir)
inputMail.addEventListener("blur", () => {
  validarCampo(inputMail, regexMail, spanMail, "Formato de correo inválido");
});

// Contraseña: Evento 'input' 
inputPass.addEventListener("input", () => {
  validarCampo(
    inputPass,
    regexPassword,
    spanPass,
    "Mínimo 8 chars, 1 mayúscula, 1 número"
  );
});


// PARTE 3

/**
 * Calcula el total sumando el tipo de entrada y los talleres seleccionados.
 * Actualiza el texto en el DOM.
 */
function actualizarTotal() {
  // Obtenemos valor del select
  const valorEntrada = parseFloat(selectEntrada.value) || 0;

  // Sumamos los checkboxes marcados usando reduce
  const valorCheckTotal = Array.from(checkBoxTotal).reduce(
    (total, checkBox) => {
      // Si está checked suma el valor, si no, suma 0
      return total + (checkBox.checked ? parseFloat(checkBox.value) : 0);
    },
    0
  );

  const valorTotalCompra = valorCheckTotal + valorEntrada;

  // Actualizamos el DOM
  divResumenTotal.textContent = `Total a Pagar: ${valorTotalCompra}€`;
}

// Listeners para recálculo
selectEntrada.addEventListener("change", actualizarTotal);

checkBoxTotal.forEach((checkBox) => {
  checkBox.addEventListener("change", actualizarTotal);
});


// PARTE 4

formElement.addEventListener("submit", (event) => {
  // Evitar el envío real
  event.preventDefault();

  // Re-validar todo al momento de enviar
  const vNombre = validarCampo(inputName, regexName, spanName, "El nombre es obligatorio");
  const vMail = validarCampo(inputMail, regexMail, spanMail, "Correo inválido");
  const vPass = validarCampo(inputPass, regexPassword, spanPass, "Contraseña inválida");

  // 3. Comprobar si todo es válido
  if (vNombre && vMail && vPass) {
    
    // Crear mensaje de éxito
    const h2Element = document.createElement("h2");
    h2Element.textContent = "¡Inscripción completada!";


    // Ocultar el formulario
    formElement.innerHTML = ""; 
    formElement.appendChild(h2Element);
    
  } else {
    // Si falla, feedback al usuario
    alert("Error en el formulario, por favor revisa los campos marcados en rojo.");
  }
});