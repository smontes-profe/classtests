document.addEventListener('DOMContentLoaded', () => {
    // Gallery Logic
    const mainImage = document.getElementById('main-image');
    const thumbnails = document.querySelectorAll('.gallery-thumbnails img');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', () => {
            // Update main image source
            const newSrc = thumb.getAttribute('data-full');
            mainImage.src = newSrc;

            // Update active state
            thumbnails.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');
        });
    });

    // Modal Logic
    const modal = document.getElementById('video-modal');
    const openBtn = document.getElementById('open-modal');
    const closeBtn = document.querySelector('.close-modal');
    const video = document.getElementById('modal-video');

    openBtn.addEventListener('click', () => {
        modal.style.display = 'flex';
        video.play();
    });

    const closeModal = () => {
        modal.style.display = 'none';
        video.pause();
        video.currentTime = 0;
    };

    closeBtn.addEventListener('click', closeModal);

    // Close on click outside
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close on Escape key
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal.style.display === 'flex') {
            closeModal();
        }
    });
});
