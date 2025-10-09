document.addEventListener('DOMContentLoaded', () => {

  const availableItems = document.getElementById('availableItems');
  const fileInput = document.getElementById('fileInput');
  const addRowBtn = document.getElementById('addRowBtn');
  const tierList = document.getElementById('tierList');

  // --- Drag & Drop de items ---
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

  // --- Crear item de imagen con botón eliminar ---
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

  // --- Subir imágenes desde archivo ---
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
    const rows = Array.from(document.querySelectorAll('#tierList .tier-row'));
    const rowColor = row.querySelector('.row-color-picker').value; // nuevo
    rows.forEach(row => {
      const rowLabel = row.querySelector('.tier-label').innerText;
      row.querySelectorAll('.item').forEach(item => {
        data.push({
          id: item.id,
          src: item.querySelector('img').src,
          tier: rowLabel,
          color: rowColor // nuevo
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

  // --- Cargar tier list (comentado por ahora) ---
  function loadTierList() {
    /*
    const data = JSON.parse(localStorage.getItem('tierList') || '[]');
    const rows = Array.from(document.querySelectorAll('#tierList .tier-row'));
    data.forEach(itemData => {
      const parent = itemData.tier === 'available'
        ? availableItems
        : rows.find(row => row.querySelector('.tier-label').innerText === itemData.tier)
              .querySelector('.items');
      createImageItem(itemData.src, itemData.id, parent);
    });
    */
  }

  // --- Crear nueva fila ---
  function createNewRow(labelText = "New Tier") {
    const row = document.createElement('div');
    row.classList.add('tier-row', 'text-white', 'mt-2');
    row.style.backgroundColor = '#cccccc'; // color por defecto

    row.innerHTML = `
      <div class="tier-header d-flex justify-content-between align-items-center">
        <span contenteditable="true" class="tier-label">${labelText}</span>
        <div class="tier-controls">
          <button class="btn btn-sm btn-light move-up">↑</button>
          <button class="btn btn-sm btn-light move-down">↓</button>
          <input type="color" class="row-color-picker" value="#cccccc">
          <button class="btn btn-sm btn-danger remove-row">✕</button>
        </div>
      </div>
      <div class="items"></div>
    `;

    const itemsDiv = row.querySelector('.items');
    itemsDiv.addEventListener('dragover', allowDrop);
    itemsDiv.addEventListener('drop', drop);

    tierList.appendChild(row);
    initTierControls();
  }


  addRowBtn.addEventListener('click', () => {
    createNewRow();
    saveTierList();
  });

  // --- Inicializar botones mover / eliminar filas ---

function initTierControls() {
  const rows = Array.from(document.querySelectorAll('#tierList .tier-row'));
  if (!rows.length) return;

  rows.forEach((row, index) => {
    const upBtn = row.querySelector('.move-up');
    const downBtn = row.querySelector('.move-down');
    const removeBtn = row.querySelector('.remove-row');
    const itemsDiv = row.querySelector('.items');
    const colorPicker = row.querySelector('.row-color-picker');
    if (!upBtn || !downBtn || !itemsDiv || !colorPicker) return;

    // --- Drag & drop ---
    itemsDiv.removeEventListener('dragover', allowDrop);
    itemsDiv.removeEventListener('drop', drop);
    itemsDiv.addEventListener('dragover', allowDrop);
    itemsDiv.addEventListener('drop', drop);

    // --- Botones mover ---
    upBtn.disabled = index === 0;
    upBtn.onclick = () => {
      if (index === 0) return;
      const prev = row.previousElementSibling;
      row.parentNode.insertBefore(row, prev);
      saveTierList();
      initTierControls();
    };

    downBtn.disabled = index === rows.length - 1;
    downBtn.onclick = () => {
      if (index === rows.length - 1) return;
      const next = row.nextElementSibling;
      row.parentNode.insertBefore(next, row);
      saveTierList();
      initTierControls();
    };

    // --- Eliminar fila ---
    removeBtn.onclick = () => {
      if (confirm("¿Eliminar esta fila? Los items se perderán.")) {
        row.remove();
        saveTierList();
        initTierControls();
      }
    };

    // --- Cambiar color de fila ---
    colorPicker.oninput = () => {
      row.style.backgroundColor = colorPicker.value;
      saveTierList();
    };
  });
}



  // --- Inicializar ---
  // loadTierList(); // desactivado por ahora
  initTierControls();

});
