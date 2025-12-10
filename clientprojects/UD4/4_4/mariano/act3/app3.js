"use strict";

// Validación en Vivo y al Salir
document.addEventListener("DOMContentLoaded", function () {
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const nombreInput = document.getElementById("nombre");

    const errorEmail = document.getElementById("error-email");
    const errorPassword = document.getElementById("error-password");
    const errorNombre = document.getElementById("error-nombre");

    // Validar email al salir
    emailInput.addEventListener("blur", function () {
        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regexEmail.test(emailInput.value)) {
            errorEmail.textContent = "Correo no válido.";
            emailInput.classList.add("error");
        } else {
            errorEmail.textContent = "";
            emailInput.classList.remove("error");
        }
    });

    // Validar contraseña en vivo
    passwordInput.addEventListener("input", function () {
        const regexPassword = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
        if (!regexPassword.test(passwordInput.value)) {
            errorPassword.textContent = "La contraseña debe tener por lo menos 8 caracteres, una mayúscula y un número.";
            passwordInput.classList.add("error");
        } else {
            errorPassword.textContent = "";
            passwordInput.classList.remove("error");
        }
    });

    // Validar nombre al salir
    nombreInput.addEventListener("blur", function () {
        if (nombreInput.value.trim() === "") {
            errorNombre.textContent = "Rellene el nombre.";
            nombreInput.classList.add("error");
        } else {
            errorNombre.textContent = "";
            nombreInput.classList.remove("error");
        }
    });
});


// Cálculo Dinámico de Coste
document.addEventListener("DOMContentLoaded", function () {
    const tipoEntrada = document.getElementById("tipo-entrada");
    const tallerJS = document.getElementById("taller-js");
    const tallerCSS = document.getElementById("taller-css");
    const resumenTotal = document.getElementById("resumen-total");

    function actualizarTotal() {
        let total = parseInt(tipoEntrada.value);

        if (tallerJS.checked) {
            total += parseInt(tallerJS.value);
        }
        if (tallerCSS.checked) {
            total += parseInt(tallerCSS.value);
        }

        resumenTotal.textContent = `Total a Pagar: ${total}€`;
    }

    tipoEntrada.addEventListener("change", actualizarTotal);
    tallerJS.addEventListener("change", actualizarTotal);
    tallerCSS.addEventListener("change", actualizarTotal);

    // Inicializar al cargar
    actualizarTotal();
});

// Gestión del Envío

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("form-inscripcion");

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        const emailInput = document.getElementById("email");
        const passwordInput = document.getElementById("password");
        const nombreInput = document.getElementById("nombre");

        let valid = true;

        // Validar email
        const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!regexEmail.test(emailInput.value)) {
            valid = false;
            document.getElementById("error-email").textContent = "Este correo no es correcto.";
            emailInput.classList.add("error");
        } else {
            document.getElementById("error-email").textContent = "";
            emailInput.classList.remove("error");
        }

        // Validar contraseña
        const regexPassword = /^(?=.*[A-Z])(?=.*\d).{8,}$/;
        if (!regexPassword.test(passwordInput.value)) {
            valid = false;
            document.getElementById("error-password").textContent = "La contraseña debe tener por lo menos 8 caracteres, una mayúscula y un número.";
            passwordInput.classList.add("error");
        } else {
            document.getElementById("error-password").textContent = "";
            passwordInput.classList.remove("error");
        }

        // Validar nombre
        if (nombreInput.value.trim() === "") {
            valid = false;
            document.getElementById("error-nombre").textContent = "Completa tu nombre.";
            nombreInput.classList.add("error");
        } else {
            document.getElementById("error-nombre").textContent = "";
            nombreInput.classList.remove("error");
        }

        // Si todo es válido, mostrar mensaje de éxito
        if (valid) {
            form.style.display = "none";
            const mensaje = document.createElement("h2");
            mensaje.textContent = "¡Inscripción completada!";
            document.body.appendChild(mensaje);
        }
    });
});
