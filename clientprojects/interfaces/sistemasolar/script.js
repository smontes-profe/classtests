
    (function(){
      const viewport = document.getElementById('viewport');
      const planets = Array.from(document.querySelectorAll('.planet'));
      const sun = document.querySelector('.sun');
      const buttons = document.querySelectorAll('button[data-view]');
      let currentView = 'scaleDistance';

      function positionPlanets(){
        const vpRect = viewport.getBoundingClientRect();
        const sunRect = sun.getBoundingClientRect();
        const sunCenterX = sunRect.left + sunRect.width/2 - vpRect.left;
        const rightPadding = 18;

        if(currentView === 'scaleDistance'){ // Distancias a escala, tamaños visibles
          sun.style.width = 'var(--sun-size)';
          sun.style.height = 'var(--sun-size)';

          const auValues = planets.map(p=> parseFloat(p.getAttribute('data-au')));
          const maxAU = Math.max(...auValues);
          const available = vpRect.width - sunCenterX - rightPadding;
          const scale = available / maxAU;

          planets.forEach(p=>{
            const au = parseFloat(p.getAttribute('data-au'));
            p.style.left = (sunCenterX + au * scale) + 'px';
            const diameter = parseFloat(p.getAttribute('data-diameter'));
            p.style.width = diameter + 'px';
            p.style.height = diameter + 'px';
          });
        }
        else if(currentView === 'scaleSize'){ // Tamaños a escala, equidistantes horizontalmente
          const spacing = (vpRect.width - sunCenterX - rightPadding) / planets.length;
          planets.forEach((p,i)=>{
            const x = sunCenterX + spacing * (i+1);
            const diameter = parseFloat(p.getAttribute('data-diameter'));
            p.style.left = x + 'px';
            p.style.width = diameter + 'px';
            p.style.height = diameter + 'px';
          });
          sun.style.width = '10px'; sun.style.height = '10px'; // Sol pequeño
        }
        else if(currentView === 'scaleDistanceSol'){ // Distancias a escala, tamaños como opción 1
          sun.style.width = 'var(--sun-size)';
          sun.style.height = 'var(--sun-size)';

          const auValues = planets.map(p=> parseFloat(p.getAttribute('data-au')));
          const maxAU = Math.max(...auValues);
          const available = vpRect.width - sunCenterX - rightPadding;
          const scale = available / maxAU;

          planets.forEach(p=>{
            const au = parseFloat(p.getAttribute('data-au'));
            p.style.left = (sunCenterX + au * scale) + 'px';
            const diameter = parseFloat(p.getAttribute('data-diameter'));
            p.style.width = diameter + 'px';
            p.style.height = diameter + 'px';
          });
        }
      }

      buttons.forEach(btn=> btn.addEventListener('click', ()=>{
        currentView = btn.getAttribute('data-view');
        positionPlanets();
      }));

      window.addEventListener('resize', positionPlanets);
      planets.forEach(p=> p.addEventListener('click', e=> e.preventDefault()));

      positionPlanets();
    })();