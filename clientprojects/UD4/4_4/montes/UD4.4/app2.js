// Tareas (app2.js):

// Selecciona el input#email-input y el span#email-feedback.
// Define la Regex: Crea una expresión regular (const regexEmail = /.../) que valide un formato de email simple.
// Añade el Listener: Añade un addEventListener al input para el evento input (cada vez que se teclea).
// Valida: Dentro del listener:
// Obtén el valor actual del input.
// Usa regexEmail.test(valor) para comprobar si es válido.
// Si es válido: añade la clase valido al input, quita invalido y pon "Email Válido" en el span.
// Si es inválido: añade la clase invalido al input, quita valido y pon "Email Inválido" en el span.

let inputEmail = document.getElementById("email-input");
let inputFeedback = document.getElementById("email-feedback");
const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

inputEmail.addEventListener("input", () => {
  if (regexEmail.test(inputEmail.value)) {
    inputEmail.classList.add("valido");
    inputEmail.classList.remove("invalido");
    inputFeedback.innerHTML= "Email Válido";
    inputFeedback.style.color("green");
} else {
    inputEmail.classList.add("invalido");
    inputEmail.classList.remove("valido");
    inputFeedback.innerHTML= "Email Inválido";
    inputFeedback.style.color("red");
  }
});
