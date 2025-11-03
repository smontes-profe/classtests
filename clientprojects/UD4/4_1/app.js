/* --- app.js --- */

// --- Ejercicio 1: Selección de Elementos ---
const titulo = document.getElementById('titulo-principal');
const subtitulo = document.querySelector('.subtitulo');
const miniaturas = document.querySelectorAll('.thumb');
const btnAnadir = document.getElementById('btn-add-task');

// Imprimir por consola
console.log('Ejercicio 1:');
console.log(titulo.textContent);
console.log(subtitulo.textContent);
console.log(miniaturas);
console.log(btnAnadir);

// --- Ejercicio 2: El Interruptor ---
const btnToggle = document.getElementById('btn-toggle');
const bombilla = document.getElementById('light-bulb');

btnToggle.addEventListener('click', () => {
    bombilla.classList.toggle('luz-apagada');
    bombilla.classList.toggle('luz-encendida');
});

// --- Ejercicio 3: Editor de Perfil ---
const profileName = document.querySelector('.profile-name');
const profileDesc = document.querySelector('.profile-desc');
const profileCard = document.getElementById('profile-card');

profileName.textContent = 'Mi Nombre de Alumno';
profileDesc.textContent = 'Estudiante de 2º de DAW';
profileCard.setAttribute('data-user-id', 'DWEC-001');

// --- Ejercicio 4: Galería de Imágenes ---
const mainImage = document.getElementById('main-image');
const thumbs = document.querySelectorAll('.thumb'); // Ya seleccionadas en Ej 1 (miniaturas)

thumbs.forEach(thumb => {
    thumb.addEventListener('click', () => {
        mainImage.src = thumb.src;
    });
});

// --- Ejercicio 5: Añadir Tareas ---
const inputTask = document.getElementById('input-new-task');
const taskList = document.getElementById('task-list');
// btnAnadir ya está seleccionado en Ej 1

btnAnadir.addEventListener('click', () => {
    const tareaTexto = inputTask.value.trim(); // .trim() quita espacios en blanco

    if (tareaTexto !== "") {
        // 1. Crear el nuevo elemento
        const nuevaLi = document.createElement('li');
        
        // 2. Establecer su contenido
        nuevaLi.textContent = tareaTexto;
        
        // 3. Añadirlo a la lista
        taskList.appendChild(nuevaLi);
        
        // 4. Limpiar el input
        inputTask.value = "";
    }
});

// --- Ejercicio 6: El Modal ---
const modal = document.getElementById('modal');
const btnOpenModal = document.getElementById('btn-open-modal');
const btnCloseModal = document.getElementById('btn-close-modal');

btnOpenModal.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

btnCloseModal.addEventListener('click', () => {
    modal.classList.add('hidden');
});

// --- Ejercicio 7: Notificación Avanzada ---
const statusBox = document.getElementById('status-box');

// Cambiar el contenido inicial
statusBox.innerHTML = '<strong>Estado:</strong> <span class="status-success">Conectado</span>';

// Programar el cambio 3 segundos después
setTimeout(() => {
    // Seleccionamos el span que ACABAMOS de crear
    const statusSpan = statusBox.querySelector('.status-success');
    
    if (statusSpan) {
        // Cambiamos su clase
        statusSpan.classList.remove('status-success');
        statusSpan.classList.add('status-error');
        
        // Cambiamos su texto
        statusSpan.textContent = 'Desconectado';
    }
}, 3000); // 3000 milisegundos = 3 segundos

// --- Ejercicio 8: Preguntas Teóricas ---

/*
 * RESPUESTAS A PREGUNTAS TEÓRICAS:
 *
 * 1. Criterio (h): ¿Por qué es preferible usar `elemento.classList.add('mi-clase')` 
 * en lugar de `elemento.style.color = 'blue'`?
 *
 * Es preferible usar `.classList` para mantener la "Separación de Capas" 
 * (Criterio h).
 * - El CSS (`style.css`) debe ser el único responsable de la *apariencia* (el "qué aspecto tiene").
 * - El JS (`app.js`) debe ser el único responsable del *comportamiento* (el "cuándo cambia").
 * - Al usar `elemento.style`, el JS está "invadiendo" el terreno del CSS y 
 * creando estilos "inline" en el HTML, lo cual es difícil de mantener, 
 * sobrescribir (por la alta especificidad) y rompe este principio fundamental.
 *
 * 2. Criterios (f, g, e): ¿Cuál es la forma estándar de añadir un evento 
 * (como un clic) a un botón? ¿Por qué esta forma es mejor para la compatibilidad 
 * entre navegadores (Criterio g) que poner `onclick="miFuncion()"` en el HTML?
 *
 * La forma estándar es usando `elemento.addEventListener('click', miFuncion)`.
 * Es mejor por varias razones:
 * a) Separación de Capas (Criterio h): Al igual que en la pregunta 1, 
 * el `onclick` en el HTML mezcla comportamiento (JS) con estructura (HTML). 
 * `addEventListener` lo mantiene todo en el archivo .js.
 * b) Compatibilidad (f, g): `addEventListener` es el estándar del W3C (DOM Nivel 2), 
 * implementado por todos los navegadores modernos. Antiguamente, IE usaba 
 * `attachEvent`, pero hoy en día `addEventListener` es la forma universal 
 * y garantiza que el código funcione en todos los navegadores (Criterio g).
 * c) Flexibilidad: `addEventListener` permite añadir *múltiples* funciones 
 * al mismo evento en el mismo elemento, mientras que `onclick` solo 
 * permite una.
 */