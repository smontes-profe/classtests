document.addEventListener('DOMContentLoaded', () => {

  const availableItems = document.getElementById('availableItems');
  const fileInput = document.getElementById('fileInput');

  function allowDrop(ev) { ev.preventDefault(); }

  function drag(ev) { ev.dataTransfer.setData("text/plain", ev.target.id); }

  function drop(ev) {
    ev.preventDefault();
    const id = ev.dataTransfer.getData("text/plain");
    const dragged = document.getElementById(id);

    // Se asegura de añadir al contenedor .items
    const dropZone = ev.target.closest('.items');
    if (dropZone) dropZone.appendChild(dragged);
  }

  document.querySelectorAll('.items').forEach(zone => {
    zone.addEventListener('dragover', allowDrop);
    zone.addEventListener('drop', drop);
  });

  function createImageItem(src) {
    const wrapper = document.createElement('div');
    wrapper.classList.add('item');
    wrapper.draggable = true;
    wrapper.id = `item-${Date.now()}`;

    const img = document.createElement('img');
    img.src = src;
    wrapper.appendChild(img);

    const btn = document.createElement('button');
    btn.classList.add('remove-btn');
    btn.innerText = '×';
    btn.addEventListener('click', () => wrapper.remove());
    wrapper.appendChild(btn);

    wrapper.addEventListener('dragstart', drag);

    availableItems.appendChild(wrapper);
  }

  fileInput.addEventListener('change', (e) => {
    const file = e.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    reader.onload = function(event) {
      createImageItem(event.target.result);
    }
    reader.readAsDataURL(file);

    e.target.value = '';
  });
});
