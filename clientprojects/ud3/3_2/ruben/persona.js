class Persona{
    constructor(nombre, edad, trabajo){
        this.nombre = nombre;
        this.edad = edad;
        this.trabajo = trabajo;
    
    }
    getNombre(){
        return this.nombre;
    }
    getEdad(){
        return this.edad;
    }   
    getTrabajo(){
        return this.trabajo;
    }
    añadirNacionalidad(nacionalidad){
        this.nacionalidad = nacionalidad;
    }
    eliminarTrabajo(){
        delete this.trabajo;
    }
    toString(){
        return `Nombre: ${this.nombre}, Edad: ${this.edad}, Trabajo: ${this.trabajo ? this.trabajo : "Sin trabajo"}, Nacionalidad: ${this.nacionalidad ? this.nacionalidad : "No especificada"}`;
    }

}
export {Persona};