
// Creación y acceso a objetos

let persona = { // Objeto persona
    nombre: "Ana",
    edad: 28,
    trabajo: "Ingeniera"
}

console.log(persona.nombre);  // Imprime el nombre
console.log(persona.edad); // Imprime la edad

persona.pais = "España"; // Añadimos nueva propiedad
delete persona.trabajo; // Eliminamos propiedad trabajo

console.log("Nuevo objeto: ", persona); // Imprime el objeto actualizado

console.log("Edad: ", persona["edad"]); // Acceso usando notación de corchetes


