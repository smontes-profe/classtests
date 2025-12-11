
/*Ejercicio 1: Selección de Elementos*/

// Elemento con ID "titulo-principal"
const tituloPrincipal = document.getElementById("titulo-principal");

// Primer elemento con clase "subtitulo"
const primerSubtitulo = document.querySelector(".subtitulo");

// Imágenes que tengan la clase "thumb"
const miniaturas = document.querySelectorAll(".thumb");

// Botón con ID "btn-add-task"
const btnAddTask = document.getElementById("btn-add-task");

// Contenidos de texto
console.log("Título principal:", tituloPrincipal.textContent);
console.log("Primer subtítulo:", primerSubtitulo.textContent);

// Cada miniatura 
miniaturas.forEach((img, i) => {
    console.log(`Miniatura ${i + 1}:`, img.alt);
});

console.log("Botón Añadir Tarea:", btnAddTask.textContent);





/*Ejercicio 2: El Interruptor*/

// Botón de encender/apagar
const btnToggle = document.getElementById("btn-toggle");

// Seleccionamos la bombilla
const lightBulb = document.getElementById("light-bulb");

// Evento click
btnToggle.addEventListener("click", () => {

    // Alternamos las clases
    lightBulb.classList.toggle("luz-apagada");
    lightBulb.classList.toggle("luz-encendida");
});





/*Ejercicio 3: Editor de Perfil*/

// Nombre del perfil
const profileName = document.querySelector(".profile-name");

// Descripción del perfil
const profileDesc = document.querySelector(".profile-desc");

// Section completo del perfil
const profileCard = document.getElementById("profile-card");

// Cambiamos el texto del nombre
profileName.textContent = "Elena Mena :)";

// Cambiamos la descripción
profileDesc.textContent = "Estudiante de 2º de DAW";

// Modificamos el atributo data-user-id
profileCard.setAttribute("data-user-id", "DWEC-001");





/*Ejercicio 4: Galería de Imágenes*/

// Imagen principal
const mainImage = document.getElementById("main-image");

// Miniaturas
const thumbs = document.querySelectorAll(".thumb");

// Recorremos todas las miniaturas con bucle
thumbs.forEach((thumb) => {

    // Añadimos listener a cada una
    thumb.addEventListener("click", () => {

        // Cambiamos el src de la imagen principal
        mainImage.src = thumb.src;
    });
});





/*Ejercicio 5: Añadir Tareas*/

// Lista e input
const taskList = document.getElementById("task-list");
const inputNewTask = document.getElementById("input-new-task");

// Evento al botón
btnAddTask.addEventListener("click", () => {

    const texto = inputNewTask.value.trim();

    if (texto !== "") { // Si el valor no está vacío
        // Creamos un nuevo <li>
        const li = document.createElement("li");

        // Ponemos el texto que escribió el usuario
        li.textContent = texto;

        // Lo añadimos a la lista
        taskList.appendChild(li);

        // Limpiamos el input
        inputNewTask.value = "";
    }
});





/*Ejercicio 6: El Modal*/

// Modal y boton
const modal = document.getElementById("modal");
const btnOpenModal = document.getElementById("btn-open-modal");
const btnCloseModal = document.getElementById("btn-close-modal");

// Evento que quite la clase hidden
btnOpenModal.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

// Evento que añada la clase hidden
btnCloseModal.addEventListener("click", () => {
    modal.classList.add("hidden");
});





/*Ejercicio 7: Notificación Avanzada*/

// Status box
const statusBox = document.getElementById("status-box");

// Su contenido a HTML
statusBox.innerHTML = `
    <strong>Estado:</strong>
    <span class="status-success">Conectado</span>
`;

// Despues de 3 segundos, se cambia a "Desconectado"
setTimeout(() => {

    // <span> interno
    const estadoSpan = statusBox.querySelector("span");

    // Cambiamos la clase
    estadoSpan.classList.remove("status-success");
    estadoSpan.classList.add("status-error");

    // Cambiamos el texto
    estadoSpan.textContent = "Desconectado";

}, 3000);



/*Ejercicio 8: Preguntas Teóricas*/

/*
a. 
- Mantiene la separación de capas: HTML para estructura, CSS para estilos, JS para interactividad.
- Permite que los estilos sean sobrescritos por otras reglas CSS más adelante si es necesario.
- Las clases pueden agrupar múltiples propiedades de estilo y ser aplicadas a cualquier elemento.
- Facilita la lectura y el mantenimiento del código CSS y JS.


b. elemento.addEventListener("click", miFuncion);
Es mejor porque usar onclick="..." directamente en el HTML es una mala práctica. Esto "ensucia" nuestro HTML mezclando comportamiento con estructura,
rompiendo la independencia entre capas y dificultando el mantenimiento del código. Siempre debemos mantener JavaScript separado en
archivos .js.

*/


