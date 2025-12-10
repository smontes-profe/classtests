"use strict";

const regexMail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

const inputEmail = document.getElementById("email-input");
const spanFeedback = document.getElementById("email-feedback");

inputEmail.addEventListener("keyup", () => {
  if (regexMail.test(inputEmail.value)) {
    inputEmail.classList.add("valido");
    spanFeedback.textContent = "Email válido";
  } else {
    inputEmail.classList.add("invalido");
    spanFeedback.textContent = "Email inválido";
  }
});
