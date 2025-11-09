document.addEventListener("DOMContentLoaded", () => {
  const body = document.body;
  const header = document.querySelector(".header");

  if (!header) return;

  // Crear botón dark mode
  const darkModeBtn = document.createElement("button");
  darkModeBtn.textContent = "🌙";
  darkModeBtn.id = "darkModeBtn";
  darkModeBtn.style.cssText = `
    background: none;
    border: 2px solid #fff;
    border-radius: 50px;
    color: #fff;
    padding: 0.3rem 0.8rem;
    cursor: pointer;
    font-size: 1.2rem;
    margin-left: 1rem;
  `;
  header.appendChild(darkModeBtn);

  darkModeBtn.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
  });
});
