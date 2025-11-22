// Galería Interactiva
document.addEventListener('DOMContentLoaded', function() {
    // Obtener elementos de la galería
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.getElementById('mainImage');
    
    // Agregar evento click a cada miniatura
    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            // Obtener la ruta de la imagen completa desde el atributo data-full
            const fullImagePath = this.getAttribute('data-full');
            
            // Actualizar la imagen principal
            if (mainImage && fullImagePath) {
                mainImage.src = fullImagePath;
                
                // Actualizar la clase 'active' en las miniaturas
                thumbnails.forEach(thumb => thumb.classList.remove('active'));
                this.classList.add('active');
                
                // Efecto de transición suave (opcional)
                mainImage.style.opacity = '0.5';
                setTimeout(() => {
                    mainImage.style.opacity = '1';
                }, 150);
            }
        });
        
        // Agregar soporte para teclado (accesibilidad)
        thumbnail.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
    
    // Inicializar transición de opacidad
    if (mainImage) {
        mainImage.style.transition = 'opacity 0.3s ease';
    }
});

// Modal de Video
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('videoModal');
    const videoBtn = document.getElementById('videoBtn');
    const closeModal = document.querySelector('.close-modal');
    const modalVideo = document.getElementById('modalVideo');
    
    // Abrir modal cuando se hace clic en el botón
    if (videoBtn) {
        videoBtn.addEventListener('click', function() {
            if (modal) {
                modal.classList.add('show');
                // Pausar el video cuando se abre el modal (por si estaba reproduciéndose)
                if (modalVideo) {
                    modalVideo.currentTime = 0;
                }
                // Prevenir scroll del body cuando el modal está abierto
                document.body.style.overflow = 'hidden';
            }
        });
    }
    
    // Cerrar modal cuando se hace clic en el botón de cerrar
    if (closeModal) {
        closeModal.addEventListener('click', function() {
            closeModalModal();
        });
    }
    
    // Cerrar modal cuando se hace clic fuera del contenido
    if (modal) {
        modal.addEventListener('click', function(e) {
            // Si el clic fue directamente en el modal (no en el contenido)
            if (e.target === modal) {
                closeModalModal();
            }
        });
    }
    
    // Cerrar modal con la tecla Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal && modal.classList.contains('show')) {
            closeModalModal();
        }
    });
    
    // Función para cerrar el modal
    function closeModalModal() {
        if (modal) {
            modal.classList.remove('show');
            // Pausar el video cuando se cierra el modal
            if (modalVideo) {
                modalVideo.pause();
            }
            // Restaurar scroll del body
            document.body.style.overflow = 'auto';
        }
    }
});

// Smooth scroll para los enlaces de navegación
document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-menu a[href^="#"]');
    
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                targetSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});

// Efecto de aparición al hacer scroll (opcional, mejora la UX)
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observar secciones principales
    const sections = document.querySelectorAll('section');
    sections.forEach(section => {
        section.style.opacity = '0';
        section.style.transform = 'translateY(20px)';
        section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(section);
    });
});

