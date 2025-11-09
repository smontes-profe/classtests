// header.js — lógica del menú hamburguesa
document.addEventListener("DOMContentLoaded", () => {
  const menuToggle = document.getElementById("menuToggle");
  const navList = document.querySelector(".nav-list");

  if (!menuToggle || !navList) return;

  menuToggle.addEventListener("click", () => {
    menuToggle.classList.toggle("active");
    navList.classList.toggle("active");

    // Forzamos display para sobrescribir Bootstrap
    if (navList.classList.contains("active")) {
      navList.style.display = "flex";
      navList.style.flexDirection = "column";
      navList.style.alignItems = "center";
    } else {
      navList.style.display = "none";
    }
  });

  // Restaurar menú al cambiar de tamaño
  window.addEventListener("resize", () => {
    if (window.innerWidth > 768) {
      navList.style.display = "";
      navList.style.flexDirection = "";
      navList.style.alignItems = "";
      menuToggle.classList.remove("active");
      navList.classList.remove("active");
    }
  });
});
