import { Persona } from "./persona.js";    

let persona1 = new Persona("Ana", 28, "Ingeniera");

console.log(persona1.toString());

persona1.añadirNacionalidad("Española");

console.log("Nacionalidad: "+persona1.nacionalidad);

persona1.eliminarTrabajo();

console.log("Trabajo después de eliminarlo: "+persona1.getTrabajo());

console.log(persona1.toString());

console.log('Edad:'+persona1.getEdad());