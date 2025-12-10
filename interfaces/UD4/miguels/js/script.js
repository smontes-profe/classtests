'use strict';
/**
 * Inicializa la galería interactiva
 * Permite cambiar la imagen principal al hacer click en las miniaturas
 */
function initGallery() {
  console.log("=== INITIALIZING GALLERY ===");

  // Seleccionar todos los thumbnails de la galería
  const thumbnails = document.querySelectorAll(".gallery-thumbnail");
  console.log(`Found ${thumbnails.length} gallery thumbnails`);

  // Seleccionar el contenedor de la galería
  const galleryContainer = document.querySelector(".gallery-section");
  console.log("Gallery container:", galleryContainer ? "FOUND" : "NOT FOUND");

  if (!galleryContainer || thumbnails.length === 0) {
    console.error("Gallery elements not found!");
    console.error("Container:", galleryContainer);
    console.error("Thumbnails:", thumbnails.length);
    return;
  }

  // Crear contenedor para la imagen grande
  let largeImageContainer = document.querySelector(".gallery-large-view");

  if (!largeImageContainer) {
    console.log("Creating lightbox modal...");
    largeImageContainer = document.createElement("div");
    largeImageContainer.className = "gallery-large-view";
    largeImageContainer.innerHTML = `
      <div class="gallery-large-container">
        <button class="gallery-close" aria-label="Cerrar vista ampliada">&times;</button>
        <img src="" alt="" class="gallery-large-image">
        <p class="gallery-large-caption"></p>
      </div>
    `;
    document.body.appendChild(largeImageContainer);
    console.log("Lightbox modal created");
  } else {
    console.log("Lightbox modal already exists");
  }

  const largeImage = largeImageContainer.querySelector(".gallery-large-image");
  const largeCaption = largeImageContainer.querySelector(
    ".gallery-large-caption"
  );
  const closeBtn = largeImageContainer.querySelector(".gallery-close");

  // Añadir event listeners a cada thumbnail
  thumbnails.forEach((thumbnail, index) => {
    console.log(`Adding click handler to image ${index + 1}`);

    // Click handler
    const clickHandler = function (e) {
      console.log(`CLICK on image ${index + 1}!`);
      e.preventDefault();
      e.stopPropagation();

      // Obtener la ruta de la imagen completa
      const fullImageSrc = this.src;
      const altText = this.alt;

      console.log("Image src:", fullImageSrc);
      console.log("Alt text:", altText);

      // Obtener el título de la obra desde el caption
      const artworkCard = this.closest(".gallery-artwork");
      const artworkTitle = artworkCard
        ? artworkCard.querySelector(".artwork-title")?.textContent
        : altText;

      console.log("Artwork title:", artworkTitle);

      // Actualizar imagen grande
      largeImage.src = fullImageSrc;
      largeImage.alt = altText;
      largeCaption.textContent = artworkTitle || altText;

      // Mostrar el contenedor de imagen grande
      largeImageContainer.classList.add("active");
      console.log("Lightbox opened!");

      // Prevenir scroll del body
      document.body.style.overflow = "hidden";
    };

    thumbnail.addEventListener("click", clickHandler);

    // También agregar al contenedor de la imagen por si acaso
    const imageContainer = thumbnail.closest(".artwork-image-container");
    if (imageContainer) {
      imageContainer.addEventListener("click", clickHandler);
    }

    // Mejorar accesibilidad: permitir navegación con teclado
    thumbnail.addEventListener("keypress", function (e) {
      if (e.key === "Enter" || e.key === " ") {
        e.preventDefault();
        this.click();
      }
    });

    // Hacer los thumbnails focusables
    thumbnail.setAttribute("tabindex", "0");
    thumbnail.style.cursor = "pointer";
  });

  // Cerrar vista ampliada
  function closeGalleryView() {
    console.log("Closing lightbox...");
    largeImageContainer.classList.remove("active");
    document.body.style.overflow = "";
  }

  closeBtn.addEventListener("click", closeGalleryView);

  // Cerrar al hacer click fuera de la imagen
  largeImageContainer.addEventListener("click", function (e) {
    if (e.target === largeImageContainer) {
      closeGalleryView();
    }
  });

  // Cerrar con tecla Escape
  document.addEventListener("keydown", function (e) {
    if (
      e.key === "Escape" &&
      largeImageContainer.classList.contains("active")
    ) {
      closeGalleryView();
    }
  });

  console.log(
    `Gallery initialized successfully with ${thumbnails.length} images`
  );
}

// MODAL DE VÍDEO

/**
 * Inicializa el modal de vídeo
 * Muestra el vídeo en un overlay al hacer click en el botón "Ver Reel"
 */
function initVideoModal() {
  const videoBtn = document.querySelector(".video-reel-btn");
  const modal = document.querySelector(".video-modal");

  if (!videoBtn || !modal) {
    console.warn("Video modal elements not found");
    return;
  }

  const closeBtn = modal.querySelector(".modal-close");
  const video = modal.querySelector("video");

  // Abrir modal
  videoBtn.addEventListener("click", function (e) {
    e.preventDefault();
    modal.classList.add("active");
    document.body.style.overflow = "hidden";

    // Reproducir vídeo automáticamente al abrir
    if (video) {
      video.play().catch((err) => console.log("Autoplay prevented:", err));
    }
  });

  // Cerrar modal
  function closeModal() {
    modal.classList.remove("active");
    document.body.style.overflow = "";

    // Pausar vídeo al cerrar
    if (video) {
      video.pause();
      video.currentTime = 0;
    }
  }

  closeBtn.addEventListener("click", closeModal);

  // Cerrar al hacer click fuera del video
  modal.addEventListener("click", function (e) {
    // Cerrar si se hace clic en el modal o en el modal-content, pero no en el video
    if (e.target === modal || e.target.classList.contains('modal-content') || e.target.classList.contains('video-container')) {
      closeModal();
    }
  });

  // Cerrar con tecla Escape
  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape" && modal.classList.contains("active")) {
      closeModal();
    }
  });
}

// INICIALIZACIÓN

/**
 * Inicializa todas las funcionalidades cuando el DOM está listo
 */
document.addEventListener("DOMContentLoaded", function () {
  console.log("MiArma Portfolio - Initializing...");

  // Inicializar galería
  initGallery();

  // Inicializar modal de vídeo
  initVideoModal();

  console.log("MiArma Portfolio - Ready!");
});

// MEJORAS DE ACCESIBILIDAD

/**
 * Mejora el feedback visual de elementos interactivos
 */
function enhanceAccessibility() {
  // Añadir indicador visual para elementos con focus
  const interactiveElements = document.querySelectorAll(
    "a, button, [tabindex]"
  );

  interactiveElements.forEach((element) => {
    element.addEventListener("focus", function () {
      this.classList.add("has-focus");
    });

    element.addEventListener("blur", function () {
      this.classList.remove("has-focus");
    });
  });
}

// Ejecutar mejoras de accesibilidad
document.addEventListener("DOMContentLoaded", enhanceAccessibility);
