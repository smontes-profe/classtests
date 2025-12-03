"use strict"

// Crear el objeto persona
let persona = {
    nombre: "Ana",
    edad: 28,
    trabajo: "Ingeniera"
};

// Acceder a las propiedades usando notación de punto e imprimir nombre y edad
console.log("Nombre:", persona.nombre);
console.log("Edad:", persona.edad);

// Modificar el objeto
persona.pais = "España";      
delete persona.trabajo;       

// Imprimir el objeto completo
console.log("Objeto modificado:", persona);

// Acceder a la propiedad edad usando notación de corchetes
console.log("Edad usando corchetes:", persona["edad"]);
