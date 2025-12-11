//Ejercicio 1--------------------------------------------------

//Guardar en variable el elemento con ID titulo-principal
const tituloPrincipal = document.getElementById('titulo-principal');

//Guardar variable con el primer elemento con clase substitulo
const primerSubtitulo = document.querySelector('.subtitulo');

//Guardar variable en una NodeList con todos los elementos <img>
const imagenesThumb = document.querySelectorAll('img.thumb');

//Guardar variable con elemento <button> con ID btn-add-task
const botonAddTask = document.getElementById('btn-add-task');

//Impresiones por consola
console.log(tituloPrincipal);
console.log(primerSubtitulo);
console.log(imagenesThumb);
console.log(botonAddTask);

//Ejercicio 2--------------------------------------------------

const lightBulb = document.getElementById('light-bulb');
const btnToggle = document.getElementById('btn-toggle');

function toggleLight(){
    if(lightBulb.classList.contains('luz-apagada')){
        lightBulb.classList.remove('luz-apagada');
        lightBulb.classList.add('luz-encendida');
    } else{
        lightBulb.classList.remove('luz-encendida');
        lightBulb.classList.add('luz-apagada');
    }
}

btnToggle.addEventListener('click', toggleLight);

//Ejercicio 3--------------------------------------------------

//Seleccionar el elemento con clase profile-name y cambiar su textContent
const profileName = document.querySelector('.profile-name');
profileName.textContent = 'Mauri';

//Seleccionar el elemento con clase profile-desc y cambiar su textContent
const profileDesc = document.querySelector('.profile-desc');
profileDesc.textContent = 'Estudiante de 2º de DAW';

//Seleccionar el section con ID profile-card y cambar atributo
const profileCard = document.getElementById('profile-card');
profileCard.setAttribute('data-user-id', 'DWEC-001');

//Ejercicio 4--------------------------------------------------

//Seleccionar la imagen principal
const mainImage = document.getElementById('main-image');

//Seleccionar las miniaturas
const galleryThumbs = document.querySelectorAll('img.thumb');

//Usamos el bucle forEach
galleryThumbs.forEach(thumb => {
    //Añadimos listener para el evento Click
    thumb.addEventListener('click', (event) => {
        const clickedSrc = event.target.getAttribute('src');
        mainImage.setAttribute('src', clickedSrc);
    })
})

//Ejercicio 5--------------------------------------------------

//Seleccionamos elementos necesarios
const taskList = document.getElementById('task-list');
const inputNewTask = document.getElementById('input-new-task');
const btnAddTask = document.getElementById('btn-add-task');

//Añadimos Listener al boton
btnAddTask.addEventListener('click', () => {

    const newTaskText = inputNewTask.value.trim();

    if(newTaskText !== ''){
        const newLi = document.createElement('li');
        newLi.textContent = newTaskText;
        taskList.appendChild(newLi);
        inputNewTask.value = '';
    }
})

//Ejercicio 6--------------------------------------------------

//Seleccionamos elementos necesarios
const modal = document.getElementById('modal');
const btnOpenModal = document.getElementById('btn-open-modal');
const btnCloseModal = document.getElementById('btn-close-modal');

//añadimos Listener btnOpenModal
btnOpenModal.addEventListener('click', () => {
    modal.classList.remove('hidden');
})

//Añadimos listener para btnCloseModal
btnCloseModal.addEventListener('click', () => {
    modal.classList.add('hidden');
})

//Ejercicio 7--------------------------------------------------

//Seleccionamos el div status-box
const statusBox = document.getElementById('status-box');

//Nos aseguramos que no existe antes de manipular
if(statusBox){
    //Usamos innerHTML para añadir contenido
    statusBox.innerHTML = '<strong>Estado:</strong> <span class="status-success">Conectado</span>';
}

//Ejercicio 8--------------------------------------------------

/**
 * Criterio (h): ¿Por qué es preferible usar elemento.classList.add('mi-clase') 
 * en lugar de elemento.style.color = 'blue' para cambiar la apariencia de un elemento?
 * 
 * Porque mantiene el css y el js separados, lo que permite tener un mejor mantenimiento al poder modificar
 * estilos complejos solo en css
 * Este respeta la cascada de CSS y evita estilos dificiles de sobreescribir
 * 
 * 
 * Criterios (f, g, e): ¿Cuál es la forma estándar de añadir un evento (como un clic) a un botón? 
 * ¿Por qué esta forma es mejor para la compatibilidad entre navegadores (Criterio g)
 *  que poner onclick="miFuncion()" directamente en el HTML?
 * 
 * La forma estandar sería usar elemento.addEventListener('click', miFuncion)
 * 
 * Es mejor forma porque mantiene el js fuera del html y permite adjuntar varias funciones
 * al mismo evento.
 * Al ser estándar W3C, es el más robusto en cualquier navegador
 * 
 * 
 * 
 */