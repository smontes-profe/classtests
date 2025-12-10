"use strict";

import { TaskManager } from "./taskManager.js";

const manager = new TaskManager();

// ELEMENTOS DOM 
const inputNuevaTarea = document.getElementById("nueva-tarea");
const buttonAgregarTarea = document.getElementById("btn-agregar");
const contadorTareas = document.getElementById("contadorTareas");
const listaTareas = document.getElementById("listaTareas");

//  OBSERVADORES 
const listarTareasDOM = () => {
  const tareas = manager.obtenerTareas();
  listaTareas.innerHTML = ""; 

  tareas.forEach(tarea => {
        const li = document.createElement("li");
        li.textContent = tarea.descripcion || "Sin texto"; 
        li.id = tarea.id;
        listaTareas.appendChild(li);
    });
};

const actualizarContadorDOM = () => {
  const total = manager.obtenerTareas().length;
  contadorTareas.innerText = `Tareas totales: ${total}`;
};

try {
    manager.suscribir(listarTareasDOM);
    manager.suscribir(actualizarContadorDOM);
    
    console.log("Observadores suscritos.");
} catch (e) {
    console.error("Error al suscribir:", e);
}


// EVENTO BOTÓN 
buttonAgregarTarea.addEventListener("click", (event) => {
    const texto = inputNuevaTarea.value;

    if (texto && texto.trim() !== "") {
        manager.agregarTarea(texto);
        inputNuevaTarea.value = "";
        inputNuevaTarea.focus();
    } else {
        console.warn("El campo está vacío.");
    }
});