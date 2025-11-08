document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("darkModeToggle");
    const modeIcon = document.getElementById("modeIcon");
    const modeLabel = document.getElementById("modeLabel");

    function actualizarBotonModoOscuro(activado) {
        if (activado) {
            modeIcon.src = "./images/DarkMode_On.png";
            modeIcon.alt = "Light Mode";
            modeLabel.textContent = "Light Mode";
        } else {
            modeIcon.src = "./images/DarkMode_Off.png";
            modeIcon.alt = "Dark Mode";
            modeLabel.textContent = "Dark Mode";
        }
    }

    toggleButton.addEventListener("click", () => {
        const estaActivo = document.body.classList.toggle("dark-mode");
        localStorage.setItem("modoOscuro", estaActivo ? "true" : "false");
        actualizarBotonModoOscuro(estaActivo);
    });

    // Al cargar, aplicar preferencia guardada
    const modoOscuroGuardado = localStorage.getItem("modoOscuro") === "true";
    if (modoOscuroGuardado) {
        document.body.classList.add("dark-mode");
    }
    actualizarBotonModoOscuro(modoOscuroGuardado);
});