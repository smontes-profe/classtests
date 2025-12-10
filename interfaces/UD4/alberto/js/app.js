document.addEventListener('DOMContentLoaded', () => {
    // Elements
    const btnGallery = document.getElementById('btn-gallery');
    const btnVideo = document.getElementById('btn-video');
    const btnAudio = document.getElementById('btn-audio');

    const galleryView = document.getElementById('gallery-view');
    const videoView = document.getElementById('video-view');

    const audioPlayer = document.getElementById('audio-player-container');
    const closeAudioBtn = document.getElementById('close-audio');

    // Theme Toggle Logic (Default is Dark, switching to Light)
    const themeBtn = document.getElementById('theme-toggle');
    if (themeBtn) {
        const icon = themeBtn.querySelector('.material-icons');
        // Initial state check (optional, seeing as CSS default is dark)

        themeBtn.addEventListener('click', () => {
            const body = document.body;
            if (body.getAttribute('data-theme') === 'light') {
                body.removeAttribute('data-theme'); // Back to Dark
                icon.textContent = 'light_mode'; // Sun icon allows switch to light
            } else {
                body.setAttribute('data-theme', 'light');
                icon.textContent = 'dark_mode'; // Moon icon allows switch to dark
            }
        });
    }


    const mainHeroImage = document.getElementById('main-hero-image');
    // Updated selector to match new HTML class
    const thumbs = document.querySelectorAll('.thumb-card');

    // Navigation Logic
    function switchView(viewName) {
        if (viewName === 'gallery') {
            galleryView.classList.remove('hidden');
            // Small delay to allow display:flex to apply before opacity transition
            setTimeout(() => galleryView.classList.add('active'), 10);

            videoView.classList.remove('active');
            setTimeout(() => videoView.classList.add('hidden'), 500);

            btnGallery.classList.add('active');
            btnVideo.classList.remove('active');
        } else if (viewName === 'video') {
            videoView.classList.remove('hidden');
            setTimeout(() => videoView.classList.add('active'), 10);

            galleryView.classList.remove('active');
            setTimeout(() => galleryView.classList.add('hidden'), 500);

            btnVideo.classList.add('active');
            btnGallery.classList.remove('active');
        }
    }

    btnGallery.addEventListener('click', () => switchView('gallery'));
    btnVideo.addEventListener('click', () => switchView('video'));

    // Audio Player Logic
    btnAudio.addEventListener('click', () => {
        audioPlayer.classList.toggle('hidden');
        btnAudio.classList.toggle('active');
    });

    closeAudioBtn.addEventListener('click', () => {
        audioPlayer.classList.add('hidden');
        btnAudio.classList.remove('active');
    });

    // Video Play/Pause Overlay Logic
    const mainVideo = document.getElementById('main-video');
    const videoOverlay = document.getElementById('video-overlay');

    if (mainVideo && videoOverlay) {
        // Play on overlay click
        videoOverlay.addEventListener('click', () => {
            mainVideo.play();
        });

        // Hide overlay when playing
        mainVideo.addEventListener('play', () => {
            videoOverlay.classList.add('hidden');
        });

        // Show overlay when paused or ended
        const showOverlay = () => {
            videoOverlay.classList.remove('hidden');
        };

        mainVideo.addEventListener('pause', showOverlay);
        mainVideo.addEventListener('ended', showOverlay);
    }

    // Gallery Logic
    thumbs.forEach(thumb => {
        thumb.addEventListener('click', (e) => {
            // Updated to handle click on children elements inside the card
            // We are attaching the listener to the card, so 'thumb' is the card

            // Update active state
            thumbs.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');

            // Update main image
            const fullSrc = thumb.getAttribute('data-full');

            // Simple fade out/in effect
            mainHeroImage.style.opacity = '0';
            setTimeout(() => {
                mainHeroImage.src = fullSrc;
                mainHeroImage.onload = () => {
                    mainHeroImage.style.opacity = '1';
                };
            }, 300);
        });
    });
});
