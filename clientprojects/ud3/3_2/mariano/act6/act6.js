"use strict"

// Crear un símbolo para la clave id
const id = Symbol("id");

// Crear objeto empleado
let empleado = {
    nombre: "Laura",
    puesto: "Analista"
};

// Añadir la propiedad usando el símbolo como clave
empleado[id] = 12345;

// Recorrer propiedades con for...in
for (let clave in empleado) {
    console.log(clave + ": " + empleado[clave]); 
}

// Acceder a la propiedad usando el símbolo directamente
console.log("ID del empleado:", empleado[id]);
