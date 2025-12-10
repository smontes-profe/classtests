// !ESPERAR CARGA DEL DOM
document.addEventListener('DOMContentLoaded', () => {

    // !ANIMACIONES DE SCROLL (Intersection Observer)
    const observerOptions = {
        threshold: 0.1,
        rootMargin: "0px 0px -50px 0px"
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                observer.unobserve(entry.target); // Animar solo una vez
            }
        });
    }, observerOptions);

    // Elementos a animar
    const animateElements = document.querySelectorAll('.gallery-section, .video-section, .footer-content');
    animateElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.8s ease-out, transform 0.8s ease-out';
        observer.observe(el);
    });

    // !LÓGICA DE GALERÍA
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumb-item');

    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', function () {
            // 1. Quitar clase active de todos
            thumbnails.forEach(t => t.classList.remove('active'));

            // 2. Añadir clase active al clickeado
            this.classList.add('active');

            // 3. Obtener ruta de imagen grande del atributo data
            const newSrc = this.getAttribute('data-full');

            // 4. Actualizar imagen principal con efecto fade
            mainImage.style.opacity = '0';
            mainImage.style.transform = 'scale(0.98)';

            setTimeout(() => {
                mainImage.src = newSrc;
                mainImage.style.opacity = '1';
                mainImage.style.transform = 'scale(1)';
            }, 300);
        });
    });

    // !LÓGICA DEL MODAL
    const modal = document.getElementById('videoModal');
    const btn = document.getElementById('openModalBtn');
    const span = document.getElementsByClassName('close-modal')[0];
    const video = document.getElementById('modalVideo');

    // Abrir Modal
    if (btn) {
        btn.onclick = function () {
            modal.style.display = "flex";
            if (video) video.play();
        }
    }

    // Cerrar Modal (Botón X)
    if (span) {
        span.onclick = function () {
            modal.style.display = "none";
            if (video) {
                video.pause();
                video.currentTime = 0;
            }
        }
    }

    // Cerrar Modal (Clic fuera)
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
            if (video) {
                video.pause();
                video.currentTime = 0;
            }
        }
    }

    // !EFECTO MOSAICO VIDEO
    const mosaicOverlay = document.getElementById('mosaicOverlay');
    if (mosaicOverlay) {
        const rows = 10;
        const cols = 10;
        const totalCells = rows * cols;

        for (let i = 0; i < totalCells; i++) {
            const cell = document.createElement('div');
            cell.classList.add('mosaic-cell');

            // Random opacity between 0.3 and 0.95
            const opacity = Math.random() * (0.95 - 0.3) + 0.3;
            cell.style.opacity = opacity;

            // Optional: Add hover effect to clear the cell
            cell.addEventListener('mouseenter', () => {
                cell.style.opacity = '0.1';
            });
            cell.addEventListener('mouseleave', () => {
                cell.style.opacity = opacity;
            });

            mosaicOverlay.appendChild(cell);
        }
    }

    // !MENÚ HAMBURGUESA
    const hamburgerBtn = document.querySelector('.hamburger-btn');
    const nav = document.querySelector('.main-nav');
    const navLinks = document.querySelectorAll('.main-nav a');

    if (hamburgerBtn && nav) {
        hamburgerBtn.addEventListener('click', () => {
            nav.classList.toggle('nav-active');
            hamburgerBtn.classList.toggle('open'); // Toggle class for styling

            // Toggle icon (bars <-> times)
            const icon = hamburgerBtn.querySelector('i');
            if (nav.classList.contains('nav-active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times');
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            }
        });

        // Close menu when clicking a link
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                nav.classList.remove('nav-active');
                hamburgerBtn.classList.remove('open'); // Remove class
                const icon = hamburgerBtn.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
            });
        });

        // Close menu on resize to avoid layout issues
        window.addEventListener('resize', () => {
            if (window.innerWidth > 1023) {
                nav.classList.remove('nav-active');
                hamburgerBtn.classList.remove('open');
                const icon = hamburgerBtn.querySelector('i');
                if (icon) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }
        });
    }
});
