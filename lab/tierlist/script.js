document.addEventListener('DOMContentLoaded', () => {

  const availableItems = document.getElementById('availableItems');
  const fileInput = document.getElementById('fileInput');
  const tierRows = document.querySelectorAll('.tier-row');

  // --- Drag & Drop ---
  function allowDrop(ev) { ev.preventDefault(); }
  function drag(ev) { ev.dataTransfer.setData("text/plain", ev.target.id); }

  function drop(ev) {
    ev.preventDefault();
    const id = ev.dataTransfer.getData("text/plain");
    const dragged = document.getElementById(id);
    const dropZone = ev.target.closest('.items');
    if (dropZone) {
      dropZone.appendChild(dragged);
      saveTierList();
    }
  }

  document.querySelectorAll('.items').forEach(zone => {
    zone.addEventListener('dragover', allowDrop);
    zone.addEventListener('drop', drop);
  });

  // --- Crear item con botón eliminar ---
  function createImageItem(src, id = null, parentContainer = availableItems) {
    const wrapper = document.createElement('div');
    wrapper.classList.add('item');
    wrapper.draggable = true;
    wrapper.id = id || `item-${Date.now()}`;

    const img = document.createElement('img');
    img.src = src;
    wrapper.appendChild(img);

    const btn = document.createElement('button');
    btn.classList.add('remove-btn');
    btn.innerText = '×';
    btn.addEventListener('click', () => {
      wrapper.remove();
      saveTierList();
    });
    wrapper.appendChild(btn);

    wrapper.addEventListener('dragstart', drag);

    parentContainer.appendChild(wrapper);
  }

  // --- Subir imágenes ---
  fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(event) {
      createImageItem(event.target.result);
      saveTierList();
    }
    reader.readAsDataURL(file);

    e.target.value = '';
  });

  // --- Guardar tier list en localStorage ---
  function saveTierList() {
    const data = [];
    tierRows.forEach(row => {
      const rowLabel = row.querySelector('.tier-label').innerText;
      row.querySelectorAll('.item').forEach(item => {
        data.push({
          id: item.id,
          src: item.querySelector('img').src,
          tier: rowLabel
        });
      });
    });
    // Items disponibles
    availableItems.querySelectorAll('.item').forEach(item => {
      data.push({
        id: item.id,
        src: item.querySelector('img').src,
        tier: 'available'
      });
    });

    localStorage.setItem('tierList', JSON.stringify(data));
  }

  // --- Cargar tier list desde localStorage ---
  function loadTierList() {
    const data = JSON.parse(localStorage.getItem('tierList') || '[]');
    data.forEach(itemData => {
      const parent = itemData.tier === 'available'
        ? availableItems
        : Array.from(tierRows).find(row => row.querySelector('.tier-label').innerText === itemData.tier).querySelector('.items');

      createImageItem(itemData.src, itemData.id, parent);
    });
  }

  // --- Inicializar ---
  loadTierList();

});
