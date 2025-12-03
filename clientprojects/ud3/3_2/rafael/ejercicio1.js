// EJERCICIO 1

// Crear objeto persona
let persona = {
    nombre: "Ana",
    edad: 28,
    trabajo: "Ingeniera"
};

// Acceder con notación de punto
console.log("Nombre:", persona.nombre);
console.log("Edad:", persona.edad);

// Modificar objeto
persona.pais = "España";  // Añadir propiedad
delete persona.trabajo;    // Eliminar propiedad

console.log("Objeto:", persona);

// Usar notación de corchetes
console.log("Edad usando corchetes:", persona["edad"]);