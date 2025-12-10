document.addEventListener('DOMContentLoaded', () => {
    // Gallery Logic
    const mainImage = document.getElementById('main-display');
    const thumbnails = document.querySelectorAll('.thumb');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function () {
            // Update main image source
            const fullSrc = this.getAttribute('data-full');
            mainImage.style.opacity = '0';

            setTimeout(() => {
                mainImage.src = fullSrc;
                mainImage.onload = () => {
                    mainImage.style.opacity = '1';
                };
            }, 300); // Wait for fade out

            // Update active class
            thumbnails.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Modal Logic
    const modal = document.getElementById('video-modal');
    const openModalBtn = document.getElementById('play-reel');
    const closeModalBtn = document.querySelector('.close-modal');
    const video = document.getElementById('presentation-video');

    openModalBtn.addEventListener('click', () => {
        modal.classList.add('visible');
        video.play();
    });

    closeModalBtn.addEventListener('click', () => {
        closeModal();
    });

    // Close modal when clicking outside content
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    function closeModal() {
        modal.classList.remove('visible');
        video.pause();
        video.currentTime = 0;
    }
});
