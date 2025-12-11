// Ejercicio 1:
const tituloPrincipal = document.querySelector('#titulo-principal');
const primerSubtitulo = document.querySelector('.subtitulo');
const imagenesThumb = document.querySelectorAll('img.thumb');
const btnAddTask = document.querySelector('#btn-add-task');

console.log('Título Principal:', tituloPrincipal.textContent);
console.log('Primer Subtítulo:', primerSubtitulo.textContent);
console.log('Cantidad de thumbnails:', imagenesThumb.length);
console.log('Texto del botón añadir tarea:', btnAddTask.textContent);


// Ejercicio 2:
const btnToggle = document.querySelector('#btn-toggle');
const lightBulb = document.querySelector('#light-bulb');

btnToggle.addEventListener('click', () => {
    lightBulb.classList.toggle('luz-apagada');
    lightBulb.classList.toggle('luz-encendida');
});


// Ejercicio 3:
const profileName = document.querySelector('.profile-name');
profileName.textContent = 'Mi Nombre de Alumno';

const profileDesc = document.querySelector('.profile-desc');
profileDesc.textContent = 'Estudiante de 2º de DAW';

const profileCard = document.querySelector('#profile-card');
profileCard.setAttribute('data-user-id', 'DWEC-001');


// Ejercicio 4:
const mainImage = document.querySelector('#main-image');
const thumbnails = document.querySelectorAll('.thumb');

thumbnails.forEach(thumbnail => {
    thumbnail.addEventListener('click', () => {
        mainImage.src = thumbnail.src;
        mainImage.alt = thumbnail.alt;
    });
});


// Ejercicio 5:
const inputNewTask = document.querySelector('#input-new-task');
const taskList = document.querySelector('#task-list');

btnAddTask.addEventListener('click', () => {
    const taskText = inputNewTask.value.trim();

    if (taskText !== '') {
        const newTask = document.createElement('li');
        newTask.textContent = taskText;
        taskList.appendChild(newTask);
        inputNewTask.value = '';
    }
});

// para el bonus: añadir tarea
inputNewTask.addEventListener('keypress', (event) => {
    if (event.key === 'Enter') {
        btnAddTask.click();
    }
});


// Ejercicio 6:
const modal = document.querySelector('#modal');
const btnOpenModal = document.querySelector('#btn-open-modal');
const btnCloseModal = document.querySelector('#btn-close-modal');

btnOpenModal.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

btnCloseModal.addEventListener('click', () => {
    modal.classList.add('hidden');
});

// Bonus: Cerrar modal al hacer click fuera
modal.addEventListener('click', (event) => {
    if (event.target === modal) {
        modal.classList.add('hidden');
    }
});


// Ejercicio 7:
const statusBox = document.querySelector('#status-box');

statusBox.innerHTML = '<strong>Estado:</strong> <span class="status-success">Conectado</span>';

// Después de 3 segundos cambiar a "Desconectado"
setTimeout(() => {
    const statusSpan = statusBox.querySelector('.status-success');
    statusSpan.classList.remove('status-success');
    statusSpan.classList.add('status-error');
    statusSpan.textContent = 'Desconectado';
}, 3000);


// Ejercicio 8:
// Pregunta 1: Usar classList.add() es mejor para no mezclar JavaScript (lógica) con CSS (estilo).
// Así el código queda más ordenado y es más fácil cambiar el estilo luego.
// Si lo juntas tienes el error de mezclar lógica y estilo, que es lo que no queremos.

// Pregunta 2: addEventListener es el estándar de hoy, funciona en todos los navegadores y te deja poner varias
// funciones al mismo botón sin ensuciar el HTML con el onclick viejo.
