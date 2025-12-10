// ELEMENTOS DEL MODAL
const reelBtn = document.getElementById("reelBtnInline");
const videoModal = document.getElementById("videoModal");
const modalBackdrop = document.getElementById("modalBackdrop");
const closeModal = document.getElementById("closeModal");
const modalVideo = document.getElementById("modalVideo");


// ABRIR MODAL
if (reelBtn) {
    reelBtn.addEventListener("click", () => {
        videoModal.classList.add("active");
        videoModal.setAttribute("aria-hidden", "false");
        modalVideo.play();
    });
}


// CERRAR MODAL
function closeVideoModal() {
    videoModal.classList.remove("active");
    videoModal.setAttribute("aria-hidden", "true");
    modalVideo.pause();
    modalVideo.currentTime = 0;
}

if (closeModal) closeModal.addEventListener("click", closeVideoModal);
if (modalBackdrop) modalBackdrop.addEventListener("click", closeVideoModal);



// GALERÍA
document.addEventListener("DOMContentLoaded", () => {
    
    const mainImage = document.getElementById("mainImage");
    const miniaturas = document.querySelectorAll(".miniat img");

    // Si no existe la galería, no hacemos nada
    if (!mainImage || miniaturas.length === 0) return;

    miniaturas.forEach(img => {
        img.addEventListener("click", () => {
            mainImage.src = img.src;
        });
    });

});


