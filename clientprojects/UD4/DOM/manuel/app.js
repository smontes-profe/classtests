// Ejercicio 1

const tituloPrincipal = document.querySelector('#titulo-principal');
const primerSubtitulo = document.querySelector('.subtitulo');
const imagenesThumb = document.querySelectorAll('img.thumb');
const botonAddTask = document.querySelector('#btn-add-task');

console.log(tituloPrincipal.textContent);
console.log(primerSubtitulo.textContent);
console.log(imagenesThumb);
console.log(botonAddTask.textContent);

// Ejercicio 2

const btnToggle = document.querySelector('#btn-toggle');
const bombilla = document.querySelector('#light-bulb');

btnToggle.addEventListener('click', () => {
    bombilla.classList.toggle('luz-apagada');
    bombilla.classList.toggle('luz-encendida');
});


// Ejercico 3

const profileName = document.querySelector('.profile-name');
const profileDesc = document.querySelector('.profile-desc');
const profileCard = document.querySelector('#profile-card');

profileName.textContent = "Mi Nombre de Alumno";
profileDesc.textContent = "Estudiante de 2º de DAW";
profileCard.setAttribute('data-user-id', 'DWEC-001');


// Ejercicio 4

const imagenPrincipal = document.querySelector('#main-image');
const miniaturas = document.querySelectorAll('.thumb');

miniaturas.forEach(thumb => {
    thumb.addEventListener('click', () => {
        imagenPrincipal.src = thumb.src;
    });
});


// Ejercicio 5

const btnAdd = document.querySelector('#btn-add-task');
const inputTask = document.querySelector('#input-new-task');
const listaTareas = document.querySelector('#task-list');

btnAdd.addEventListener('click', () => {
    const texto = inputTask.value.trim();

    if (texto !== "") {
        const nuevoLi = document.createElement('li');
        nuevoLi.textContent = texto;
        listaTareas.appendChild(nuevoLi);
        inputTask.value = "";
    }
});


// Ejercicio 6

const modal = document.querySelector('#modal');
const btnOpenModal = document.querySelector('#btn-open-modal');
const btnCloseModal = document.querySelector('#btn-close-modal');

btnOpenModal.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

btnCloseModal.addEventListener('click', () => {
    modal.classList.add('hidden');
});


// Ejercicio 7

const statusBox = document.querySelector('#status-box');

statusBox.innerHTML = `
    <strong>Estado:</strong>
    <span class="status-success">Conectado</span>
`;

setTimeout(() => {
    const estadoInterno = document.querySelector('#status-box .status-success');
    estadoInterno.classList.remove('status-success');
    estadoInterno.classList.add('status-error');
    estadoInterno.textContent = "Desconectado";
}, 3000);


// Ejercicio 8

/* 
(h) Es mejor usar elemento.classList.add('mi-clase') porque mantiene la separación entre estructura, estilo y comportamiento, mientras que elemento.style crea estilos inline difíciles de mantener.
(f, g, e) La forma correcta de añadir eventos es addEventListener(), ya que evita mezclar HTML con JavaScript, permite múltiples listeners y garantiza mejor compatibilidad que usar onclick="" en el HTML.
*/
