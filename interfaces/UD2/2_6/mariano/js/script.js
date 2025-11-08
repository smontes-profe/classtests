"use strict"

document.addEventListener("DOMContentLoaded", () => {
  const arte = document.getElementById("arte");
  const nivel1 = document.getElementById("nivel1");
  const ramas = document.querySelectorAll(".rama");
  const subramas = {
    pintura: ["Pintura 1", "Pintura 2", "Pintura 3"],
    musica: ["Música 1", "Música 2", "Música 3"],
    poesia: ["Poesía 1", "Poesía 2", "Poesía 3"]
  };

  // Al pulsar "Arte" aparecen las tres ramas
  arte.addEventListener("click", () => {
    nivel1.style.display = "flex";
    setTimeout(() => {
      nivel1.style.opacity = "1";
      ramas.forEach((rama, i) => {
        setTimeout(() => rama.classList.add("visible"), i * 300);
      });
    }, 100);
  });

  // Al pulsar en una rama, aparecen las subramas correspondientes
  document.querySelectorAll(".rama-titulo").forEach(titulo => {
    titulo.addEventListener("click", () => {
      const tipo = titulo.getAttribute("data-rama");
      const contenedor = document.getElementById("subrama-" + tipo);

      // Si ya están visibles, las ocultamos
      if (contenedor.classList.contains("visible")) {
        contenedor.classList.remove("visible");
        contenedor.innerHTML = "";
        return;
      }

      // Si no, las creamos dinámicamente
      contenedor.innerHTML = "";
      subramas[tipo].forEach(nombre => {
        const p = document.createElement("p");
        p.textContent = nombre;
        contenedor.appendChild(p);
      });

      contenedor.classList.add("visible");
    });
  });
});