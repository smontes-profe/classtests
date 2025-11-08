// Datos de los proyectos
const proyectosData = {
    estacion: {
        title: "ESTACIÓN TERMITARIA",
        subtitle: "Arquitectura Biomimética",
        description: [
            "La biomimética se basa en observar la naturaleza a una escala de metro o un nivel anatómico, pero con un diseño arquitectónico inspirado en la biomimética de los termiteros.",
            "Los aspectos y hechos presentan una planta solidaria y eficiente, similar a la forma reconocida por termitas, con cavidades habitables que asisten garantías y ciencias de las partidas mismas.",
            "El diseño sigue la naturaleza y adaptado de las características económicas adapta de la simulación y ventilación."
        ],
        images: [
            "resources/img/estacion1.png",
            "resources/img/estacion2.png",
            "resources/img/estacion3.png",
            "resources/img/estacion4.png"   
        ]
    },
    torre: {
        title: "TORRE TERMITARIA",
        subtitle: "Edificio de oficinas sostenible",
        description: [
            "Es un edificio vertical de 18 pisos de uso mixto (residencial y retail comercial) que se basa en la biomimética de termiteros.",
            "La estructura recuerda a un termitero vivo, en el que los huecos naturales sirven para su propia climatización de manera natural y reducen hasta un 90% la utilización de AC.",
            "Además se estudia ingeniera, contigüidad de un termitero con ventilación natural a través de sus datos de termitas."
        ],
        images: [
            "resources/img/torre1.jpg",
            "resources/img/torre2.jpg",
            "resources/img/torre3.jpg",
            "resources/img/torre4.jpg"
        ]
    },
    habitat: {
        title: "TERMITA HABITAT",
        subtitle: "Arquitectura Biomimética y Arquitectura",
        description: [
            "Termita Hábitat es una vivienda inspirada en las termitas, lo cual se refleja tanto en su forma vegetal como en su integración con el entorno natural.",
            "La construcción presenta un diseño ondulante y único, con una cubierta que responde a las moléculas de termitas.",
            "La fachada está hecha de materiales que protegen la construcción del entorno, lo que reduce el calor y grandes ventanales que permiten el paso a través del exterior."
        ],
        images: [
            "resources/img/habitat1.jpg",
            "resources/img/habitat2.jpg",
            "resources/img/habitat3.jpg",
            "resources/img/habitat4.jpg"
        ]
    },
    "eastgate-detail": {
        title: "EASTGATE CENTRE",
        subtitle: "El edificio más emblemático",
        description: [
            "El Eastgate Centre en Harare, Zimbabue, es uno de los ejemplos más famosos de arquitectura biomimética inspirada en termiteros.",
            "El edificio utiliza solo el 10% de la energía de un edificio convencional de su tamaño gracias a su sistema de ventilación natural.",
            "Las chimeneas y conductos imitan el sistema de ventilación de los termiteros, manteniendo una temperatura constante sin aire acondicionado."
        ],
        images: [
            "resources/img/eastgate1.jpg",
            "resources/img/eastgate2.jpg",
            "resources/img/eastgate3.jpg",
            "resources/img/eastgate4.jpg"
        ]
    }
};

// Variables del carrusel
let currentIndex = 0;
const track = document.querySelector('.carousel-track');
const slides = document.querySelectorAll('.proyecto-slide');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');

// Variables del modal
const modal = document.getElementById('proyectoModal');
const closeModal = document.getElementById('closeModal');
const modalTitle = document.getElementById('modalTitle');
const modalSubtitle = document.getElementById('modalSubtitle');
const modalDescription = document.getElementById('modalDescription');
const modalGallery = document.getElementById('modalGallery');

// Función para mover el carrusel
function moveCarousel(direction) {
    const slideWidth = slides[0].offsetWidth;
    const gap = 32; // 2rem en pixels
    const totalSlides = slides.length;
    
    currentIndex += direction;
    
    // Loop infinito
    if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
    } else if (currentIndex >= totalSlides) {
        currentIndex = 0;
    }
    
    const offset = -(currentIndex * (slideWidth + gap));
    track.style.transform = `translateX(${offset}px)`;
}

// Event listeners para los botones del carrusel
prevBtn.addEventListener('click', () => moveCarousel(-1));
nextBtn.addEventListener('click', () => moveCarousel(1));

// Auto-play del carrusel (opcional)
let autoplayInterval = setInterval(() => moveCarousel(1), 5000);

// Pausar autoplay al hover
document.querySelector('.proyectos-carousel').addEventListener('mouseenter', () => {
    clearInterval(autoplayInterval);
});

document.querySelector('.proyectos-carousel').addEventListener('mouseleave', () => {
    autoplayInterval = setInterval(() => moveCarousel(1), 5000);
});

// Abrir modal al hacer clic en un proyecto
slides.forEach(slide => {
    slide.addEventListener('click', () => {
        const proyectoId = slide.dataset.proyecto;
        const proyecto = proyectosData[proyectoId];
        
        if (proyecto) {
            // Llenar el modal con datos
            modalTitle.textContent = proyecto.title;
            modalSubtitle.textContent = proyecto.subtitle;
            
            // Agregar descripción
            modalDescription.innerHTML = proyecto.description
                .map(p => `<p>${p}</p>`)
                .join('');
            
            // Agregar imágenes
            modalGallery.innerHTML = proyecto.images
                .map(img => `<img src="${img}" alt="${proyecto.title}">`)
                .join('');
            
            // Mostrar modal
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    });
});

// Cerrar modal
closeModal.addEventListener('click', () => {
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
});

// Cerrar modal al hacer clic fuera
modal.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
});

// Cerrar modal con tecla ESC
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('active')) {
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }
});