"use stict";

const form = document.getElementById("form-hechizo");
const nivelMagiaInput = document.getElementById("nivelMagia");
const capaSelect = document.getElementById("capa");
const resultadoMagia = document.getElementById("resultadoMagia");
const resultadoCapa = document.getElementById("resultadoCapa");
const errorMsg = document.getElementById("error");

form.addEventListener("submit", function (ev) {
  ev.preventDefault();

  resultadoMagia.textContent = "";
  resultadoCapa.textContent = "";
  errorMsg.textContent = "";

  const valorCrudo = (nivelMagiaInput.value ?? "").trim();
  const nivelMagia = parseInt(valorCrudo, 10);

  if (Number.isNaN(nivelMagia)) {
    errorMsg.textContent = "Introduce un nivel de magia válido (entero).";
    return;
  }

  if (nivelMagia > 70) {
    resultadoMagia.textContent = "¡Cuidado, magia poderosa!";
  } else {
    resultadoMagia.textContent = "Magia inofensiva";
  }

  const capa = capaSelect.value;
  switch (capa) {
    case "invisible":
      resultadoCapa.textContent = "Puedes espiar sin ser visto";
      break;
    case "roja":
      resultadoCapa.textContent = "Todos te miran";
      break;
    case "negra":
      resultadoCapa.textContent = "Sospechoso";
      break;
    default:
      resultadoCapa.textContent = "Capa no reconocida";
  }
});
