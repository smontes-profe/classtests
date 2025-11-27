import { TaskManager } from "./TaskManager.js";
import { ElementoUIFactory } from "./ElementoUIFactory.js";

const gestor = TaskManager.getInstance();

const listaSimple = document.getElementById("lista-simple");
const listaDetallada = document.getElementById("lista-detallada");



function renderizarListas() {
  // limpiar, sino me da algunos errores hevys
  listaSimple.innerHTML = "";
  listaDetallada.innerHTML = "";

  // segun tipo 
  gestor.obtenerTareas().forEach((tarea) => {
    const li = ElementoUIFactory.crearElementoTarea(tarea, "simple");
    const div = ElementoUIFactory.crearElementoTarea(tarea, "detallado");
    listaSimple.appendChild(li);
    listaDetallada.appendChild(div);
  });
}

