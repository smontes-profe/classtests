"use strict"

// Suponiendo que ya tenemos el objeto persona del ejercicio anterior
let persona = {
    nombre: "Ana",
    edad: 28,
    pais: "España"
};

// Comprobar existencia de propiedades usando "in"
console.log("¿Existe la propiedad 'nombre'? :", "nombre" in persona);   
console.log("¿Existe la propiedad 'apellido'? :", "apellido" in persona); 

// Recorrer todas las propiedades con for...in
for (let clave in persona) {
    console.log(clave + ": " + persona[clave]);
}
