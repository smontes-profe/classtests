
// Ejercicio 1: Selección de Elementos
const tituloPrincipal = document.getElementById('titulo-principal');
const primerSubtitulo = document.querySelector('.subtitulo');
const listImages = document.querySelectorAll('img.thumb');
const btnAddTask = document.querySelector('#btn-add-task'); // También vale getElementById

console.log('--- Ejercicio 1 ---');
console.log('Título Principal:', tituloPrincipal ? tituloPrincipal.textContent : 'No encontrado');
console.log('Primer Subtítulo:', primerSubtitulo ? primerSubtitulo.textContent : 'No encontrado');
console.log('Miniaturas (NodeList):', listImages);
// Para imprimir el texto de las imágenes, iteramos o mostramos la colección
if (listImages.length > 0) {
    listImages.forEach((img, index) => console.log(`Texto alt miniatura ${index + 1}:`, img.alt));
}
console.log('Botón Añadir Tarea:', btnAddTask ? btnAddTask.textContent : 'No encontrado');


// Ejercicio 2: El Interruptor
const btnToggle = document.getElementById('btn-toggle');
const lightBulb = document.getElementById('light-bulb');

if (btnToggle && lightBulb) {
    btnToggle.addEventListener('click', () => {
        // Intercambiar clases
        lightBulb.classList.toggle('luz-apagada');
        lightBulb.classList.toggle('luz-encendida');
    });
}


// Ejercicio 3: Editor de Perfil
const profileName = document.querySelector('.profile-name');
const profileDesc = document.querySelector('.profile-desc');
const profileCard = document.getElementById('profile-card');

if (profileName) profileName.textContent = "Alberto Estepa Gómez";
if (profileDesc) profileDesc.textContent = "Estudiante de 2º de DAW";
if (profileCard) profileCard.setAttribute('data-user-id', 'DWEC-001');


// Ejercicio 4: Galería de Imágenes
const mainImage = document.getElementById('main-image');
const thumbs = document.querySelectorAll('.thumb'); // Ya seleccionado en Ej. 1, pero lo reafirmo por claridad

if (mainImage && thumbs.length > 0) {
    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => {
            mainImage.src = thumb.src;
        });
    });
}


// Ejercicio 5: Añadir Tareas
const inputNewTask = document.getElementById('input-new-task');
const taskList = document.getElementById('task-list');

if (btnAddTask && inputNewTask && taskList) {
    btnAddTask.addEventListener('click', () => {
        const value = inputNewTask.value;
        if (value.trim() !== "") { // Comprobamos que no esté vacío o solo espacios
            const newLi = document.createElement('li');
            newLi.textContent = value;
            taskList.appendChild(newLi);
            inputNewTask.value = ""; // Limpiar input
        }
    });
}


// Ejercicio 6: El Modal
const modal = document.getElementById('modal');
const btnOpenModal = document.getElementById('btn-open-modal');
const btnCloseModal = document.getElementById('btn-close-modal');

if (modal && btnOpenModal && btnCloseModal) {
    btnOpenModal.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    btnCloseModal.addEventListener('click', () => {
        modal.classList.add('hidden');
    });
}


// Ejercicio 7: Notificación Avanzada
const statusBox = document.getElementById('status-box');

if (statusBox) {
    // Cambio inicial
    statusBox.innerHTML = '<strong>Estado:</strong> <span class="status-success">Conectado</span>';

    // Cambio a los 3 segundos
    setTimeout(() => {
        // Buscamos el span interno recién creado por su clase
        const statusSpan = statusBox.querySelector('.status-success');
        if (statusSpan) {
            statusSpan.classList.remove('status-success');
            statusSpan.classList.add('status-error');
            statusSpan.textContent = 'Desconectado';
        }
    }, 3000);
}


/*
// Ejercicio 8: Preguntas Teóricas

Criterio (h): ¿Por qué es preferible usar elemento.classList.add('mi-clase') en lugar de elemento.style.color = 'blue' para cambiar la apariencia de un elemento?

   Es preferible usar `classList` porque permite mantener una separación clara de preocupaciones (Separation of Concerns). 
   HTML define la estructura, CSS el estilo y JS el comportamiento. 
   Al usar clases, javascript solo indica "qué estado" tiene el elemento, y el css define "cómo se ve" ese estado. 
   Esto hace que el código sea más mantenible, reutilizable (puedes cambiar el CSS sin tocar javscript) y evita problemas de especificidad CSS que surgen con estilos en línea (inline styles).

Criterios (f, g, e): ¿Cuál es la forma estándar de añadir un evento (como un clic) a un botón? ¿Por qué esta forma es mejor para la compatibilidad entre navegadores (Criterio g) que poner onclick="miFuncion()" directamente en el HTML?

   La forma estándar es usar `addEventListener`. 
   Es mejor que `onclick` en el HTML por varias razones:
   1. Permite añadir múltiples manejadores (listeners) al mismo evento en el mismo elemento sin sobrescribirse entre sí.
   2. Mantiene el HTML limpio y semántico, separando la lógica (JS) de la estructura (HTML).
   3. Ofrece mayor control sobre el evento (fase de captura, burbujeo, ejecutar una sola vez con `once: true`, etc.).
*/
