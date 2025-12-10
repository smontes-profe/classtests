'use strict';

import { API_URL } from './config.js';
import { toggleLoading, showError } from './utils.js';

const tablaBody = document.getElementById("lista-empleados");
const btnRecargar = document.getElementById("btn-recargar");


/**
 * Obtiene la lista de empleados de la API y renderiza la tabla.
 * Muestra un indicador de carga mientras espera la respuesta.
 */
export async function cargarEmpleados() {
    try {
        toggleLoading('loading', true);
        const errorDiv = document.getElementById('error-msg');
        if(errorDiv) errorDiv.style.display = 'none';
        
        const response = await fetch(API_URL);

        if (!response.ok) throw new Error(`Error HTTP: ${response.status}`);

        const empleados = await response.json();
        renderizarTablaEditable(empleados);

    } catch (error) {
        console.error("Error GET:", error);
        showError('error-msg', error.message);
    } finally {
        toggleLoading('loading', false);
    }
}


function renderizarTablaEditable(datos) {
    if (!datos || datos.length === 0) {
        tablaBody.innerHTML = '<tr><td colspan="5" style="text-align:center">No hay empleados.</td></tr>';
        return;
    }

    tablaBody.innerHTML = datos.map(emp => `
        <tr data-id="${emp.id}">
            <td>${emp.id}</td>
            <td><input class="input-tabla" name="nombre" value="${emp.nombre}"></td>
            <td><input class="input-tabla" name="puesto" value="${emp.puesto}"></td>
            <td><input class="input-tabla" name="salario" type="number" step="0.01" value="${emp.salario}"></td>
            <td class="acciones-cell">
                <button class="btn-icon btn-save" title="Guardar cambios">💾</button>
                <button class="btn-icon btn-delete" title="Eliminar fila">🗑️</button>
            </td>
        </tr>
    `).join("");
}


if (tablaBody) {
    // Delegación de eventos: escuchamos clicks en el tbody y detectamos si fue en un botón
    tablaBody.addEventListener('click', async (e) => {
        const btn = e.target.closest('button');
        if (!btn) return; 

        const fila = btn.closest('tr');
        const id = fila.dataset.id;

        if (btn.classList.contains('btn-delete')) {
            if (!confirm(`¿Eliminar empleado ID ${id}?`)) return;

            try {
                const res = await fetch(`${API_URL}&id=${id}`, { method: 'DELETE' });
                const data = await res.json();
                
                if (!res.ok) throw new Error(data.message || 'Error al borrar');
                
                cargarEmpleados();
            } catch (error) {
                alert("Error: " + error.message);
            }
        }

      
        if (btn.classList.contains('btn-save')) {
            const actualizado = {
                nombre: fila.querySelector('input[name="nombre"]').value,
                puesto: fila.querySelector('input[name="puesto"]').value,
                salario: parseFloat(fila.querySelector('input[name="salario"]').value)
            };

            try {
                btn.textContent = '⏳';
                
                const res = await fetch(`${API_URL}&id=${id}`, {
                    method: 'PUT',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(actualizado)
                });
                const data = await res.json();

                if (!res.ok) throw new Error(data.message || 'Error al actualizar');

                btn.textContent = '✅';
                setTimeout(() => { btn.textContent = '💾'; }, 1000);

            } catch (error) {
                alert("Error: " + error.message);
                btn.textContent = '❌';
            }
        }
    });
}

document.addEventListener("DOMContentLoaded", cargarEmpleados);
if(btnRecargar) btnRecargar.addEventListener("click", cargarEmpleados);