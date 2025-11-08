//Capturamos los elementos del DOM
const inputTarea = document.getElementById("tarea");
const btnAdd = document.getElementById("btnAdd");
const listaTareas = document.getElementById("listaTareas");
const mensajes = document.getElementById("mensajes");

//Añadimos evento al boton
btnAdd.addEventListener("click", function() {
  mensajes.textContent = "";

  //Capturamos texto del input
  let textoTarea = inputTarea.value.trim();
  console.log("Texto capturado:", textoTarea);

  //Validamos
  if (textoTarea === "") {
    mensajes.textContent = "El campo no puede estar vacío.";
    return;
  }

  //Hacemos la conversion a mayusculas
  textoTarea = textoTarea.toUpperCase();

  //Creamos y ponemos el li
  const li = document.createElement("li");
  li.textContent = textoTarea;
  listaTareas.appendChild(li);

  //Limpiamos el input
  inputTarea.value = "";

  //Recorremos la lista de tareas y las mostramos en consola
  const tareas = listaTareas.getElementsByTagName("li");
  console.log("Listado actual de tareas:");
  for (let i = 0; i < tareas.length; i++) {
    console.log(`- ${tareas[i].textContent}`);
  }
});
