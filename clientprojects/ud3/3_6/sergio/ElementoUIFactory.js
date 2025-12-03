//Clase para crear elementos del dom para mostrarlos en las tareas
class ElementoUIFactory {
  crearElementoTarea(tarea, tipo) {
    let elemento;

    if (tipo === "simple") {
      //Creo un li
      elemento = document.createElement("li");
      elemento.textContent = tarea.toString();
    } else if (tipo === "detallado") {
      //Creo un div mejorado para que se vea mas bonito
      elemento = document.createElement("div");
      
      const check = document.createElement("input");
      check.type = "checkbox";
      check.checked = tarea.completada;
      check.disabled = true;

      const texto = document.createElement("span");
      texto.textContent = tarea.texto;
      texto.style.fontWeight = "bold";
      texto.style.marginLeft = "10px";
      
      //Si esta completada hago que se tache el texto
      if (tarea.completada) {
        texto.style.textDecoration = "line-through";
        texto.style.color = "#28a745";
      }

      const fecha = document.createElement("small");
      fecha.textContent = "📅 Creada: " + tarea.fechaCreacion.toLocaleString();

      elemento.appendChild(check);
      elemento.appendChild(texto);
      elemento.appendChild(document.createElement("br"));
      elemento.appendChild(fecha);
      
      //Añado estilos para que mejore
      elemento.style.border = "1px solid #ccc";
      elemento.style.margin = "10px 0";
      elemento.style.padding = "15px";
      elemento.style.borderRadius = "8px";
      elemento.style.backgroundColor = tarea.completada ? "#f8fff8" : "#f8f9fa";
    }

    return elemento;
  }
}

export default ElementoUIFactory;