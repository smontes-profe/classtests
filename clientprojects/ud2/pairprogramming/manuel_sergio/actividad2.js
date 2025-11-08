//Seleccionamos los elementos del DOM
const inputTarea = document.getElementById("tarea");
const btnAdd = document.getElementById("btnAdd");
const listaTareas = document.getElementById("listaTareas");
const mensajes = document.getElementById("mensajes");

//Hacemos la funcion para añadir una nueva tarea
function añadirTarea() {
  mensajes.textContent = "";

  //Se coge el texto y se valida
  let texto = inputTarea.value.trim();

  if (texto === "") {
    mensajes.textContent = "Escribe algo antes de añadir.";
    return;
  }

  //Convertimos a mayusculas
  texto = texto.toUpperCase();

  //Creamos el elemento li
  const li = document.createElement("li");
  li.textContent = texto;

  //Funcionalidad completar
  li.addEventListener("click", () => {
    li.classList.toggle("completada");
  });

  //Funcionalidad eliminar
  li.addEventListener("dblclick", () => {
    listaTareas.removeChild(li);
  });

  //Añadimos el elemento a la lista
  listaTareas.appendChild(li);

  //Limpiamos input
  inputTarea.value = "";

  //Mostramos las tareas actuales en consola
  const tareas = listaTareas.querySelectorAll("li");
  console.log("Listado actual de tareas:");
  tareas.forEach((t) => console.log("- " + t.textContent));
}

//Evento del boton
btnAdd.addEventListener("click", añadirTarea);

//Evento Enter
inputTarea.addEventListener("keypress", (e) => {
  if (e.key === "Enter") añadirTarea();
});
