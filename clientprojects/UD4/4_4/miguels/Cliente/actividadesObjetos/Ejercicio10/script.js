"use strict";

const buttonSaludar = document.getElementById("saludar");
const containerMensajes = document.getElementById("mensajes");
const inputNombre = document.getElementById("nombre");

buttonSaludar.addEventListener("click", () => {
  const nameUser = inputNombre.value;
  const mensaje = `¡Hola ${nameUser}! Bienvenido/a."`;
  const mensajeUser = document.createElement("p");

  if (!nameUser) {
    return alert("Nombre está vacío.")
  }


  mensajeUser.textContent = mensaje;
  mensaje;
  containerMensajes.appendChild(mensajeUser);

  alert(mensaje);

  const ventana = window.open("", `ventana_${nameUser}`, "width=400,height=200");
  if (ventana) {
    ventana.document.title = `Bienvenida, ${nameUser}`;
    ventana.document.body.innerHTML = `
                    <div style="
                        font-family: Arial, sans-serif;
                        padding: 20px;
                        text-align: center;
                    ">
                        <h2>¡Hola de nuevo, ${nameUser}!</h2>
                        <p>Esta es tu ventana de bienvenida.</p>
                        <button onclick="window.close()">Cerrar</button>
                    </div>
                `;
  }

  setTimeout(() => {
    if (containerMensajes.contains(mensajeUser)) {
      containerMensajes.removeChild(mensajeUser);
    }
  }, 5000);

  inputNombre.value = "";
  inputNombre.focus();

});
