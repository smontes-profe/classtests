"use strict";

// ********** Ejercicio 1 **********
let tituloPrincipal = document.getElementById("titulo-principal");
let primerElementoSubtitulado = document.getElementsByClassName("subtitulo")[0];
let listaIMG = document.querySelectorAll("img.thumb");
let button = document.querySelector("#btn-add-task");

console.log(tituloPrincipal.textContent);
console.log(primerElementoSubtitulado.textContent);
listaIMG.forEach((img) => console.log(img.src));
console.log(button.textContent);

// ********** Ejercicio 2 **********
const btnToggle = document.getElementById("btn-toggle");
const foco = document.getElementById("light-bulb");

btnToggle.addEventListener("click", () => {
  foco.classList.toggle("luz-apagada");
  foco.classList.toggle("luz-encendida");
});

// ********** Ejercicio 3 **********
const profileName = document.getElementsByClassName("profile-name")[0];
profileName.textContent = "José Braulio Palomo Vazquez";

const profileDesc = document.getElementsByClassName("profile-desc")[0];
profileDesc.textContent = "Ex estudiante de 2º de DAW";

const profileCard = document.getElementById("profile-card");
profileCard.setAttribute("data-user-id", "DWEC-001");

// ********** Ejercicio 4 **********
const imagenPrincipal = document.getElementById("main-image");
const miniaturas = document.querySelectorAll(".thumb");

miniaturas.forEach((thumb) => {
  thumb.addEventListener("click", () => {
    imagenPrincipal.src = thumb.src;
  });
});

// ********** Ejercicio 5 **********
// Creo variable que contiene el boton
const btnAddTask = document.getElementById("btn-add-task");
const taskInput = document.getElementById("input-new-task");
const taskList = document.getElementById("task-list");

// Cuando cliko en el boton se ejecuta:
btnAddTask.addEventListener("click", () => {
  let taskText = taskInput.value.trim();

  if (taskText !== "") {
    const li = document.createElement("li");
    li.textContent = taskText;
    taskList.appendChild(li);
    taskInput.value = "";
  }
});

// ********** Ejercicio 6 **********
const modal = document.getElementById("modal");
const botonAbrirModal = document.getElementById("btn-open-modal");
const botonCerrarModal = document.getElementById("btn-close-modal");

botonAbrirModal.addEventListener("click", () => {
  modal.classList.remove("hidden");
});

botonCerrarModal.addEventListener("click", () => {
  modal.classList.add("hidden");
});

// ********** Ejercicio 7 **********
const statusBox = document.getElementById("status-box");

statusBox.innerHTML =
  "<strong> Estado:</strong> <span class='status-success'>Conectado</span>";

setTimeout(() => {
  statusBox.innerHTML =
    "<strong> Estado:</strong> <span class='status-error'>Desconectado</span>";
}, 3000);

// ********** Ejercicio 8 **********
// a) ¿Por qué es preferible usar elemento.classList.add('mi-clase')
// en lugar de elemento.style.color = 'blue' para cambiar la apariencia
// de un elemento?.

// Es preferible usarlo para mantener la separación entre el contenido (HTML)
// y los estilos (CSS), facilitando el mantenimiento y la reutilización del código.

// b)  ¿Cuál es la forma estándar de añadir un evento (como un clic) a 
// un botón? ¿Por qué esta forma es mejor para la compatibilidad entre 
// navegadores (Criterio g) que poner onclick="miFuncion()" directamente 
// en el HTML?.

// la mejor forma es usar un addEventListener en el JS porque permite añadir múltiples
// manejadores de eventos al mismo elemento sin sobrescribir otros, además de
// mantener el HTML limpio y separado del comportamiento (JS).