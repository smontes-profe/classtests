let persona = {
    nombre: "Abel",
    edad: 20,
    trabajo: "Desarrollador",
}

console.log(persona.nombre); // Imprime "Abel"
console.log(persona.edad);   // Imprime 20

persona.pais = "España"; // Agrega una nueva propiedad 'pais'
delete persona.trabajo; // Elimina la propiedad 'trabajo'

console.log(persona); //Muestra el objeto persona actualizado

console.log(persona["edad"]); //Muestra la edad usando notación de corchetes