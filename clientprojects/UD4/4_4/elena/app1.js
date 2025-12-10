
// Ejercicio 1: El Laboratorio de Eventos

document.addEventListener('DOMContentLoaded', () => {
  const zonaMouse = document.getElementById('zona-mouse') || document.getElementById('zona-sensible');
  const inputTexto = document.getElementById('input-texto') || document.getElementById('input-teclado');
  const logUl = document.getElementById('log') || document.getElementById('log-eventos');

  // Función log
  function log(mensaje) {
    const li = document.createElement('li');
    const time = new Date().toLocaleTimeString();
    li.textContent = `[${time}] ${mensaje}`;
    logUl.prepend(li); // lo más reciente primero
  }



  // Eventos de Ratón
  if (zonaMouse) {
    zonaMouse.addEventListener('mouseenter', (e) => {
      zonaMouse.classList.add('highlight');
      log('Ratón Entró — event.type: ' + e.type + ', target: ' + e.target.tagName);
    });

    zonaMouse.addEventListener('mouseleave', (e) => {
      zonaMouse.classList.remove('highlight');
      log('Ratón Salió — event.type: ' + e.type + ', target: ' + e.target.tagName);
    });

    zonaMouse.addEventListener('click', (e) => {
      log('Clic — button: ' + (e.button ?? 'unknown') + ', target: ' + e.target.id);
    });

    let lastMouseMove = 0;
    const throttleMs = 80;
    zonaMouse.addEventListener('mousemove', (e) => {
      const now = Date.now();
      if (now - lastMouseMove < throttleMs) return;
      lastMouseMove = now;

      // Posición relativa al elemento
      const rect = zonaMouse.getBoundingClientRect();
      const posX = Math.round(e.clientX - rect.left);
      const posY = Math.round(e.clientY - rect.top);
      log(`Ratón moviéndose en X: ${posX}, Y: ${posY}`);
    });
  }



  // Eventos de Teclado
  if (inputTexto) {
    inputTexto.addEventListener('focus', (e) => {
      log('Input enfocado — id: ' + e.target.id);
    });

    inputTexto.addEventListener('blur', (e) => {
      log('Input desenfocado — id: ' + e.target.id);
    });

    inputTexto.addEventListener('keydown', (e) => {
      log(`Tecla pulsada: ${e.key}`);
    });

    inputTexto.addEventListener('keyup', (e) => {
      log(`Tecla soltada: ${e.code}`);
    });
  }
});


