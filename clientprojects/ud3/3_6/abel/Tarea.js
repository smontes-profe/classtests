//Creaos la clase
class Tarea {


    /**
   * 
   * @param {number|string} id - Identificador único de la tarea.
   * @param {string} texto - Descripción o texto de la tarea.
   * @param {boolean} [completada=false] - Indica si la tarea está completada (por defecto false).
   * @param {Date} [fechaCreacion=new Date()] - Fecha de creación de la tarea.
   */


    //Creamos el constructor 
    constructor(id,texto,completada,fechaCreacion){
    /** @type {number|string} */
    this.id = id;

    /** @type {string} */
    this.texto = texto;

    /** @type {boolean} */
    this.completada = completada;

    /** @type {Date} */
    this.fechaCreacion = fechaCreacion;
    } 

    //Añadimos los métodos
    
    //Marca la tarea como completada
    completar(){
        this.completada = true;
        return this.completada;
    }

    // Ejemplo: "[ ] Comprar el pan" o "[x] Comprar el pan" si está completada
    toString(){
        const marca = this.completada ? '[x]' : '[ ]';
        return `${marca} ${this.texto}`;
    }
}

// Exportar la clase
export default Tarea;