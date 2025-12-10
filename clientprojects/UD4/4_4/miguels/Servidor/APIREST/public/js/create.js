'use strict';

import { API_URL } from './config.js';
import { cargarEmpleados } from './index.js';

const formulario = document.getElementById("form-empleado");
const formMsg = document.getElementById("form-msg");

async function guardarEmpleado(event) {
    // Evitamos que el formulario recargue la página al enviarse
    event.preventDefault();

    const nuevoEmpleado = {
        nombre: document.getElementById("nombre").value,
        puesto: document.getElementById("puesto").value,
        salario: parseFloat(document.getElementById("salario").value)
    };

    try {
        if(formMsg) {
            formMsg.style.display = 'block';
            formMsg.className = 'feedback-msg info';
            formMsg.textContent = "Guardando datos... ⏳";
        }

        const response = await fetch(API_URL, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(nuevoEmpleado)
        });

        const data = await response.json();

        if (!response.ok) {
            throw new Error(data.message || `Error HTTP: ${response.status}`);
        }

        if(formMsg) {
            formMsg.className = 'feedback-msg success';
            formMsg.textContent = `✅ ¡Guardado! ID: ${data.id}`;
        }

        formulario.reset();

        cargarEmpleados();

        setTimeout(() => { formMsg.style.display = 'none'; }, 3000);

    } catch (error) {
        console.error("Error POST:", error);
        if(formMsg) {
            formMsg.className = 'feedback-msg error';
            formMsg.style.display = 'block';
            formMsg.textContent = `❌ Error: ${error.message}`;
        }
    }
}

if (formulario) {
    formulario.addEventListener("submit", guardarEmpleado);
}