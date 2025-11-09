document.addEventListener('DOMContentLoaded', function() {
    const btnArte = document.getElementById('btnArte');
    const level2 = document.getElementById('level2');
    const btnCategories = document.querySelectorAll('.btn-category');
    
    let currentOpenLevel3 = null;
    
    // Clic en el botón ARTE
    btnArte.addEventListener('click', function() {
        level2.classList.toggle('active');
        
        // Si se cierra nivel 2, cerrar también todos los nivel 3
        if (!level2.classList.contains('active')) {
            document.querySelectorAll('.level-3').forEach(level => {
                level.classList.remove('active');
            });
            currentOpenLevel3 = null;
        }
    });
    
    // Clic en algun nivel 2
    btnCategories.forEach(btn => {
        btn.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            const targetLevel3 = document.getElementById(category + '-level3');
            
            // Si hay otro nivel 3 abierto, se cierra
            if (currentOpenLevel3 && currentOpenLevel3 !== targetLevel3) {
                currentOpenLevel3.classList.remove('active');
            }
            
            targetLevel3.classList.toggle('active');
            
            // Actualizar el nivel 3 abierto actualmente
            if (targetLevel3.classList.contains('active')) {
                currentOpenLevel3 = targetLevel3;
            } else {
                currentOpenLevel3 = null;
            }
        });
    });
});