// EJERCICIO 1: Selección de Elementos

// Guardo el elemento con ID titulo-principal
const tituloPrincipal = document.getElementById('titulo-principal');

// Guardo el primer elemento con clase subtitulo
const subtitulo = document.querySelector('.subtitulo');

// Guardo una NodeList con todos los img que tengan clase thumb
const imgList = document.querySelectorAll('img.thumb');

// Guardo el botón con ID btn-add-task
const btnAddTask = document.getElementById('btn-add-task');

// Imprimo por consola el contenido de texto
console.log('Título principal:', tituloPrincipal.textContent);
console.log('Subtítulo:', subtitulo.textContent);
console.log('Thumbnails:', imgList);
console.log('Botón añadir tarea:', btnAddTask.textContent);


// EJERCICIO 2: El Interruptor

const btnToggle = document.getElementById('btn-toggle');
const lightBulb = document.getElementById('light-bulb');

btnToggle.addEventListener('click', function () {
    // Intercambio las clases luz-apagada y luz-encendida
    lightBulb.classList.toggle('luz-apagada');
    lightBulb.classList.toggle('luz-encendida');
});


// EJERCICIO 3: Editor de Perfil

// Cambio el nombre del perfil
const profileName = document.querySelector('.profile-name');
profileName.textContent = 'Mi Nombre de Alumno';

// Cambio la descripción
const profileDesc = document.querySelector('.profile-desc');
profileDesc.textContent = 'Estudiante de 2º de DAW';

// Cambio el atributo data-user-id
const profileCard = document.getElementById('profile-card');
profileCard.setAttribute('data-user-id', 'DWEC-001');


// EJERCICIO 4: Galería de Imágenes

const mainImage = document.getElementById('main-image');
const thumbs = document.querySelectorAll('.thumb');

// Añado evento click a cada miniatura
thumbs.forEach(function (thumb) {
    thumb.addEventListener('click', function () {
        // Cambio el src de la imagen principal por el de la miniatura clicada
        mainImage.src = thumb.src;
    });
});


// EJERCICIO 5: Añadir Tareas

const inputNewTask = document.getElementById('input-new-task');
const taskList = document.getElementById('task-list');

btnAddTask.addEventListener('click', function () {
    // Leo el valor del input
    const taskValue = inputNewTask.value;

    // Compruebo que no esté vacío
    if (taskValue !== '') {
        // Creo un nuevo elemento li
        const newTask = document.createElement('li');

        // Establezco el texto del li
        newTask.textContent = taskValue;

        // Añado el li a la lista
        taskList.appendChild(newTask);

        // Limpio el input
        inputNewTask.value = '';
    }
});


// EJERCICIO 6: El Modal

const modal = document.getElementById('modal');
const btnOpenModal = document.getElementById('btn-open-modal');
const btnCloseModal = document.getElementById('btn-close-modal');

// Abrir modal - quito la clase hidden
btnOpenModal.addEventListener('click', function () {
    modal.classList.remove('hidden');
});

// Cerrar modal - añado la clase hidden
btnCloseModal.addEventListener('click', function () {
    modal.classList.add('hidden');
});


// EJERCICIO 7: Notificación Avanzada

const statusBox = document.getElementById('status-box');

// Cambio el contenido con innerHTML
statusBox.innerHTML = '<strong>Estado:</strong> <span class="status-success">Conectado</span>';


// EJERCICIO 8: Preguntas Teóricas

/*
PREGUNTA 1:
¿Por qué es preferible usar classList en lugar de element.style?

RESPUESTA:
Porque así separamos el JavaScript del CSS. Con classList solo gestionamos clases
y los estilos quedan en el archivo CSS. Es más fácil de mantener, permite cambiar
varios estilos a la vez y podemos reutilizar las clases en otros elementos.


PREGUNTA 2:
¿Cuál es la forma estándar de añadir eventos y por qué es mejor que onclick=""?

RESPUESTA:
La forma estándar es addEventListener(), ejemplo:
elemento.addEventListener('click', function() { ... });

Es mejor porque:
- Separa el HTML del JavaScript (mejor organización)
- Permite añadir varios eventos al mismo elemento
- Es el estándar, compatible con todos los navegadores modernos
- Podemos eliminar eventos con removeEventListener si hace falta
*/
