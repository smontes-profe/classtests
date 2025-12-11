"use strict"

//EJERCICIO 1
const tituloprincipal = document.getElementById("titulo-principal");

console.log(tituloprincipal.textContent);

const primerelemento = document.querySelector(".subtitulo");

console.log(primerelemento.textContent);

const NodeList = document.querySelectorAll("img.thumb");

console.log(NodeList);

const elemento = document.getElementById("btn-add-task");

console.log(elemento.textContent);

//EJERCICIO 2

const btnToggle = document.getElementById("btn-toggle");

const lightBulb = document.getElementById("light-bulb");

btnToggle.addEventListener("click", () => {

    lightBulb.classList.toggle("luz-apagada");

    lightBulb.classList.toggle("luz-encendida");
});

//EJERCICIO 3

const profilecard = document.getElementById("profile-card");

const profilename = profilecard.querySelector(".profile-name");

const profiledesc = profilecard.querySelector(".profile-desc");

profilename.textContent = "Mariano Verdugo";

profiledesc.textContent = "Desarrollador Front-end";

//EJERCICIO 4
const mainimage = document.getElementById("main-image");
const thumbs = document.querySelectorAll("img.thumb");

thumbs.forEach(thumb => {
    thumb.addEventListener("click", () => {
        mainimage.src = thumb.src;
    });
});

//EJERCICIO 5

const btnaddtask = document.getElementById("btn-add-task");

const inputnewtask = document.getElementById("input-new-task");

const tasklist = document.getElementById("task-list");

btnaddtask.addEventListener("click", () => {
    const tasktext = inputnewtask.value.trim();
    if(tasktext !== "") {
        const li = document.createElement("li");
        li.textContent = tasktext;
        tasklist.appendChild(li);
        inputnewtask.value = "";
    }
});

//EJERCICIO 6

const btnopenmodal = document.getElementById("btn-open-modal");

const btnclosemodal = document.getElementById("btn-close-modal");

const modal = document.getElementById("modal");

btnopenmodal.addEventListener("click", () => {
    modal.classList.remove("hidden");
});

btnclosemodal.addEventListener("click", () => {
    modal.classList.add("hidden");
});

//EJERCICIO 7

const statusbox = document.getElementById("status-box");

setTimeout(() => {
    statusbox.textContent = "Estado: Listo";
}, 2000);

/*  EJERCICIO 8

a) Yo prefiero utilizar `elemento.classList.add('mi-clase')` antes que `elemento.style.color = 'blue'` 
porque así separa la lógica del JavaScript de la apariencia css y se ve mas claro a simple vista.
Además, al usar las clases, podemos agrupar varios estilos dentro de una sola clase en lugar de modificar estilo por estilo por JavaScript.

b)La forma estándar de añadir un evento a un botón es: botón.addEventListener("click", () => {});

Esta forma es mejor que poner `onclick="miFuncion()"` en el HTML porque:

 1. Mantiene la estructura html , estilos css y lógica js separados.

 2. Permite asignar múltiples eventos del mismo tipo sobre el mismo elemento.

 3. Es más compatible entre navegadores modernos, ya que `.addEventListener()` es el estándar oficial.
*/
