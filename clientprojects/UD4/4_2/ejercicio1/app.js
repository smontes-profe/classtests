/* --- app1.js --- */

// --- 1. Seleccionamos los elementos del DOM ---
const inputTeclado = document.getElementById('input-teclado');
const zonaSensible = document.getElementById('zona-sensible');
const logEventos = document.getElementById('log-eventos');

// --- 2. Función de Log ---
// Una función reutilizable para añadir mensajes a la lista
function log(mensaje) {
  // Creamos un nuevo elemento <li>
  const nuevoLi = document.createElement('li');
  // Le ponemos el mensaje
  nuevoLi.textContent = mensaje;
  
  // Lo añadimos al principio de la lista (log)
  logEventos.prepend(nuevoLi); // .prepend lo añade arriba, .appendChild lo añadiría abajo
}

// --- 3. Eventos de Ratón (en #zona-sensible) ---

zonaSensible.addEventListener('mouseover', () => {
  zonaSensible.classList.add('highlight');
  log('Evento: mouseover (Ratón encima)');
});

zonaSensible.addEventListener('mouseout', () => {
  zonaSensible.classList.remove('highlight');
  log('Evento: mouseout (Ratón fuera)');
});

zonaSensible.addEventListener('click', () => {
  log('Evento: click (Clic normal)');
});

// --- 4. Eventos de Teclado (en #input-teclado) ---

inputTeclado.addEventListener('keydown', (event) => {
  // Usamos event.key para obtener la tecla pulsada
  log(`Evento: keydown (Tecla pulsada: ${event.key})`);
});

inputTeclado.addEventListener('keyup', (event) => {
  log(`Evento: keyup (Tecla soltada: ${event.key})`);
});