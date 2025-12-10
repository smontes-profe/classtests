//Creo el objeto persona
let persona = {
    nombre: "Ana",
    edad: 28,
    trabajo: "Ingeniera"
};

//Accedo a las propiedades con notacion de punto
console.log(persona.nombre);
console.log(persona.edad);

//Modifico el objeto
persona.pais = "España";
delete persona.trabajo;

//Muestro el objeto actualizado
console.log(persona);

//Accedo a edad con notacion de corchetes
console.log(persona["edad"]);