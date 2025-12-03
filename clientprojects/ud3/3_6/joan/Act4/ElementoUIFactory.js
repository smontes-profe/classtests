/**
 * @file 
 * @description 
 */



/**
 
 * @class
 */
export class ElementoUIFactory {
  /**
   * 
   * add un elemento del dom segun tipo
   * @method
   * @param {import('./Tarea.js').Tarea} tarea - obj tipo tarea
   * @param {"simple" | "detallado"} tipo - tipo del elemento
   * @returns {HTMLElement} 
   */




  static crearElementoTarea(tarea, tipo) {
    let elemento;

    if (tipo === "simple") {
      elemento = document.createElement("li");
      elemento.textContent = tarea.toString();

    } else if (tipo === "detallado") {
      elemento = document.createElement("div");
      elemento.classList.add("tarea-detallada");


      const texto = document.createElement("p");
      texto.textContent = tarea.texto;

      const fecha = document.createElement("small");
      fecha.textContent = `creada: ${tarea.fechaCreacion.toLocaleString()}`;

      const checkbox = document.createElement("input");
      checkbox.type = "checkbox";

      checkbox.checked = tarea.completada;
      checkbox.addEventListener("change", () => {
        tarea.completar();

        texto.style.textDecoration = tarea.completada ? "line-through" : "none";
      });




      elemento.appendChild(checkbox);
      elemento.appendChild(texto);
      elemento.appendChild(fecha);
    } else {
      throw new Error("no valido o no lo has escrito bien");
    }

    return elemento;
  }
}
