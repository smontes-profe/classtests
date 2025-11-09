// main.js — lógica del botón "Arte" y animación de raíces
document.addEventListener("DOMContentLoaded", () => {
  const arteBtn = document.getElementById("arteBtn");
  const roots = document.querySelectorAll(".root-path");
  const sections = document.querySelectorAll(".art-section");

  const playAnimation = () => {
    if (arteBtn) arteBtn.disabled = true;
    sessionStorage.setItem("arteClicked", "true");

    roots.forEach((root, i) => {
      root.classList.add("root-animated");
      root.style.transition = `stroke-dashoffset 2.5s ease ${i * 0.3}s`;
      root.style.strokeDashoffset = "0";

      setTimeout(() => {
        root.classList.remove("root-animated");
        if (sections[i]) sections[i].classList.add("visible");
      }, 1500 + i * 250);
    });
  };

  // Evento del botón
  if (arteBtn) arteBtn.addEventListener("click", playAnimation);

  // Reproducir animación si ya se pulsó antes durante esta sesión
  const arteClicked = sessionStorage.getItem("arteClicked");
  if (arteClicked === "true") {
    setTimeout(playAnimation, 300); // animación automática al volver
  }
});
