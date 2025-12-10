'use strict';

class Persona {

    constructor(nombre, edad) {
        this.nombre = nombre; 
        this.edad = edad;

        this.saludar = function() {
            console.log(`Hola mi nombre es ${this.nombre}`)
        };
    }
}


const persona1 = new Persona("Miguel", 33);

persona1.saludar();