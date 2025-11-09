'use strict';

document.addEventListener('DOMContentLoaded', function() {
    
  const boton = document.getElementById('btn-dark-mode');
  const htmlElement = document.documentElement;

  boton.addEventListener('click', function() {
    
    if (htmlElement.getAttribute('data-bs-theme') === 'dark') {
      htmlElement.setAttribute('data-bs-theme', 'light');
      boton.innerHTML = '<i class="bi bi-moon-fill"></i>';
    } else {
      htmlElement.setAttribute('data-bs-theme', 'dark');
      boton.innerHTML = '<i class="bi bi-sun-fill"></i>';
    }
    
  });
  
});