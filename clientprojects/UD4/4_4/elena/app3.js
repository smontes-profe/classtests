
// Ejercicio 3: Formulario de Inscripción

document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('form-inscripcion'); // Formulario
  if (!form) return;

  const nombre = document.getElementById('nombre');
  const email = document.getElementById('email');
  const password = document.getElementById('password');
  const tipoEntrada = document.getElementById('tipo-entrada');
  const tallerJS = document.getElementById('taller-js');
  const tallerCSS = document.getElementById('taller-css');
  const resumen = document.getElementById('resumen-total');

  const errorNombre = document.getElementById('error-nombre');
  const errorEmail = document.getElementById('error-email');
  const errorPassword = document.getElementById('error-password');


  // Regexs
  const regexEmail = /^\S+@\S+\.\S+$/;

  // mínimo 8, al menos 1 mayúscula y 1 número
  const regexPassword = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

  // Validación
  function validarNombre() {
    const val = nombre.value.trim();
    if (val === '') {
      nombre.classList.add('error');
      if (errorNombre) errorNombre.textContent = 'Nombre inválido';
      return false;
    } else {
      nombre.classList.remove('error');
      if (errorNombre) errorNombre.textContent = '';
      return true;
    }
  }

  function validarEmail(showMessage = true) {
    const val = email.value.trim();
    if (!regexEmail.test(val)) {
      email.classList.add('error');
      if (errorEmail && showMessage) errorEmail.textContent = 'Email inválido';
      return false;
    } else {
      email.classList.remove('error');
      if (errorEmail) errorEmail.textContent = '';
      return true;
    }
  }

  function validarPassword(showMessage = true) {
    const val = password.value;
    if (!regexPassword.test(val)) {
      password.classList.add('error');
      if (errorPassword && showMessage) errorPassword.textContent = 'La contraseña debe tener mínimo 8 caracteres, 1 mayúscula y 1 número';
      return false;
    } else {
      password.classList.remove('error');
      if (errorPassword) errorPassword.textContent = '';
      return true;
    }
  }


  // Calcular total
  function actualizarTotal() {
    const base = parseInt(tipoEntrada.value || '0', 10);
    let total = base;
    if (tallerJS && tallerJS.checked) total += parseInt(tallerJS.value || '0', 10);
    if (tallerCSS && tallerCSS.checked) total += parseInt(tallerCSS.value || '0', 10);
    if (resumen) resumen.textContent = `Pagar: ${total}€`;
    return total;
  }


  // Listeners
  nombre.addEventListener('blur', validarNombre);
  email.addEventListener('blur', () => validarEmail(true));
  password.addEventListener('input', () => validarPassword(false)); // validación en vivo

  // Listeners para actualizar total
  tipoEntrada.addEventListener('change', actualizarTotal);
  if (tallerJS) tallerJS.addEventListener('change', actualizarTotal);
  if (tallerCSS) tallerCSS.addEventListener('change', actualizarTotal);

  // Se ejecuta al cargar
  actualizarTotal();

  // Envío
  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const okNombre = validarNombre();
    const okEmail = validarEmail(true);
    const okPassword = validarPassword(true);

    // Si todo ok :)
    if (okNombre && okEmail && okPassword) {
      form.style.display = 'none';
      const mensaje = document.createElement('h2');
      mensaje.textContent = 'Inscripción completada';
      form.parentNode.insertBefore(mensaje, form.nextSibling);
    } else {
      const primerError = form.querySelector('.error');
      if (primerError) primerError.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  });
});


