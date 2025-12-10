/**
 * Actualiza la imagen principal de la galería cuando se hace clic en una miniatura
 * @param {string} fullImageSrc - Ruta de la imagen completa a mostrar
 * @param {HTMLElement} clickedThumbnail - Elemento de la miniatura clickeada
 */
function updateGalleryImage(fullImageSrc, clickedThumbnail) {
    const displayImage = document.getElementById('gallery-display');
    displayImage.src = fullImageSrc;

    // Actualizar clase active en las miniaturas
    document.querySelectorAll('.thumbnail').forEach(thumb => {
        thumb.classList.remove('active');
    });
    clickedThumbnail.classList.add('active');
}

/**
 * Muestra el modal de vídeo
 */
function openModal() {
    const modal = document.getElementById('video-modal');
    const video = document.getElementById('modal-video');

    modal.classList.add('active');
    video.play();

    // Prevenir scroll del body cuando el modal está abierto
    document.body.style.overflow = 'hidden';
}

/**
 * Cierra el modal de vídeo
 */
function closeModal() {
    const modal = document.getElementById('video-modal');
    const video = document.getElementById('modal-video');

    modal.classList.remove('active');
    video.pause();
    video.currentTime = 0;

    // Restaurar scroll del body
    document.body.style.overflow = 'auto';
}

// Event Listeners
document.addEventListener('DOMContentLoaded', () => {
    // Galería: Event listeners para las miniaturas
    const thumbnails = document.querySelectorAll('.thumbnail');
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function () {
            const fullImageSrc = this.getAttribute('data-full');
            updateGalleryImage(fullImageSrc, this);
        });

        // Accesibilidad: permitir navegación con teclado
        thumbnail.addEventListener('keydown', function (e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const fullImageSrc = this.getAttribute('data-full');
                updateGalleryImage(fullImageSrc, this);
            }
        });

        // Hacer las miniaturas accesibles por teclado
        thumbnail.setAttribute('tabindex', '0');
    });

    // Modal: Abrir modal
    const openModalBtn = document.getElementById('open-modal');
    if (openModalBtn) {
        openModalBtn.addEventListener('click', openModal);
    }

    // Modal: Cerrar modal con botón X
    const closeModalBtn = document.getElementById('close-modal');
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeModal);
    }

    // Modal: Cerrar modal al hacer clic fuera del vídeo
    const modal = document.getElementById('video-modal');
    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    // Modal: Cerrar modal con tecla ESC
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            const modal = document.getElementById('video-modal');
            if (modal.classList.contains('active')) {
                closeModal();
            }
        }
    });
});
