//Ejercicio 1: Selección de Elementos
const titulo = document.getElementById('titulo-principal'); //titulo
const subtitulo = document.querySelector('.subtitulo');//subtitulo
const imagenes = document.querySelectorAll('img.thumb');//miniaturas
const botonAddTask = document.getElementById('btn-add-task');//boton de tareas

console.log(titulo.textContent);
console.log(subtitulo.textContent);
imagenes.forEach(img => console.log(img.src)); 
console.log(botonAddTask.textContent);

//Ejercicio 2: El Interruptor
const btnToggle = document.getElementById('btn-toggle');//boton
const lightBulb = document.getElementById('light-bulb');//bombilla

btnToggle.addEventListener('click', () => {
    lightBulb.classList.toggle('luz-apagada');
    lightBulb.classList.toggle('luz-encendida');
});

//Ejercicio 3: Editor de Perfil
const profileName = document.querySelector('.profile-name');//nombre
const profileDesc = document.querySelector('.profile-desc');//descripcion
const profileCard = document.getElementById('profile-card');//tarjeta

profileName.textContent = "Sergio Gómez Galván";
profileDesc.textContent = "Estudiante de 2º de DAW";
profileCard.setAttribute('data-user-id', 'DWEC-001');

//Ejercicio 4: Galería de Imágenes
const mainImage = document.getElementById('main-image');//imagen principal
const thumbs = document.querySelectorAll('.thumb');//miniaturas

thumbs.forEach(thumb => {
    thumb.addEventListener('click', () => {
        mainImage.src = thumb.src;
    });
});

//Ejercicio 5: Añadir Tareas
const inputTask = document.getElementById('input-new-task');//campo texto
const taskList = document.getElementById('task-list');//lista

botonAddTask.addEventListener('click', () => {
    const taskText = inputTask.value.trim();
    if(taskText !== "") {
        const li = document.createElement('li');
        li.textContent = taskText;
        taskList.appendChild(li);
        inputTask.value = "";
    }
});

//Ejercicio 6: El Modal
const modal = document.getElementById('modal');//modal
const btnOpenModal = document.getElementById('btn-open-modal');//abrir
const btnCloseModal = document.getElementById('btn-close-modal');//cerrar

btnOpenModal.addEventListener('click', () => {
    modal.classList.remove('hidden');
});

btnCloseModal.addEventListener('click', () => {
    modal.classList.add('hidden');
});

//Ejercicio 7: Notificación Avanzada
const statusBox = document.getElementById('status-box');//contenedor
statusBox.innerHTML = `<strong>Estado:</strong> <span class="status-success">Conectado</span>`;

setTimeout(() => {
    const statusSpan = statusBox.querySelector('span');
    statusSpan.className = 'status-error';
    statusSpan.textContent = 'Desconectado';
}, 3000);

//Ejercicio 8: Preguntas Teóricas

// ¿Por qué es preferible usar elemento.classList.add('mi-clase') en lugar de elemento.style.color = 'blue' para cambiar la apariencia de un elemento?
//Por que con classlist.add puedes separar el estilo del contenido, reutilizar las clases css y mantener el codigo mas limpio


// ¿Cuál es la forma estándar de añadir un evento (como un clic) a un botón? ¿Por qué esta forma es mejor para la compatibilidad entre navegadores (Criterio g) que poner onclick="miFuncion()" directamente en el HTML?
//La forma estandar es: addevenrlistener, es mejor porque asi puedes añadir varios eventos al mismo elementos.