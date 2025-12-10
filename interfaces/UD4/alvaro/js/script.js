document.addEventListener('DOMContentLoaded', () => {
    
    // --- 1. LÓGICA DE LA GALERÍA INTERACTIVA ---
    
    const mainImage = document.getElementById('main-gallery-image');
    const thumbnails = document.querySelectorAll('.thumbnail');

    // Función principal para cambiar la imagen
    const changeImage = (element) => {
        const fullImageUrl = element.getAttribute('data-full-img');
        const newAltText = element.getAttribute('alt');

        // Reemplazar la URL y el alt de la imagen principal
        mainImage.src = fullImageUrl;
        mainImage.alt = newAltText;
    };
    
    // Asignar eventos a cada miniatura (click y tecla para accesibilidad)
    thumbnails.forEach(thumb => {
        // Evento Click
        thumb.addEventListener('click', () => {
            changeImage(thumb);
        });
        
        // Evento Keydown (para accesibilidad por teclado: Enter o Espacio)
        thumb.addEventListener('keydown', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault(); 
                changeImage(thumb);
            }
        });
    });


    // --- 2. LÓGICA DEL MODAL DE VÍDEO ---
    
    const modal = document.getElementById('video-modal');
    const viewReelButton = document.getElementById('view-reel-button');
    const closeButton = modal.querySelector('.close-button');
    const reelVideo = document.getElementById('reel-video');

    // Función para cerrar el modal (incluyendo pausa de vídeo)
    const closeModal = () => {
        modal.classList.remove('is-visible');
        reelVideo.pause();
        reelVideo.currentTime = 0; // Rebobinar
    };

    // Mostrar modal y empezar vídeo
    viewReelButton.addEventListener('click', () => {
        modal.classList.add('is-visible');
        closeButton.focus();
        reelVideo.play(); 
    });

    // Cerrar al hacer clic en 'X'
    closeButton.addEventListener('click', closeModal);

    // Cerrar al hacer clic FUERA del modal (en el fondo)
    modal.addEventListener('click', (event) => {
        if (event.target === modal) {
            closeModal();
        }
    });

    // Cerrar al presionar la tecla ESC
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && modal.classList.contains('is-visible')) {
            closeModal();
        }
    });

});