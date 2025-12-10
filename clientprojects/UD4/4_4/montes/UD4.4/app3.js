//! Validación en Vivo y al Salir (Criterios d, f, g):
//  Email: Al salir (blur), valida con Regex. Si falla, muestra error en #error-email y añade clase .error al input.
//  Contraseña: Al teclear (input), valida con Regex (mín 8, 1 mayús, 1 núm). Si falla, muestra error en #error-password y añade clase .error.
//  Nombre: Al salir (blur), comprueba que no esté vacío (value.trim() === ""). Si falla, muestra error.
/**
 * CONTANTES
 * Disponer la constantes como un Enum, mejor mantenimiento.
 */
const REGEX = {
  EMAIL: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
  PASSWORD: /^(?=.*\d)(?=.*[A-Z]).{8,}$/,
};

const UI_CONFIG = {
  CLASE_ERROR: "error",
  CLASE_VALIDO: "valido",
  PRECIO_EXTRA: 50,
};

// Referencia del DOM en un objeto
const user = {
  name: document.getElementById("nombre"),
  email: document.getElementById("email"),
  password: document.getElementById("password"),
  selectEntrada: document.getElementById("tipo-entrada"),
  checkboxes: document.querySelectorAll("input[type='checkbox']"),
  form: document.getElementById("form-inscripcion"),
  displayTotal: document.getElementById("resumen-total"),
};

/**
 * HELPER: Gestión de estado visual (UI)
 * Se encarga de pintar el error o limpiar el campo.
 * @param {HTMLElement} input - El elemento input a modificar.
 * @param {string} errorId - El ID del span donde va el mensaje.
 * @param {boolean} isValid - Si la validación pasó o no.
 * @param {string} msg - El mensaje de error a mostrar si falla.
 */
const setFieldState = (input, errorID, isValid, msg) => {
  const errorElemento = document.getElementById(errorID);
  input.classList.toggle(UI_CONFIG.CLASE_ERROR, !isValid);
  input.classList.toggle(UI_CONFIG.CLASE_VALIDO, isValid);
  errorElemento.textContent = isValid ? "" : msg;

  return isValid;
};

/**
 * VALIDACIONES INDIVIDUALES:
 * Validar Nombre
 * Validar Email
 * Validar Password
 */
const validarNombre = () => {
  // Trim para evitar que "   " sea válido
  const isValid = user.name.value.trim() !== "";
  return setFieldState(user.name, "error-nombre", isValid, "El nombre es obligatorio");
};

const validarEmail = () => {
  const isValid = REGEX.EMAIL.test(user.email.value);
  return setFieldState(user.email, "error-email", isValid, "Email inválido");
};

const validarPassword = () => {
  const isValid = REGEX.PASSWORD.test(user.password.value);
  return setFieldState(user.password, "error-password", isValid, "Mín. 8 caracteres, 1 mayúscula, 1 número");
};

//! Cálculo Dinámico de Coste (Criterios c, e):
//  Crea una función actualizarTotal().
//  Esta función debe leer el valor del <select> y sumar 50€ por cada checkbox (.checked).
//  Muestra el resultado en #resumen-total.
//  Añade listeners para que actualizarTotal() se ejecute en el evento change del select y de ambos checkboxes.

const actualizarTotal = () => {
  let total = Number(user.selectEntrada.value) || 0;

  user.checkboxes.forEach(checkbox => {
    if (checkbox.checked) {
      const valorExtra = Number(checkbox.value) || UI_CONFIG.PRECIO_EXTRA;
      total += valorExtra;
    }
  })

  user.displayTotal.textContent = `Total a pagar: ${total}€`;
}

/**
 * LISTENERS:
 */

//? Validación
user.name.addEventListener("blur", validarNombre);
user.email.addEventListener("blur", validarEmail);
user.password.addEventListener("input", validarPassword);

//? Actualizar el Total
user.selectEntrada.addEventListener("change", actualizarTotal);
user.checkboxes.forEach(checkbox => {
  checkbox.addEventListener("change", actualizarTotal);
});

//! Gestión del Envío (Criterios a, b, f):
//  Añade un listener al evento submit del <form>.
//  ¡Importante! Llama a event.preventDefault() al inicio del listener para evitar que la página se recargue.
//  Vuelve a ejecutar todas las validaciones (Nombre, Email, Password).
//  Si todas son correctas, oculta el formulario y muestra un <h2> con "¡Inscripción completada!".
//  Si alguna falla, no envíes el formulario y asegúrate de que los mensajes de error son visibles.

//? Submit 
user.form.addEventListener("submit", (e) => {
  e.preventDefault();

  const isValid = validarNombre() && validarEmail() && validarPassword();

  if (isValid) {
    user.form.style.display = "none";

    const msgExito = document.createElement("h2");
    msgExito.textContent = "¡Inscripción completada!";

    user.form.parentNode.appendChild(msgExito);

    setTimeout(() => {
      msgExito.remove();
      user.form.style.display = "block";
    }, 3000);
  } else {
    actualizarTotal();
  }
});

actualizarTotal();

