//Hago la clase para representar una tarea
class Tarea {
    //Ahora creo una nueva tarea
    constructor(texto) {
        //Pomgo que el id sea en el momento actual
        this.id = Date.now(); 
        //Recibo el texto del constructor
        this.texto = texto;
        //Pongo que por defecto no este completada
        this.completada = false;
        //Guardo la fecha actual
        this.fechaCreacion = new Date();
    }

    //Marco la tarea como completada
    completar() {
    this.completada = true;
    }

    //Devuelvo un texto con la tarea mostrando si esta completada o no
     toString() {
        const marca = this.completada ? "[x]" : "[ ]";
    return `${marca} ${this.texto}`;
  }
}

//Exporto la clase para poder utilizarla en loos otros archivos
export default Tarea;