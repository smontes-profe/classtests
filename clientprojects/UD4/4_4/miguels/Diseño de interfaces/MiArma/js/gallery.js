'use strict';

// Modern gallery with lightbox
document.addEventListener('DOMContentLoaded', function() {
    const galleryCards = document.querySelectorAll('.gallery-card');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const closeLightbox = document.getElementById('close-lightbox');
    
    // Gallery card click
    galleryCards.forEach(card => {
        card.addEventListener('click', function() {
            const fullSrc = this.dataset.full;
            lightboxImg.src = fullSrc;
            lightbox.classList.add('lightbox-visible');
        });
    });
    
    // Close lightbox
    if (closeLightbox) {
        closeLightbox.addEventListener('click', function() {
            lightbox.classList.remove('lightbox-visible');
        });
    }
    
    // Close on background click
    if (lightbox) {
        lightbox.addEventListener('click', function(e) {
            if (e.target === lightbox) {
                lightbox.classList.remove('lightbox-visible');
            }
        });
    }
    
    // Close on ESC key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && lightbox.classList.contains('lightbox-visible')) {
            lightbox.classList.remove('lightbox-visible');
        }
    });
});
