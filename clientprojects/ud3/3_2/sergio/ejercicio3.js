//Creo a usuario1
let usuario1 = {
    nombre: "Sergio",
    edad: 21,
    email: "lolua6339@alumnos.ilerna.com"
};

//Copio por referencia
let usuario2 = usuario1;

//Modifico a usuario 2 para que le afecte a usuario 1
usuario2.edad = 28;
console.log(usuario1.edad);

//Hago una clonacion duperficial utilizando Objet.assing
let usuario3 = Object.assign({}, usuario1);
usuario3.nombre = "Mauri";

//Este usuario no cambia
console.log(usuario1);
//Este usuario tendra un nombre diferente
console.log(usuario3);