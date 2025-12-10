"use strict"

// 1. Seleccion

const emailinput = document.querySelector('#email-input');
const emailfeedback = document.querySelector('#email-feedback');

// 2.Define la Regex

const regexemail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

// 3.Añade el Listener: Añade un addEventListener al input para el evento input (cada vez que se teclea).

emailinput.addEventListener('input', function() {
    const emailvalue = emailinput.value;

    if (regexemail.test(emailvalue)) {
        emailinput.classList.add('valido');
        emailinput.classList.remove('invalido');
        emailfeedback.textContent = 'Email Válido';
    } else {
        emailinput.classList.add('invalido');
        emailinput.classList.remove('valido');
        emailfeedback.textContent = 'Email Inválido';
    }  
});

