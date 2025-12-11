//! Ejercicio 1: Selección de Elementos
// Guarda en una variable el elemento con ID titulo - principal.
// Guarda en una variable el primer elemento con clase subtitulo.
// Guarda en una variable una NodeList con todos los elementos < img > que tengan la clase thumb.
// Guarda en una variable el elemento < button > que tiene el ID btn - add - task.
// Imprime por consola el contenido de texto de estas variables.

const tituloPrincipal = document.getElementById("titulo-principal");
const subtitulo = document.querySelector(".subtitulo");
const imagenes = document.querySelectorAll("img.thumb");
const boton = document.getElementById("btn-add-task");

console.log(tituloPrincipal.textContent);
console.log(subtitulo.textContent);
console.log(imagenes);
console.log(boton.textContent);

//! Ejercicio 2: El Interruptor
// Añade un addEventListener al botón btn - toggle.
// Al hacer click, el div con ID light - bulb debe intercambiar(toggle) las clases luz - apagada y luz - encendida.
// (Prohibido usar elemento.style).

const interruptor = document.getElementById("btn-toggle");
const bulb = document.getElementById("light-bulb");

interruptor.addEventListener("click", () => {
  bulb.classList.toggle("luz-apagada");
  bulb.classList.toggle("luz-encendida");
});

//! Ejercicio 3: Editor de Perfil
// Selecciona el elemento con clase profile - name y cambia su textContent por "Mi Nombre de Alumno".
// Selecciona el elemento con clase profile - desc y cambia su textContent por "Estudiante de 2º de DAW".
// Selecciona el section con ID profile - card y usa setAttribute para cambiar su atributo data - user - id a "DWEC-001".

const profileName = document.querySelector(".profile-name"); //? name me pone que esta reservado pero lo he buscado en el chato Serguo y Pone windows.name y no entiendo por que afecta
profileName.textContent = "Mi Nombre de Alumno";
const desc = document.querySelector(".profile-desc");
desc.textContent = "Estudiante de 2º de DAW";
const id = document.querySelector("#profile-card");
id.setAttribute("data-user-id", "DEWC-001");

//! Ejercicio 4: Galería de Imágenes
// Selecciona la imagen principal (main-image).
// Selecciona todas las miniaturas (.thumb).
// Usando un bucle (forEach), añade un addEventListener de tipo click a cada miniatura.
// Cuando se haga clic en una miniatura, la propiedad src de la imagen principal debe cambiar por la propiedad src de la miniatura que fue clicada.

const galeryImg = document.getElementById("main-image");
// const imagenes = document.querySelectorAll(imagenes.thumb); Ya esta declarada arriba

imagenes.forEach((miniatura) => {
  miniatura.addEventListener("click", () => {
    galeryImg.setAttribute("src", miniatura.src);
  });
});

//! Ejercicio 5: Añadir Tareas
// Añade un addEventListener al botón btn-add-task.
// Al hacer click:
// Lee el valor (value) del input (input-new-task).
// Si el valor no está vacío:
// Crea un nuevo elemento <li>.
// Establece el textContent del <li> al valor del input.
// Añade (con appendChild) el nuevo <li> a la lista task-list.
// Limpia el valor del input (déjalo en "").

const listaTareas = document.getElementById("task-list");
const botonAñadir = document.getElementById("btn-add-task");
const inputTarea = document.getElementById("input-new-task");

botonAñadir.addEventListener("click", () => {
  if (inputTarea.value.trim() !== "") {
    const elemento = document.createElement("li");
    elemento.textContent = inputTarea.value;
    listaTareas.appendChild(elemento); //? appendChild solo acepta NODOS elementos ya creados nada de implemntr como React o Vue
    inputTarea.value = "";
  }
});

//! Ejercicio 6: El Modal
// Selecciona el modal (#modal), el botón para abrir (#btn-open-modal) y el botón para cerrar (#btn-close-modal).
// Añade un click listener a btn-open-modal que quite la clase hidden del modal.
// Añade un click listener a btn-close-modal que añada la clase hidden al modal.
// (Prohibido usar elemento.style.display).

const modal = document.getElementById("modal");
const btnOpend = document.getElementById("btn-open-modal");
const btnClose = document.getElementById("btn-close-modal");

btnOpend.addEventListener("click", () => {
  modal.classList.remove("hidden");
});
btnClose.addEventListener("click", () => {
  modal.classList.add("hidden");
});

//! Ejercicio 7: Notificación Avanzada
// Selecciona el div con ID status-box.
// Usa innerHTML para cambiar su contenido a: <strong>Estado:</strong> <span class="status-success">Conectado</span>.
// (Desafío): 3 segundos después de cargar la página, vuelve a seleccionar el span interno (que ahora tiene la clase status-success) 
// y cámbiale la clase a status-error, y su textContent a "Desconectado". (Pista: necesitarás setTimeout).

const statusNotificacion = document.getElementById("status-box");
statusNotificacion.innerHTML= '<strong>Estado:</strong> <span class="status-success">Conectado</span>';
setTimeout(() => {
    // Buscamos el span que acabamos de crear (ahora existe en el DOM)
    const spanEstado = statusNotificacion.querySelector(".status-success");
    
    if (spanEstado) {
        spanEstado.textContent = "Desconectado";
        spanEstado.classList.remove("status-success");
        spanEstado.classList.add("status-error");
    }
}, 3000); // 3000ms = 3 segundos

//! Ejercicio 8: Preguntas Teóricas
// En un bloque de comentarios al final de tu app.js, responde:
//? ¿Por qué es preferible usar elemento.classList.add('mi-clase') en lugar de elemento.style.color = 'blue' para cambiar la apariencia de un elemento?
// Porque respeta el principio de "Separación de Responsabilidades". CSS debe encargarse del diseño y JS solo de la lógica. Además, 
// 'style' añade estilos en línea que son muy difíciles de sobrescribir (tienen demasiada especificidad) y ensucian el HTML.

//? ¿Cuál es la forma estándar de añadir un evento (como un clic) a un botón? ¿Por qué esta forma es mejor para la compatibilidad entre navegadores que poner onclick="miFuncion()" directamente en el HTML?
// La forma estándar es usar .addEventListener('click', funcion).
// Es mejor que 'onclick' por dos razones clave:
// 1. Permite múltiples listeners: Con onclick="" solo puedes tener UNA función (si pones otra, sobrescribe la anterior).
// Con addEventListener puedes añadir tantas funciones como quieras al mismo botón.
// 2. Limpieza y Mantenibilidad: Mantiene el HTML limpio (sin código JS mezclado) y centraliza toda la lógica en los archivos .js.