export class ElementoUIFactory {
    crearElementoTarea(tarea, tipo) {
        let elemento;

        if (tipo === 'simple') {
            elemento = document.createElement('li');
            elemento.textContent = tarea.texto;
        } else if (tipo === 'detallada') {
            elemento = document.createElement('div');

            const check = document.createElement('input');
            check.type = 'checkbox';
            check.checked = tarea.completada;
            check.disabled = true;

            const texto = document.createElement('span');
            texto.textContent = tarea.texto;
            texto.style.marginLeft = '8px';

            if (tarea.completada) {
                texto.style.textDecoration = 'line-through';
                texto.style.color = '#888';
            }

            const fecha = document.createElement('div');
            fecha.textContent = `Creada el: ${tarea.fechaCreacion.toLocaleString()}`;

            elemento.appendChild(check);
            elemento.appendChild(texto);
            elemento.appendChild(fecha);

            
        }

        return elemento;
    }
}