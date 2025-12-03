// Crear el objeto
const persona = {
    nombre: "Ana",
    edad: 28,
    trabajo: "Ingeriera"
};

console.log(persona);

// Acceder a las propiedades
console.log(`Nombre: ${persona.nombre}`);
console.log(`Edad: ${persona.edad}`);
console.log(`Trabajo: ${persona.trabajo}`);

// Modificar el objeto persona
persona.pais = "ESPAÑA"; // Añadir nueva propiedad

// Eliminar la propiedad trabajo
delete persona.trabajo;

// Imprimir de nuevo el objeto
console.log(persona);

// Usar noacion de corchetes para acceder/modificar propiedades
console.log(`Edad: ${persona["edad"]}`);