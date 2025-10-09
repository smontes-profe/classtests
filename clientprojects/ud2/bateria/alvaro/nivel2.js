"use strict";

function evaluarAmenaza() {
  let nivelMagia = parseInt(document.getElementById("nivelMagia").value);
  let capa = document.getElementById("capa").value;
  let mensaje = "";

  // Condicional nivel de magia
  if (nivelMagia > 70) {
    mensaje += "¡Cuidado, magia poderosa!";
  } else {
    mensaje += "Magia inofensiva<br>";
  }

  // Switch capa
  switch (capa) {
    case "invisible":
      mensaje += "Puedes espiar sin ser visto";
      break;
    case "roja":
      mensaje += "Todos te miran";
      break;
    case "negra":
      mensaje += "Sospechoso";
      break;
  }

  document.getElementById("resultado").innerHTML = mensaje;
}
