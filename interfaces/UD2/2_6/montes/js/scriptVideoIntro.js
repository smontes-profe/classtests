// Script para suavizar el loop del video de fondo con Intersection Observer
const video = document.getElementById('background-video');
const videoSection = document.getElementById('video-intro');

// Configurar Intersection Observer
const observerOptions = {
    threshold: 0.5 // El video debe estar al menos 50% visible
};

const videoObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            // Cuando la sección es visible, reinicia y reproduce
            video.currentTime = 0;
            video.play().catch(error => {
                console.log('Autoplay bloqueado:', error);
            });
        } else {
            // Cuando sale de la vista, pausa el video
            video.pause();
        }
    });
}, observerOptions);

// Observar la sección del video
videoObserver.observe(videoSection);

// Reiniciar el video antes de que termine para un loop suave
video.addEventListener('timeupdate', function() {
    // Con un video de 13s, reinicia en el segundo 12.5
    if (this.currentTime >= 12.5) {
        this.currentTime = 0;
    }
});