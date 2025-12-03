// saludo.js

const inputNombre = document.getElementById('nombre');
const btnSaludar = document.getElementById('saludar');
const divMensajes = document.getElementById('mensajes');

btnSaludar.addEventListener('click', () => {
    const nombre = inputNombre.value.trim();
    
    // Validar que no esté vacío
    if (nombre === '') {
        alert('Por favor, ingresa tu nombre');
        return;
    }
    
    const mensaje = `¡Hola ${nombre}! Bienvenido/a.`;
    
    // 1. Mostrar mensaje en el DOM
    const p = document.createElement('p');
    p.textContent = mensaje;
    divMensajes.appendChild(p);
    
    // 2. Mostrar alerta
    alert(mensaje);
    
    // 3. Abrir ventana hija
    const ventana = window.open('', '', 'width=400,height=300');
    ventana.document.write(`
        <h1>${mensaje}</h1>
        <button onclick="
            window.opener.postMessage('¡Gracias!', '*');
            alert('Mensaje enviado');
        ">Responder</button>
    `);
    
    // 4. Eliminar mensaje después de 5 segundos
    setTimeout(() => {
        p.remove();
    }, 5000);
    
    inputNombre.value = '';
});

// Recibir mensaje de la ventana hija
window.addEventListener('message', (e) => {
    const p = document.createElement('p');
    p.textContent = `Respuesta: ${e.data}`;
    divMensajes.appendChild(p);
    
    setTimeout(() => p.remove(), 5000);
});