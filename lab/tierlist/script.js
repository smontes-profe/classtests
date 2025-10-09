document.addEventListener('DOMContentLoaded', () => {

  const availableItems = document.getElementById('availableItems');
  const fileInput = document.getElementById('fileInput');
  const addRowBtn = document.getElementById('addRowBtn');
  const tierList = document.getElementById('tierList');
  const themeTitle = document.getElementById('themeTitle');
  const exportBtn = document.getElementById('exportBtn');
  const importInput = document.getElementById('importInput');

  // -------------------------------
  // Drag & Drop de items
  // -------------------------------
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

  // -------------------------------
  // Crear item de imagen
  // -------------------------------
  function createImageItem(src, label = '', id = null, parentContainer = availableItems) {
    const wrapper = document.createElement('div');
    wrapper.classList.add('item');
    wrapper.draggable = true;
    wrapper.id = id || `item-${Date.now()}`;

    const img = document.createElement('img');
    img.src = src;
    wrapper.appendChild(img);

    if (label) {
      const span = document.createElement('span');
      span.innerText = label;
      wrapper.appendChild(span);
    }

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

  // -------------------------------
  // Subir imágenes desde archivo
  // -------------------------------
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

  // -------------------------------
  // Crear nueva fila
  // -------------------------------
  function createNewRow(labelText = "New Tier", color = "#cccccc", id = null) {
    const rowId = id || `row-${Date.now()}`;
    const row = document.createElement('div');
    row.classList.add('tier-row', 'text-white', 'mt-2');
    row.dataset.rowId = rowId;
    row.style.backgroundColor = color;

    row.innerHTML = `
      <div class="tier-header d-flex justify-content-between align-items-center">
        <span contenteditable="true" class="tier-label">${labelText}</span>
        <div class="tier-controls">
          <button class="btn btn-sm btn-light move-up">↑</button>
          <button class="btn btn-sm btn-light move-down">↓</button>
          <input type="color" class="row-color-picker" value="${color}">
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

  // -------------------------------
  // Guardar tier list completa
  // -------------------------------
  function saveTierList() {
    const rows = Array.from(document.querySelectorAll('#tierList .tier-row'));
    const tierData = rows.map((row, index) => ({
      id: row.dataset.rowId,
      label: row.querySelector('.tier-label').innerText,
      color: row.querySelector('.row-color-picker').value,
      position: index
    }));

    const itemsData = [];

    rows.forEach(row => {
      const rowId = row.dataset.rowId;
      row.querySelectorAll('.item').forEach(item => {
        itemsData.push({
          id: item.id,
          src: item.querySelector('img').src,
          label: item.querySelector('span') ? item.querySelector('span').innerText : '',
          rowId: rowId
        });
      });
    });

    availableItems.querySelectorAll('.item').forEach(item => {
      itemsData.push({
        id: item.id,
        src: item.querySelector('img').src,
        label: item.querySelector('span') ? item.querySelector('span').innerText : '',
        rowId: null
      });
    });

    const data = {
      title: themeTitle.innerText,
      tiers: tierData,
      items: itemsData
    };

    localStorage.setItem('tierList', JSON.stringify(data));
  }

  // -------------------------------
  // Cargar tier list completa
  // -------------------------------
  function loadTierList() {
    const data = JSON.parse(localStorage.getItem('tierList') || 'null');
    if (!data) return;

    // Restaurar título
    themeTitle.innerText = data.title || 'Tier List';

    // Limpiar filas y items existentes
    tierList.innerHTML = '';
    availableItems.innerHTML = '';

    // Crear filas en orden
    const sortedTiers = data.tiers.sort((a, b) => a.position - b.position);
    sortedTiers.forEach(rowData => {
      createNewRow(rowData.label, rowData.color, rowData.id);
    });

    // Añadir items
    data.items.forEach(itemData => {
      const parent = itemData.rowId
        ? document.querySelector(`.tier-row[data-row-id="${itemData.rowId}"] .items`)
        : availableItems;
      createImageItem(itemData.src, itemData.label, itemData.id, parent);
    });
  }

  // -------------------------------
  // Inicializar botones y controles
  // -------------------------------
  function initTierControls() {
    const rows = Array.from(document.querySelectorAll('#tierList .tier-row'));
    if (!rows.length) return;

    rows.forEach((row, index) => {
      const upBtn = row.querySelector('.move-up');
      const downBtn = row.querySelector('.move-down');
      const removeBtn = row.querySelector('.remove-row');
      const itemsDiv = row.querySelector('.items');
      const colorPicker = row.querySelector('.row-color-picker');
      const labelSpan = row.querySelector('.tier-label');

      if (!upBtn || !downBtn || !itemsDiv || !colorPicker || !labelSpan) return;

      // Drag & drop
      itemsDiv.removeEventListener('dragover', allowDrop);
      itemsDiv.removeEventListener('drop', drop);
      itemsDiv.addEventListener('dragover', allowDrop);
      itemsDiv.addEventListener('drop', drop);

      // Botones mover
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

      // Eliminar fila
      removeBtn.onclick = () => {
        if (confirm("¿Eliminar esta fila? Los items se perderán.")) {
          row.remove();
          saveTierList();
          initTierControls();
        }
      };

      // Cambiar color de fila
      colorPicker.oninput = () => {
        row.style.backgroundColor = colorPicker.value;
        saveTierList();
      };

      // Guardar cambios de nombre de fila al editar
      labelSpan.addEventListener('input', saveTierList);

      // Enter finaliza edición
      labelSpan.addEventListener('keydown', (e) => {
        if (e.key === 'Enter') {
          e.preventDefault();
          labelSpan.blur();
        }
      });
    });
  }

  // -------------------------------
  // Guardar título al editar
  // -------------------------------
  themeTitle.addEventListener('input', saveTierList);
  themeTitle.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
      e.preventDefault();
      themeTitle.blur();
    }
  });

  // -------------------------------
  // Exportar / Importar JSON
  // -------------------------------
  exportBtn.addEventListener('click', () => {
    const data = localStorage.getItem('tierList');
    if (!data) {
      alert("No hay tier list para exportar.");
      return;
    }
    const blob = new Blob([data], { type: 'application/json' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = 'tierlist.json';
    a.click();
    URL.revokeObjectURL(url);
  });

  importInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(event) {
      try {
        const importedData = JSON.parse(event.target.result);
        localStorage.setItem('tierList', JSON.stringify(importedData));
        loadTierList();
        initTierControls();
        alert("Tier list importada correctamente.");
      } catch (err) {
        alert("Error al importar: archivo inválido.");
      }
    };
    reader.readAsText(file);
    e.target.value = '';
  });

  // -------------------------------
  // Inicialización completa
  // -------------------------------
  loadTierList();
  initTierControls();

});
