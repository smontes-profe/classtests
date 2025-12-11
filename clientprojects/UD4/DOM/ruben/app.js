
// Act 1

const tituloPrincipal = document.getElementById("titulo-principal");
const primerElementoConClaseSubtitulo = document.querySelector(".subtitulo");
const imgElementos = document.querySelectorAll("img.thumb");
const botonAñadirTarea = document.getElementById("btn-add-task");

console.log(tituloPrincipal.textContent);
console.log(primerElementoConClaseSubtitulo.textContent);
console.log(imgElementos);
console.log(botonAñadirTarea.textContent);

// Act 2
const btnToggle = document.getElementById("btn-toggle");

btnToggle.addEventListener("click", () => {
    const lightBulb = document.getElementById("light-bulb");
    if (lightBulb.classList.contains("luz-apagada")) {
        lightBulb.classList.remove("luz-apagada");
        lightBulb.classList.add("luz-encendida");
    } else {
        lightBulb.classList.remove("luz-encendida");
        lightBulb.classList.add("luz-apagada");
    }
})

// Act 3

const elmtProfileName = document.querySelector(".profile-name");
elmtProfileName.textContent = "Rubén Ojeda León";
const elmtProfileDesc = document.querySelector(".profile-desc");
elmtProfileDesc.textContent = "Estudiante de 2º de DAW";
const profileCard = document.getElementById("profile-card");
profileCard.setAttribute("data-user-id", "DWEC-001");

// Act 4

const imgPrincipal = document.getElementById("main-image");
const miniaturas = document.querySelectorAll("img.thumb");
miniaturas.forEach(miniatura => {
    miniatura.addEventListener("click", () => {
        imgPrincipal.src = miniatura.src;
    });
});

// Act 5

botonAñadirTarea.addEventListener("click", () => {
    const valueInput = document.getElementById("input-new-task").value;
    if (valueInput) {
        const elemetLi = document.createElement("li");
        elemetLi.textContent = valueInput;
        const listaTareas = document.querySelector("#task-list");
        listaTareas.appendChild(elemetLi);
    }
});

// Act 6

const modal = document.getElementById("modal");
const btnOpenModal = document.getElementById("btn-open-modal");
const btnCloseModal = document.getElementById("btn-close-modal");

btnOpenModal.addEventListener("click", () => {
    modal.classList.remove("hidden");
});
btnCloseModal.addEventListener("click", () => {
    modal.classList.add("hidden");
});

// Act 7

const statusBox = document.getElementById("status-box");
statusBox.innerHTML = "<strong>Estado:</strong> <span class=\"status-success\">Conectado</span>";
setTimeout(() => {
    const span = statusBox.querySelector("span");
    span.classList.remove("status-success");
    span.classList.add("status-error");
    span.textContent = "Desconectado";
}, 3000);

// Act 8

// Criterio (h):
// Porque es más eficiente y permite cambiar la apariencia de un elemento sin tener que recargar la página.

// Criterios (f, g, e):
// La forma estándar de añadir un evento (como un clic) a un botón es usar addEventListener. Porque esta forma es mejor para la compatibilidad entre navegadores que poner onclick="miFuncion()" directamente en el HTML.
