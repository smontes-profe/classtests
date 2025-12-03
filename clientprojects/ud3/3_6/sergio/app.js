import TaskManager from "./TaskManager.js";
import ElementoUIFactory from "./ElementoUIFactory.js";

//Cojo la unica estancia del TaskManager
const gestor = TaskManager.getInstance();

//Creo la fabrica
const fabrica = new ElementoUIFactory();

//Funcion para mostrar la lista de tareas por consola
function actualizarListaConsola() {
  console.clear();
  console.log("📋 Lista de tareas:");
  gestor.obtenerTareas().forEach(t => console.log(t.toString()));
}

//Funcion para mostrar cuantas tareas hay en total
function mostrarContador() {
  console.log(`Total de tareas: ${gestor.obtenerTareas().length}`);
}

//Funcion para que se actualice la lista en el html cuando hay cambios
function actualizarListaHTML() {
  const lista = document.getElementById("listaTareas");
  //Limpio la lista actual
  lista.innerHTML = "";
  
  //Vuelvo a crear todos los elementos
  gestor.obtenerTareas().forEach(tarea => {
    const elem = fabrica.crearElementoTarea(tarea, "detallado");
    
    //Botones para que sea mas estetico
    const btnCompletar = document.createElement("button");
    btnCompletar.textContent = tarea.completada ? "✓ Hecha" : "Completar";
    btnCompletar.style.marginLeft = "10px";
    btnCompletar.onclick = () => {
      gestor.marcarTareaComoCompletada(tarea.id);
    };
    
    const btnEliminar = document.createElement("button");
    btnEliminar.textContent = "Eliminar";
    btnEliminar.style.marginLeft = "5px";
    btnEliminar.onclick = () => {
      gestor.eliminarTarea(tarea.id);
    };
    
    elem.appendChild(btnCompletar);
    elem.appendChild(btnEliminar);
    lista.appendChild(elem);
  });
}

//Funcion para que se puedan añadir las tareas desde el html
function añadirTarea() {
  const texto = prompt("¿Qué tarea quieres añadir?");
  if (texto && texto.trim() !== "") {
    gestor.agregarTarea(texto.trim());
  }
}

//Añado unos botones al html
document.addEventListener("DOMContentLoaded", () => {
  const lista = document.getElementById("listaTareas");
  
  //Creo contenedor para botones
  const contenedorBotones = document.createElement("div");
  contenedorBotones.style.margin = "20px 0";
  
  const btnAñadir = document.createElement("button");
  btnAñadir.textContent = "➕ Añadir Tarea";
  btnAñadir.onclick = añadirTarea;
  btnAñadir.style.marginRight = "10px";
  
  contenedorBotones.appendChild(btnAñadir);
  
  //Inserto los botones antes de la lista
  lista.parentNode.insertBefore(contenedorBotones, lista);
  
  //Suscribo la funcion que actualiza el html
  gestor.suscribir(actualizarListaHTML);
  
  //Muestro las tareas iniciales
  actualizarListaHTML();
});

//Suscribo las funciones al gestor
gestor.suscribir(actualizarListaConsola);
gestor.suscribir(mostrarContador);

//Marco una tarea como completada
setTimeout(() => {
  const primera = gestor.obtenerTareas()[0];
  if (primera) {
    gestor.marcarTareaComoCompletada(primera.id);
  }
}, 1000);

//Elimino una tarea para probar la reactividad
setTimeout(() => {
  const tareas = gestor.obtenerTareas();
  if (tareas.length > 1) {
    gestor.eliminarTarea(tareas[1].id);
  }
}, 3000);