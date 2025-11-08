// Versión simplificada para depurar
const header = document.getElementById('mainHeader');
let lastScroll = 0;

window.addEventListener('scroll', function() {
    const currentScroll = window.pageYOffset;
    
    console.log('Scroll actual:', currentScroll);
    console.log('Último scroll:', lastScroll);
    
    if (currentScroll > lastScroll && currentScroll > 200) {
        // Bajando
        console.log('BAJANDO - ocultando header');
        header.style.transform = 'translateY(-100%)';
    } else {
        // Subiendo
        console.log('SUBIENDO - mostrando header');
        header.style.transform = 'translateY(0)';
    }
    
    lastScroll = currentScroll;
});