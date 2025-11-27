import TaskManager from './TaskManager.js';
import ElementoUIFactory from './ElementoUIFactory.js';

const gestor = TaskManager.getInstance();
const fabrica = new ElementoUIFactory();

// Contenedor de la lista en el HTML
const ulTareas = document.querySelector('#lista-tareas');

// Observador que actualiza la lista en el DOM usando la fábrica
function actualizarListaDOM() {
    ulTareas.innerHTML = ''; // Limpiar lista

    gestor.obtenerTareas().forEach(tarea => {
        const li = fabrica.crearElementoTarea('li', { 
            className: 'tarea', 
            texto: tarea.toString() 
        });

        const botonCompletar = fabrica.crearElementoTarea('button', {
            className: 'btn-completar',
            texto: '✓',
            onclick: () => gestor.marcarTareaComoCompletada(tarea.id)
        });

        const botonEliminar = fabrica.crearElementoTarea('button', {
            className: 'btn-eliminar',
            texto: '🗑',
            onclick: () => gestor.eliminarTarea(tarea.id)
        });

        li.appendChild(botonCompletar);
        li.appendChild(botonEliminar);
        ulTareas.appendChild(li);
    });
}

// Suscribimos el observador
gestor.suscribir(actualizarListaDOM);

// Prueba: agregar tareas
gestor.agregarTarea('Comprar el pan');
gestor.agregarTarea('Estudiar JavaScript');
