'use strict';

// Crea un objeto usuario1 con las propiedades nombre, edad y email
const usuario1 = {
    nombre: "Miguel",
    edad: 35,
    email: "usuario1@example.com"
};

// crea una variable usuario2 y haz que sea una copia por referencia de usuario1.
const usuario2 = usuario1;

// Modifica alguna propiedad de usuario2 y observa cómo cambia el objeto usuario1.
usuario2.nombre = "Montes";
console.log(usuario2.nombre);

//  Realiza una clonación superficial del objeto usuario1 utilizando Object.assign y cambia una propiedad del clon
const usuario3 = Object.assign(usuario1);
usuario3.email = "usuario3@example.com";
console.log(usuario3.email);

// Comparación de los 3 objetos
console.log(usuario1);
console.log(usuario2);
console.log(usuario3);