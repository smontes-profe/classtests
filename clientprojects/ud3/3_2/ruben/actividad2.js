import { Persona } from "./persona.js";

let persona1 = new Persona("Luis", 35, "Médico");
let propiedadNombre = false;

for(let propiedad in persona1){
    if (propiedad == 'nombre'){
        propiedadNombre= true ;
    } 
    console.log(propiedad + ": " +persona1[propiedad] );
}
 console.log (propiedadNombre ?"La propiedad 'nombre' existe en la clase Persona": "La propiedad 'nombre' no existe en la clase Persona");