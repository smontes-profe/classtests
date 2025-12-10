"use strict";

// EJERCICIO 1
const variablesToPrint = [];

const tituloPrinciID = document.getElementById("titulo-principal");
const elemtPrimeroClassSubTi = document.querySelector(".subtitulo");
const totalElemtClassThumb = document.querySelectorAll("img.thumb");
const btnAddTask = document.getElementById("btn-add-task");

variablesToPrint.push(tituloPrinciID);
variablesToPrint.push(elemtPrimeroClassSubTi);
variablesToPrint.push(totalElemtClassThumb);
variablesToPrint.push(btnAddTask);

function imprimirVariables(arrayVariables) {
  for (let variable of arrayVariables) {
    console.log(variable);
  }
}

imprimirVariables(variablesToPrint);

// EJERCICIO 2
const btnToggle = document.getElementById("btn-toggle");
const divLightBulb = document.getElementById("light-bulb");

btnToggle.addEventListener("click", () => {
  divLightBulb.classList.contains("luz-apagada")
    ? divLightBulb.classList.toggle("luz-encendida")
    : divLightBulb.classList.toggle("luz-apagada");
});

// EJERCICIO 3
const elementClassProfileName = document.querySelector(".profile-name");
const elementClassProfileDesc = document.querySelector(".profile-desc");
const sectionProfileCard = document.querySelector("#profile-card");

elementClassProfileName.textContent = "Mi Nombre de Alumno";
elementClassProfileDesc.textContent = "Estudiante de 2 de DAW";
sectionProfileCard.setAttribute("data-user-id", "123");

// EJERCICIO 4
const imagenPrinci = document.querySelector("#main-image");
const imagenThumb = document.querySelectorAll(".thumb");

imagenThumb.forEach((imagen) => {
  imagen.addEventListener("click", () => {
    imagenPrinci.setAttribute("src", imagen.getAttribute("src"));
  });
});

// EJERCICIO 5
const btnNewTask5 = document.getElementById("btn-add-task");
const ulTaskList = document.getElementById("task-list");

btnNewTask5.addEventListener("click", () => {
  const inputNewTask = document.querySelector("#input-new-task");
  const ulTaskList = document.getElementById("task-list");
  const valueNewTask = inputNewTask.value;

  if (valueNewTask) {
    const elementLI = document.createElement("li");
    elementLI.textContent = valueNewTask;
    ulTaskList.appendChild(elementLI);
  }
});

// EJERCICIO 6
const modalDiv = document.getElementById("modal");
const btnOpenModal = document.getElementById("btn-open-modal");
const btnCloseModal = document.getElementById("btn-close-modal");

btnOpenModal.addEventListener("click", () => {
  modalDiv.classList.remove("hidden");
});

btnCloseModal.addEventListener("click", () => {
  modalDiv.classList.add("hidden");
});

// EJERCICIO 7
const divStatusBox = document.getElementById("status-box");

divStatusBox.innerHTML =
  '<strong>Estado:</strong> <span class="status-success">Conectado</span>';

setTimeout(() => {
  divStatusBox.innerHTML =
    '<strong>Estado:</strong> <span class="status-error">Desconectado</span>';
}, 3000);

// EJERCICIO 8

/**
 * Criterio h
 * Razones:
 * Es preferible por la separación de responsabilidades.
   - Mantenibilidad: los estilos deben definirse en los .css, no en
     el .js o .html. Si usamos .style, estamos mezclando lógica con diseño,
     lo que hace difícil hacer cambios de diseño futuros sin tocar el .js.
   - Reutilización: una clase CSS puede contener múltiples propiedades (color,
     fondo, tamaño) que se aplican de una sola vez, mientras que
     con .style tendríamos que escribir una línea de código por cada propiedad.
   - Especificidad: Los estilos en línea (.style) tienen una especificidad muy alta
     y son difíciles de sobrescribir.

/**
 * Criterios (f, g, e)
 * RESPUESTA:
   La forma estándar es usar el método: elemento.addEventListener('evento', callBack).
   Razones:
   - Separación de capas: Mantiene el HTML limpio (solo estructura) y deja
     toda la lógica en el .js.
   - Múltiples eventos: addEventListener permite asignar varias funciones al
     mismo evento en el mismo elemento. 
 */